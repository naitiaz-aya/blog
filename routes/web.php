<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/adminprofile', [App\Http\Controllers\HomeController::class, 'admin'])->name('admineprofile');
Route::get('/articles', [App\Http\Controllers\HomeController::class, 'articles'])->name('articles');
Route::get('/editblog', [App\Http\Controllers\HomeController::class, 'editblog'])->name('editblog');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
Route::get('/staffoffice', [App\Http\Controllers\HomeController::class, 'staffofice'])->name('staffoffice')->middleware("auth");

Route::get('/CreateBlog', [App\Http\Controllers\BlogController::class, 'create'])->name('addBlog')->middleware('auth');
Route::get('/Blogs', [App\Http\Controllers\BlogController::class, 'index'])->name('Blog')->middleware('auth');
Route::get('/showBlog/{id}', [App\Http\Controllers\BlogController::class, 'show'])->name('showBlog')->middleware('auth');
Route::get('/myBlog', [App\Http\Controllers\BlogController::class, 'selfIndex'])->name('myBlog')->middleware('auth');
Route::get('/editBlog/{id}', [App\Http\Controllers\BlogController::class, 'edit'])->name('editBlog')->middleware('auth');
Route::post('/storeBlog', [App\Http\Controllers\BlogController::class, 'store'])->name('storeBlog')->middleware('auth');
Route::put('/updateBlog/{id}', [App\Http\Controllers\BlogController::class, 'update'])->name('updateBlog')->middleware('auth');
Route::delete('/deleteBlog/{id}', [App\Http\Controllers\BlogController::class, 'destroy'])->name('deleteBlog')->middleware('auth');

Route::get('/CreateArticle', [App\Http\Controllers\ArticleController::class, 'create'])->name('addArticle')->middleware('auth');
Route::get('/Articles', [App\Http\Controllers\ArticleController::class, 'index'])->name('Article')->middleware('auth');
Route::get('/showArticle/{id}', [App\Http\Controllers\ArticleController::class, 'show'])->name('showArticle')->middleware('auth');
Route::get('/myArticle', [App\Http\Controllers\ArticleController::class, 'selfIndex'])->name('myArticle')->middleware('auth');
Route::get('/editArticle/{id}', [App\Http\Controllers\ArticleController::class, 'edit'])->name('editArticle')->middleware('auth');
Route::post('/storeArticle', [App\Http\Controllers\ArticleController::class, 'store'])->name('storeArticle')->middleware('auth');
Route::get('/profile', [App\Http\Controllers\ArticleController::class, 'profile'])->name('profile')->middleware('auth');
Route::put('/updateArticle/{id}', [App\Http\Controllers\ArticleController::class, 'update'])->name('updateArticle')->middleware('auth');
Route::delete('/deleteArticle/{id}', [App\Http\Controllers\ArticleController::class, 'destroy'])->name('deleteArticle')->middleware('auth');

Route::post('/storeBlogCom', [App\Http\Controllers\BlogcommentController::class, 'store'])->name('storeBlogCom')->middleware('auth');
Route::delete('/deleteBlogCom/{id}', [App\Http\Controllers\BlogcommentController::class, 'destroy'])->name('deleteBlogCom')->middleware('auth');

Route::post('/storeArticleCom', [App\Http\Controllers\ArticlecommentController::class, 'store'])->name('storeArticleCom')->middleware('auth');
Route::delete('/deleteArticleCom/{id}', [App\Http\Controllers\ArticlecommentController::class, 'destroy'])->name('deleteArticleCom')->middleware('auth');

Route::get('/Categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('Categories')->middleware('auth');
Route::get('/CreateCategory', [App\Http\Controllers\CategoryController::class, 'create'])->name('addCategory')->middleware('auth');
Route::get('/showCategory/{id}', [App\Http\Controllers\CategoryController::class, 'show'])->name('showCategory')->middleware('auth');
Route::post('/storeCategory', [App\Http\Controllers\CategoryController::class, 'store'])->name('storeCategory')->middleware('auth');

Route::get('/Subscriptions', [App\Http\Controllers\SubscriptionController::class, 'index'])->name('Subscriptions')->middleware('auth');
Route::get('/CreateSubscription', [App\Http\Controllers\SubscriptionController::class, 'create'])->name('addSubscription')->middleware('auth');
Route::post('/storeSubscription', [App\Http\Controllers\SubscriptionController::class, 'store'])->name('storeSubscription')->middleware('auth');

Route::get('/Upgrade', [App\Http\Controllers\UsersubscriptionController::class, 'index'])->name('Upgrade')->middleware('auth');
Route::get('/UpgradeSubscription/{id}', [App\Http\Controllers\UsersubscriptionController::class, 'create'])->name('UpgradeSubscription')->middleware('auth');
Route::post('/Subscribe', [App\Http\Controllers\UsersubscriptionController::class, 'store'])->name('Subscribe')->middleware('auth');
