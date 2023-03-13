<?php

use App\Http\Controllers\AdminPannelController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SubscribeController;
use Illuminate\Support\Facades\Route;
use App\Models\Blog;
use Illuminate\Support\Facades\File;
use Symfony\Component\CssSelector\Node\FunctionNode;

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

Route::get('/', [BlogController::class,'index']);

Route::get('/blogs/{blog:slug}', [BlogController::class, 'show']);

Route::get('/register', [AuthController::class, 'create'])->middleware('guest');
Route::post('/register', [AuthController::class,'store'])->middleware('guest');

Route::get('/login', [AuthController::class,'index'])->name('login');
Route::post('/login', [AuthController::class,'login']);
Route::post('/logout',[AuthController::class,'logout']);

Route::post('/{blog:slug}/comment', [CommentController::class, 'store']);

Route::post('/blogs/{blog:slug}/subscribe', [SubscribeController::class, 'subscribeToggle']);

Route::get('/admin/blogs', [AdminPannelController::class, 'index'])->middleware('is_admin');
Route::get('/admin/blogs/create', [AdminPannelController::class, 'create'])->middleware('is_admin');
Route::post('/admin/blogs/create', [AdminPannelController::class, 'store'])->middleware('is_admin');
Route::delete('/admin/blogs/{blog}', [AdminPannelController::class, 'destroy'])->middleware('is_admin');
Route::get('/admin/blogs/{blog}/edit', [AdminPannelController::class, 'edit'])->middleware('is_admin');
Route::patch('/admin/blogs/{blog}/edit', [AdminPannelController::class, 'update'])->middleware('is_admin');





// showallblogs in admin pannel = /admin(index)(get method)
// blog create form             = /admin/blog(create)(get method)
// blog store                   = /admin/blog(store)(post method)

