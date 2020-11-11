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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', 'LoginController@login')->name('login');
Route::get('/register', 'RegisterController@index')->name('register');
Route::post('/postlogin', 'LoginController@postlogin');
Route::post('/regCu', 'RegisterController@create');
Route::get('/logout', 'LoginController@logout')->name('logout');



Route::group(['middleware' => ['auth', 'CheckRole:admin']], function(){
    // Route::get('/dashboard', 'AdminController@dashboard');
    // Route::get('/dataart', 'AdminController@dataart');
    // Route::get('/datamaster', 'AdminController@datamaster');
    // Route::post('/dataart/create','AdminController@create');
    // Route::get('/art/edit/{id}', 'AdminController@edit');
    // Route::get('/edit/{id}', 'AdminController@editadmin');
    // Route::post('/art/{id}/update', 'AdminController@update');
    // Route::post('/admin/{id}/update', 'AdminController@updateadmin');
    // Route::get('/notfound', 'notfoundController@notfound');
    // Route::get('art/profile/{id}','AdminController@profilart');
    // Route::get('master/profile/{id}','AdminController@profilmaster');
    // Route::get('dataku/{id}','AdminController@profiladmin');
});

Route::get('/admin/home', 'c_home@indexAdmin');

Route::get('/cv/home', 'c_home@indexCv');
Route::get('/cv/data-produk', 'c_dataProduk@indexCv');
Route::get('/cv/data-produk/create', 'c_dataProduk@createView')->name('produk');
Route::post('/cv/data-produk/post', 'c_dataProduk@create')->name('tambahProduk');

Route::get('/customer/home', 'c_home@indexCustomer');
Route::get('/customer/data-produk', 'c_dataProduk@indexCustomer');



Route::group(['middleware' => ['auth', 'CheckRole:cv']], function () {
    
    
});

Route::group(['middleware' => ['auth', 'CheckRole:customer']], function () {
    
    
});