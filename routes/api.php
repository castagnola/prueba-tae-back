<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::group( ['prefix' => 'autores'] , function () {
    Route::post('create-autor' , 'Autor\AutorController@createAutor');
    Route::get('get-all-autores' , 'Autor\AutorController@getAllAutores');
});
Route::group( ['prefix' => 'posts'] , function () {
    Route::post('create-post' , 'Post\PostController@createPost');
    Route::post('delete-post' , 'Post\PostController@deletePost');
    Route::post('edit-post' , 'Post\PostController@editPost');
    Route::get('get-all-posts' , 'Post\PostController@getAllPosts');
}
);

