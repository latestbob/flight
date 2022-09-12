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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
//logout

Route::post('/logout','Auth\LoginController@logout')->name('logout');
Route::get('/','pagesController@index')->name('index');
///about page

Route::get('about','pagesController@about')->name('about');
//flight page
Route::get('flights','pagesController@flights')->name('flights');

//contact

Route::get('contact','pagesController@contact')->name('contact');

//track flight

Route::get('track','pagesController@track')->name('track');

Route::get('/home', 'HomeController@index')->name('home');





/////////////////////////ADMIN ROUTES//////////////////

Route::get('/admin-dashboard','AdminController@adminhome')->name('adminhome');
//admin all customers

Route::get('/admin-customers','AdminController@customer')->name('admincustomers');

//deactive user

Route::delete('admin-customer/{id}','AdminController@customerdelete')->name('admincustomerdelete');
