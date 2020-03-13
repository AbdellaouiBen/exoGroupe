<?php

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

// welcome
Route::get('/','WelcomeController@index')->name('welcome');

// User
Route::get('/arrUser','UserController@index')->name('arrUser');
Route::get('/addUser','UserController@create')->name('addUser');
Route::post('/saveUser','UserController@store')->name('saveUser');
Route::get('/editUser/{id}','UserController@edit')->name('editUser');
Route::post('/updateUser/{id}','UserController@update')->name('updateUser');
Route::get('/deleteUser/{id}','UserController@destroy')->name('deleteUser');
// Avatar
Route::get('/arrAvatar','AvatarController@index')->name('arrAvatar');
Route::get('/addAvatar','AvatarController@create')->name('addAvatar');
Route::post('/saveAvatar','AvatarController@store')->name('saveAvatar');
Route::get('/editAvatar/{id}','AvatarController@edit')->name('editAvatar');
Route::post('/updateAvatar/{id}','AvatarController@update')->name('updateAvatar');
Route::get('/deleteAvatar/{id}','AvatarController@destroy')->name('deleteAvatar');


//Categorie
Route::get('/arrCategorie','CategorieController@index')->name('arrCategorie');
Route::get('/addCategorie','CategorieController@create')->name('addCategorie');
Route::post('/saveCategorie','CategorieController@store')->name('saveCategorie');
Route::get('/editCategorie/{id}','CategorieController@edit')->name('editCategorie');
Route::post('/updateCategorie/{id}','CategorieController@update')->name('updateCategorie');
Route::get('/deleteCategorie/{id}','CategorieController@destroy')->name('deleteCategorie');

// Image
Route::get('/arrImage','ImageController@index')->name('arrImage');
Route::get('/addImage','ImageController@create')->name('addImage');
Route::post('/saveImage','ImageController@store')->name('saveImage');
Route::get('/editImage/{id}','ImageController@edit')->name('editImage');
Route::post('/updateImage/{id}','ImageController@update')->name('updateImage');
Route::get('/deleteImage/{id}','ImageController@destroy')->name('deleteImage');
Route::get('/downloadImage/{id}', 'ImageController@download')->name('downloadImage');          
