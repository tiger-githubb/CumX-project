<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\Infos\InfosController;
use App\Http\Controllers\Editor\EditorController;
use App\Http\Controllers\Post\CategoryController;
use App\Http\Controllers\Contact\ContactController;
use App\Http\Controllers\Legales\LegalesController;
use App\Http\Controllers\Product\ProductController;


Route::get('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
});

// Route::any('/register', function () {
//     return  view('auth.pages.login');
// });


Route::get('/', [HomeController::class, 'frontend_index'])->name('acceuil');
Route::get('blog', [PostController::class, 'blog_index'])->name('blog');
Route::get('article/{post}', [PostController::class, 'post_detail'])->name('post.detail');
Route::get('blog/{category}', [CategoryController::class, 'category_single'])->name('category.detail');

Route::middleware(['auth', 'verified'])->group(function () {

    //Dashboard
    Route::get('tableau-de-bord', [HomeController::class, 'backend_index'])->name('dashboard.index');
    Route::get('tableau-de-bord/publications', [PostController::class, 'posts_index'])->name('posts.index');
    Route::get('tableau-de-bord/categories', [CategoryController::class, 'categories_index'])->name('categories.index');
    Route::get('tableau-de-bord/produits', [ProductController::class, 'products_index'])->name('products.index');


    //User account
    Route::get('tableau-de-bord/mon-compte', function () {
        return view('back.pages.profil.edit');
    })->name('editProfil');

    //update password
    Route::get('tableau-de-bord/mot-de-passe/modifier', function () {
        return view('back.pages.profil.password-update');
    })->name('passwordMaj');

    //Post
    Route::get('tableau-de-bord/publications/ajouter', [PostController::class, 'create'])->name('post.create');
    Route::post('tableau-de-bord/publications/enregistrer', [PostController::class, 'store'])->name('post.store');

    Route::get('tableau-de-bord/publications/{post}/modifier', [PostController::class, 'edit'])->name('post.edit');
    Route::put('tableau-de-bord/publications/{post}/update', [PostController::class, 'update'])->name('post.update');
    Route::get('tableau-de-bord/publications/{post}/supprimer', [PostController::class, 'destroy'])->name('post.destroy');

    //Post categories
    Route::get('tableau-de-bord/categories/ajouter', [CategoryController::class, 'create'])->name('category.create');
    Route::post('tableau-de-bord/categories/enregistrer', [CategoryController::class, 'store'])->name('category.store');
    Route::get('tableau-de-bord/categories/{category}/modifier', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('tableau-de-bord/categories{category}/update', [CategoryController::class, 'update'])->name('category.update');
    Route::get('tableau-de-bord/categories/{category}/supprimer', [CategoryController::class, 'destroy'])->name('category.destroy');

    // Products
    Route::get('tableau-de-bord/produits/ajouter', [ProductController::class, 'create'])->name('product.create');
    Route::post('tableau-de-bord/produits/enregistrer', [ProductController::class, 'store'])->name('product.store');
    Route::get('tableau-de-bord/produits/{product}/modifier', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('tableau-de-bord/produits/{product}/update', [ProductController::class, 'update'])->name('product.update');
    Route::get('tableau-de-bord/produits/{product}/supprimer', [ProductController::class, 'destroy'])->name('product.destroy');
});


Route::middleware(['auth', 'verified', 'checkRole'])->group(function () {

    Route::get('tableau-de-bord/editeurs', [EditorController::class, 'editors_index'])->name('editors.index');
    Route::get('tableau-de-bord/tous-les-articles', [PostController::class, 'all_users_posts_index'])->name('alluserposts.index');
    Route::get('tableau-de-bord/articles/validation/{post}/{categoryId}', [PostController::class, 'update_state'])->name('post.changestate');
});

//Contact
Route::get('contactez-nous', [ContactController::class, 'index'])->name('contact.index');
Route::post('contactez-nous', [ContactController::class, 'send'])->name('contact.send');

//Infos
Route::get('a-propos', [InfosController::class, 'about'])->name('infos.about');
Route::get('foire-aux-questions', [InfosController::class, 'faq'])->name('infos.faq');
Route::get('comment-ca-marche', [InfosController::class, 'ccm'])->name('infos.ccm');

//Legales
Route::get('termes-et-conditions', [LegalesController::class, 'termes'])->name('legales.termes');
Route::get('politique-de-securite', [LegalesController::class, 'securite'])->name('legales.securite');
Route::get('politique-de-confidentialite', [LegalesController::class, 'confidentialite'])->name('legales.confidentialite');



// Route::get('/', 'ProductController@index')->name('home');
// Route::get('/product/{id}', 'ProductController@show')->name('product.show');
// Route::post('/order', 'OrderController@store')->name('order.store')->middleware('auth');
// Route::get('/orders', 'OrderController@index')->name('order.index')->middleware('auth');