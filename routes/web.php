<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'LinkController@index');
Route::post('/', 'LinkController@store');
Route::delete('/{id}/delete', 'LinkController@destroy');
Route::get('/about', 'StaticController@about');
Route::get('/contact', 'StaticController@contact');
Route::post('/contact', 'FeedBackMailController@sendFeedBack');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/{shortLink}', 'StaticController@reDirect');




