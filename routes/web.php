<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/blog', [ArticleController::class, 'index'])->name('article.index');
Route::get('/blog/{category}/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/blog/{category}', [ArticleController::class, 'list'])->name('article.list');
Route::get('/blog/tag/{tag}', [ArticleController::class, 'tag'])->name('article.tag');

Route::get('/search', [ArticleController::class, 'search'])->name('article.search');

