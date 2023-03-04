<?php

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

Route::get('/', function () {
    return redirect()->route('blog');
});
Route::get('/posts', function () {
    $posts=[
        ['id' => 1,'title'=>'Laravel','posted_by'=>'Salim','created_at'=>'2021-03-13'],
        ['id' => 2,'title'=>'JS','posted_by'=>'Salim','created_at'=>'2021-03-13'],
        ['id' => 3,'title'=>'Node','posted_by'=>'Said','created_at'=>'2021-03-13'],
    ];
    return view('test',[
        'posts' => $posts
    ]);
})->name('blog');