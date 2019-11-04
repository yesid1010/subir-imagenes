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
use App\Comment;
use App\User;

Route::get('/',function(){
    return view('auth.login');
});


Auth::routes();


// pagina home solo tienen acceso los usuarios logueados
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

//imagenes

// vista de perfil del usuario logueado
//Route::view('/myphotos', 'myphotos')->name('myphotos')->middleware('auth');

//fotos del usuario logueado

Route::get('/photos','ImageController@photos')->middleware('auth');

// crear una foto
Route::post('/create','ImageController@create')->middleware('auth');

// fotos de todos los usuarios
Route::get('all','ImageController@index');

// detalle de una foto
Route::get('/show-image/{image_id}','ImageController@show')->middleware('auth');

Route::get('/delete/{id}','ImageController@destroy')->middleware('auth');
//comentarios
Route::post('/create-comment','CommentController@create')->middleware('auth');
Route::get('/show-comments/{image_id}','CommentController@show')->middleware('auth');

Route::get('imagen/deletecomment/{id}', function ($id) {
        $comment = Comment::find($id);
        $comment->delete();
});

// Route:: get('/{any}',function(){
//     return view('layouts.app');
// })->where('any','.*');


Route::get('users','ImageController@userss');