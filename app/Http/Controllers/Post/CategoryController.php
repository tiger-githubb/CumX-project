<?php

namespace App\Http\Controllers\Post;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreCategoryRequest;
use Cviebrock\EloquentSluggable\Services\SlugService;

class CategoryController extends Controller
{

    public function categories_index()
    {
        $categories = Category::whereNotIn('id', [1])->latest()->get();

        return view('back.pages.categories.index', compact('categories'));
    }

    public function category_single($slug)
    {
        try {
            $category = Category::where('slug', $slug)->firstOrFail();
            $posts = $category->posts()
                  ->where('state', 'validé')
                  ->paginate(9);
            return view('front.pages.blog.categorie-single', compact('category', 'posts'));
        } catch (ModelNotFoundException $e) {
            return redirect()->back();
        }
    }

    public function create()
    {
        return view('back.pages.categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        try {

            if ($request->hasFile('image')) {
                //$imageName = $request->image->store('categories');
                $imageName = $request->image->store('categories');
                $image = Image::make(public_path("storage/{$imageName}"))->fit(2000, 2600);
                $image->save();
            }

            Category::create([
                'name' => $request->name,
                'desc' => trim($request->desc),
                'color' => $request->color,
                'image' => $imageName
            ]);

            return redirect()->route('categories.index')->with('status', 'Catégorie créée avec succès.');
        } catch (\Exception $e) {

            return back()->withInput()->with('error', 'Une erreur s\'est produite. Veuillez réessayer.');
        }
    }

    public function edit($slug)
    {
        try {
            $category = Category::where('slug', $slug)->firstOrFail();

            return view('back.pages.categories.edit', compact('category'));
        } catch (ModelNotFoundException $e) {
            return redirect()->back();
        }
    }

    public function update(StoreCategoryRequest $request, Category $category)
    {

        try {
            $slug = SlugService::createSlug(Category::class, 'slug', $request->name);

            $arrayUpdate = [
                'name' => $request->name,
                'desc' => $request->desc,
                'color' => $request->color,
                'slug' => $slug
            ];

            if ($request->hasFile('image')) {

                if ($category->image != null) {
                    Storage::delete($category->image);
                }

                //$imageName = $request->image->store('categories');
                $imageName = $request->image->store('categories');
                $image = Image::make(public_path("storage/{$imageName}"))->fit(2000, 2600);
                $image->save();

                $arrayUpdate = array_merge($arrayUpdate, [
                    'image' => $imageName
                ]);
            }

            $category->update($arrayUpdate);

            return redirect()->route('categories.index')->with('status', 'Catégorie modifiée avec succès.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Une erreur s\'est produite. Veuillez réessayer.');
        }
    }

    public function destroy($id)
    {
        try {
            $defaultCategory = Category::where('default', true)->firstOrFail();
    
            $category = Category::findOrFail($id);
    
            // Vérifier si la catégorie contient des articles écrits par d'autres utilisateurs
            $otherAuthors = $category->posts()->whereHas('user', function ($query) {
                $query->where('id', '!=', auth()->user()->id);
            })->exists();
    
            if ($otherAuthors) {
                // Si la catégorie contient des articles écrits par d'autres utilisateurs, refuser la suppression
                return back()->with('error', 'Suppression impossible ! cette catégorie contient des articles d\'autres utilisateurs.');
            } else {
                // Sinon, mettre à jour les articles liés à la catégorie par défaut et supprimer la catégorie
                $category->posts()->update(['category_id' => $defaultCategory->id]);

                if ($category->image != null) {
                    Storage::delete($category->image);
                }

                $category->delete();

                return back()->with('status', 'Catégorie supprimée avec succès.');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Une erreur s\'est produite. Veuillez réessayer.');
        }
    }
}
