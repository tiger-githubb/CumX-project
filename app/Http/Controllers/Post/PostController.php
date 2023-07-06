<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PostController extends Controller
{

    public function blog_index()
    {
        $posts = Post::with('user', 'category')
             ->where('state', 'validé')
             ->orderBy('created_at', 'desc')
             ->paginate(9);
        return view('front.pages.blog.index', compact('posts'));
    }

    public function posts_index()
    {
        
        $user = Auth::user();
        $posts = $user->posts()->with('category')->latest()->take(10)->get();        

        return view('back.pages.posts.index', compact('posts'));
    }

    public function all_users_posts_index()
    {
        $posts = Post::with('user')
        ->orderByRaw("CASE WHEN state = 'brouillon' THEN 0 ELSE 1 END")
        ->latest()
        ->get();     

        return view('back.pages.posts.list_all', compact('posts'));
    }

    public function post_detail($slug)
    {
        try {
            $post = Post::where('slug', $slug)->firstOrFail();
    
            $previousPost = Post::where('state', 'validé')
            ->where('created_at', '<', $post->created_at)
            ->orderBy('created_at', 'desc')
            ->first();
        
            $nextPost = Post::where('state', 'validé')
            ->where('created_at', '>', $post->created_at)
            ->orderBy('created_at', 'asc')
            ->first();        
    
            return view('front.pages.blog.article-single', compact('post', 'previousPost', 'nextPost'));
        } catch (ModelNotFoundException $e) {
            return redirect()->back();
        }
    }

    public function create()
    {
        $categories = Category::whereNotIn('name', ['non classé'])->get();
        return view('back.pages.posts.create', compact('categories'));
    }

    public function store(StorePostRequest $request)
    {

        try {

            if ($request->hasFile('image')) {
                //$imageName = $request->image->store('posts');
                $imageName = $request->image->store('posts');
                $image = Image::make(public_path("storage/{$imageName}"))->fit(1200, 853);
                $image->save();
            }

            Post::create([
                'title' => $request->title,
                'resume' => $request->resume,
                'content' => $request->content,
                'image' => $imageName
            ]);

            return redirect()->route('posts.index')->with('status', 'Publication créée avec succès.');
            
        } catch (\Exception $e) {

            return back()->withInput()->with('error', 'Une erreur s\'est produite. Veuillez réessayer.');
        }
    }
    
    public function edit($slug)
    {
        try {
            $post = Post::where('slug', $slug)->firstOrFail();

            if (auth()->user()->cannot('edit-post', $post)) {
                //accès refusé -- controle du gate
                return redirect()->back()->with('error', 'Accès refusé. Vous n\'ètes pas autorisé a mofifier cet article.');
            }

            $categories = Category::whereNotIn('name', ['non classé'])->get();

            return view('back.pages.posts.edit', compact('post', 'categories'));
        } catch (ModelNotFoundException $e) {
            return redirect()->back();
        }
    }

    public function update(StorePostRequest $request, Post $post)
    {
        try {

            $post = Post::where('slug', $post->slug)->firstOrFail();

            if (auth()->user()->cannot('update-post', $post)) {
                //accès refusé -- controle du gate
                return redirect()->back()->with('error', 'Mis a jour échoué. Vous n\'ètes pas autorisé a mettre a jour cet article.');
            }

            $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

            $arrayUpdate = [
                'title' => $request->title,
                'resume' => $request->resume,
                'content' => $request->content,
                'slug' => $slug

            ];

            if ($request->hasFile('image')) {

                if ($post->image != null) {
                    Storage::delete($post->image);
                }

                //$imageName = $request->image->store('posts');
                $imageName = $request->image->store('posts');
                $image = Image::make(public_path("storage/{$imageName}"))->fit(1200, 853);
                $image->save();

                $arrayUpdate = array_merge($arrayUpdate, [
                    'image' => $imageName
                ]);
            }

            $post->update($arrayUpdate);

            if (Auth::user()->role === 0) {
                return redirect()->route('posts.index')->with('status', 'Publication modifiée avec succès.');
            } else {
                return redirect()->route('alluserposts.index')->with('status', 'Publication modifiée avec succès.');
            }            

        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Une erreur s\'est produite. Veuillez réessayer.');
        }
    }

    public function updateState(Post $post, $categoryId)
    {
        try {
            
            $post->state = 'validé';
            $post->category_id = $categoryId;
            $post->save();

            return redirect()->route('alluserposts.index')->with('status', 'Publication validé avec succès.');
        } catch (\Exception $e) {
            return back()->with('error', 'Une erreur s\'est produite. Veuillez réessayer.');
        }
    }

    public function destroy(Post $post)
    {

        try {

            $post = Post::where('slug', $post->slug)->firstOrFail();

            if (auth()->user()->cannot('delete-post', $post)) {
                //accès refusé -- controle du gate
                return redirect()->back()->with('error', 'Supression échoué. Vous n\'ètes pas autorisé a supprimer cet article.');
            }

            if ($post->image != null) {
                Storage::delete($post->image);
            }

            $post->delete();

            if (Auth::user()->role === 0) {
                return redirect()->route('posts.index')->with('status', 'Publication supprimée avec succès.');
            } else {
                return redirect()->route('alluserposts.index')->with('status', 'Publication supprimée avec succès.');
            }

        } catch (\Exception $e) {

            return back()->with('error', 'Une erreur s\'est produite. Veuillez réessayer.');
        }
    }
    
}
