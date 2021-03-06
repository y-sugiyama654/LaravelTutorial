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

//Route::get('/', function () {
//    Route::get('/home', 'StaticPagesController@home');
//});

Route::get('/home', 'StaticPagesController@home')->name('home');
Route::get('/help', 'StaticPagesController@help')->name('help');
Route::get('/about', 'StaticPagesController@about')->name('about');
Route::get('/contact', 'StaticPagesController@contact')->name('contact');
Route::get('/signup', 'UsersController@create')->name('signup');
Route::post('/signup', 'UsersController@store');

Route::resource('users', 'UsersController', ["except" => ["create"]]);

Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store')->name('sessions.store');
Route::delete('/logout', 'SessionsController@destroy')->name('logout');
Route::get('account_activations/{token}/edit', 'AccountActivationsController@edit')->name('activation');

Route::resource('password_resets', 'PasswordResetsController', ["only" => ["create", "store", "edit", "update"]]);
Route::resource('microposts', "MicropostsController", ["only"=> ['store', 'destroy']]);

Route::prefix('users')->group(function () {
    Route::get('{user}/following', "UsersController@following")->name("following");
    Route::get('{user}/followers', "UsersController@followers")->name("followers");
});

Route::resource('relationships', "RelationshipsController", ["only" => ['store', 'destroy']]);
