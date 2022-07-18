<?php

use App\Http\Controllers\PostController;
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

Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{id}', [PostController::class, 'delete'])->name('posts.delete');
Route::post('/posts', [PostController::class, 'create'])->name('posts.create');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{id}', [PostController::class, 'details'])->name('posts.details');
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');

Route::get('/', function () {
    return redirect()->route('posts.index');
});