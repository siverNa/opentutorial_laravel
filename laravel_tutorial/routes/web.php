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

Route::get('/', function () {
	$books = [
		'harry potter',
		'Laravel'
	];
	return view('welcome')->with([
		'books' => $books
	]);
});

Route::get('/hello', function() {
	return view('hello');
});

Route::get('/contact', function () {
	return view('contact');
});
