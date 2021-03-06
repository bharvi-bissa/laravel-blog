<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/Add', function(){
    return view('Add');
})->middleware('auth');

Route::post('/posts/add','PostController@addPost')->middleware('auth');
Route::get('/welcome',function(){
    return view('welcome');
});

Route::get('/posts', 'PostController@getPosts');

Route::get('/', 'PostController@getPosts');

Route::get('/posts/{id}','PostController@getFullPost');

Route::post('/posts/delete','PostController@deletePost');

Route::get('/posts/edit/{id}','PostController@showEditPage')->middleware('auth');

Route::post('/posts/edit','PostController@editPost')->middleware('auth');

Route::get('login/google', 'Auth\LoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');