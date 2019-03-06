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


Route::get('/', 'navigation\NavigationControllers@login');

Route::get('/dashboard', 'navigation\NavigationControllers@dashboard');


// Routes for users controller
Route::get('/user/viewall', 'users\UserControllers@viewall');
Route::resource('user', 'users\UserControllers');

