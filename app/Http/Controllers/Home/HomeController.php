<?php

namespace App\Http\Controllers\Home;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function frontend_index()
    { 
        $posts = Post::with('category', 'user')
                     ->where('state', 'validé')
                     ->latest()
                     ->take(6)
                     ->get();
        
        return view('front.pages.home.index', compact('posts'));
    }

    public function backend_index()
    {
        $posts_count = Post::where('user_id', Auth::id())
            ->where('state', 'validé')
            ->count();

        $category_count = Category::whereNotIn('id', [1])->count();
        $users_count = User::where('role', 0)
            ->count();
            
        $draft_posts_count = Post::where('state', 'brouillon')->count();
        
        $posts = Post::with('user', 'category')->latest()->get();                   
        
        return view('back.pages.home.index', compact('posts','posts_count','category_count','users_count','draft_posts_count'));
    }
}
