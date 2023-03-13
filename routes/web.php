<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;


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

Route::get('/', function () {
    return redirect()->route('posts.index');
});

Route::get('/posts2', function () {
    $posts=[
        ['id' => 1,'title'=>'Laravel','posted_by'=>'Salim','created_at'=>'2021-03-13'],
        ['id' => 2,'title'=>'JS','posted_by'=>'Salim','created_at'=>'2021-03-13'],
        ['id' => 3,'title'=>'Node','posted_by'=>'Said','created_at'=>'2021-03-13'],
    ];
    return view('test',[
        'posts' => $posts
    ]);
})->name('blog');

// Route::get('post/create',[PostController::class,'create'])->name('posts.create');



Route::get('/posts',[PostController::class,'index'])->name('posts.index');
Route::get('/post/create',[PostController::class,'create'])->name('posts.create')->middleware('auth');
Route::post('/post/store',[PostController::class,'store'])->name('posts.store');

Route::get('/post/{id}',[PostController::class,'show'])->name('posts.show');

Route::get('/posts/delete/{id}', [PostController::class, 'delete'])->name('posts.delete');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
