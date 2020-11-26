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
// route::auth();

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', 'LoginController@login')->name('login');
Route::get('/register', 'RegisterController@index')->name('register');
Route::post('/postlogin', 'LoginController@postlogin');
Route::post('/regCu', 'RegisterController@create');
Route::get('/logout', 'LoginController@logout')->name('logout');



Route::group(['middleware' => ['auth', 'CheckRole:admin']], function(){

});

Route::get('/admin/home', 'c_home@indexAdmin');
Route::get('/admin/data-produk', 'c_designRumah@indexAdmin');

Route::get('/cv/home', 'c_home@indexCv');
Route::get('/cv/data-produk', 'c_designRumah@indexCv');
Route::get('/cv/data-produk/create', 'c_designRumah@createView')->name('produk');
Route::post('/cv/data-produk/post', 'c_designRumah@create')->name('tambahProduk');
Route::get('/cv/data-produk/edit/{id}', 'c_designRumah@editView')->name('edit');
Route::post('/cv/data-produk/postEdit', 'c_designRumah@updateProduk')->name('editProduk');

Route::get('/customer/home', 'c_home@indexCustomer');
Route::get('/customer/data-produk', 'c_designRumah@indexCustomer');
Route::get('/customer/pemesanan-design', 'c_pemesananDesign@pemesanandesignaction');
Route::get('/profil-cv/{id}', 'c_profilCV@profilCVaction');
Route::get('/detail/{id}', 'c_detailProduk@produkAction');
Route::get('/detail/{id}/beli', 'c_formPesanan@beliDesignAction');
Route::post('/postPesanan', 'c_formPesanan@inputPesanan');

Route::group(['middleware' => ['auth', 'CheckRole:cv']], function () {
    
    
});

Route::group(['middleware' => ['auth', 'CheckRole:customer']], function () {
    
    
});