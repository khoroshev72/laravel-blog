<?php


use Illuminate\Support\Facades\Route;


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

Route::get('/', [\App\Http\Controllers\MainController::class, 'index'])->name('home');
Route::get('/post/{slug}', [\App\Http\Controllers\PostController::class, 'single'])->name('post.single');
Route::get('/tag/{slug}', [\App\Http\Controllers\MainController::class, 'tag'])->name('post.tag');
Route::post('/post/add_like', [\App\Http\Controllers\MainController::class, 'add_like'])->name('like.add');


Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
    Route::get('/', [App\Http\Controllers\admin\MainController::class, 'index'])->name('admin.index');
    Route::resource('category', App\Http\Controllers\admin\CategoryController::class)->except(['show']);
    Route::resource('tag', \App\Http\Controllers\admin\TagController::class)->except(['show']);
    Route::resource('post', \App\Http\Controllers\admin\PostController::class)->except(['show']);
});

Route::group(['middleware' => 'guest'], function(){
    Route::get('/register', [\App\Http\Controllers\UserController::class, 'create'])->name('user.create');
    Route::post('/register', [\App\Http\Controllers\UserController::class, 'store'])->name('user.store');
    Route::get('/login', [\App\Http\Controllers\UserController::class, 'loginForm'])->name('login');
    Route::post('/login', [\App\Http\Controllers\UserController::class, 'login'])->name('user.login');
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('/logout', [\App\Http\Controllers\UserController::class, 'logout'])->name('user.logout');
    Route::post('/comment/add', [\App\Http\Controllers\PostController::class, 'add_comment'])->name('comment.add');
});

