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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function(){
    Route::get('/', [App\Http\Controllers\admin\MainController::class, 'index'])->name('admin.index');
    Route::resource('category', App\Http\Controllers\admin\CategoryController::class)->except(['show']);
    Route::resource('tag', \App\Http\Controllers\admin\TagController::class)->except(['show']);
    Route::resource('post', \App\Http\Controllers\admin\PostController::class)->except(['show']);

});
