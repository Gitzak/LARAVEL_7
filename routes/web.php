<?php

use App\Http\Controllers\PostCommentController;
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

// Route::get('/posts/{id}/{author}', function ($id,$author) {
//     return $id . " Author : " . $author;
// });

// Route::get('/posts/{id}/{author?}', function ($id,$author = "Not found") {
//     $posts = [
//         1 => [
//             'title' => 'Title 1'
//         ],
//         2 => [
//             'title' => 'Title 2'
//         ],
//     ];

//     return view('posts.show', [
//         'data' => $posts[$id],
//         'author' => $author
//     ]);
// });

// Route::get('/', function () {
//     return view('home');
// });

// view static
// Route::view('/','home');

// get homecontroller

// Route::get('/about', function () {
//     return view('about');
// });

// Route::view('/about','about');

// Route::get('/posts/{id}/{author?}', 'HomeController@blog')->name('blog-post');
Route::get('/', 'HomeController@index')->name('index');
Route::get('/home', 'HomeController@home')->name('home');
Route::get('/secret', 'HomeController@secret')->name('secret')->middleware('can:secret.page');
Route::get('/about', 'HomeController@about')->name('about');

// all methods
// Route::resource('/posts', 'PostController')->middleware('auth');
Route::get('/posts/archive', 'PostController@archive');
Route::get('/posts/all', 'PostController@all');
Route::patch('/posts/{id}/restore', 'PostController@restore');
Route::delete('/posts/{id}/forcedelete', 'PostController@forceDelete');
Route::resource('/posts', 'PostController');

// only methods in array
// Route::resource('/posts', 'PostController')->only(['index', 'show']);

// autorise all except destroy
// Route::resource('/posts', 'PostController')->except(['destroy']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/posts/tag/{id}', 'PostTagController@index')->name('posts.tag.index');


Route::resource('posts.comments','PostCommentController')->only(['store']);

Route::resource('users','UserController')->only(['show','edit','update']);

