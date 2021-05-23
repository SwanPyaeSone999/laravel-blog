<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;
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



Auth::routes();
Route::get('/', function () {
    return view('auth.login');
});
Route::get('/articles', [ArticleController::class, 'index'])->name('article');
Route::get('/articles/details/{id}', [ArticleController::class, 'details'])->name('article.details');


Route::get('/articles/add',[ArticleController::class,'add'])->name('article.add');
Route::post('/articles/add',[ArticleController::class,'create'])->name('article.create');

Route::get('/articles/edit/{id}',[ArticleController::class,'edit'])->name('article.edit');
Route::post('/articles/edit/{id}',[ArticleController::class,'update'])->name('article.update');


Route::get('/articles/delete/{id}',[ArticleController::class,'delete'])->name('article.delete');

Route::post('/comments/add',[CommentController::class,'add'])->name('comment.add');
Route::get('/comments/delete/{id}',[CommentController::class,'delete'])->name('comment.delete');



