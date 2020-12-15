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

Route::get('/login', 'c_login@login')->name('login');
Route::get('/register', 'RegisterController@index')->name('register');
Route::post('/postlogin', 'c_login@postlogin');
Route::post('/regCu', 'RegisterController@create');
Route::get('/logout', 'c_login@logout')->name('logout');



Route::group(['middleware' => ['auth', 'CheckRole:admin']], function(){
    Route::get('/admin/home', 'c_home@indexAdmin');
    Route::get('/admin/data-produk', 'c_designRumah@indexAdmin');
    Route::get('/admin/data-pembayaran', 'c_dataPembayaran@setPembayaran');
    Route::get('/admin/data-cv', 'c_dataCv@setDataCv');
    Route::get('/admin/data-customer', 'c_dataCustomer@setDataCustomer');
    Route::post('/verifAkun', 'c_dataCv@updateDataCv');
});


Route::group(['middleware' => ['auth', 'CheckRole:cv']], function () {
    Route::get('/cv/home', 'c_home@setDataCv');
    Route::get('/cv/data-produk', 'c_designRumah@indexCv');
    Route::get('/cv/data-produk/create', 'c_designRumah@createView')->name('produk');
    Route::post('/cv/data-produk/post', 'c_designRumah@create')->name('tambahProduk');
    Route::get('/cv/data-produk/edit/{id}', 'c_designRumah@editView')->name('edit');
    Route::post('/cv/data-produk/postEdit', 'c_designRumah@updateProduk')->name('editProduk');
    Route::get('/cv/pesanan-masuk', 'c_pesananMasuk@pesananMasukAction');
    Route::get('/cv/pesanan-masuk/pesanan/{id}', 'c_formDesignCustom@requestFormDesignActionCV');
    Route::post('/postDesain', 'c_formDesignCustom@updateDesain');
    Route::post('/postHarga', 'c_formDesignCustom@updateHarga');
    Route::post('/verifikasi', 'c_pesananMasuk@updatePesanan');
    Route::post('/verifBayar', 'c_pembayaranMasuk@updatePembayaran');
    Route::get('/cv/pembayaran-masuk', 'c_pembayaranMasuk@setPembayaran');
    // Route::get('/cv/pesanan-masuk/pesanan/{id}/desain', 'c_formDesignCustom@setFormDesignCustom');
    Route::get('/form-profil', 'c_formDataCv@setFormDataCv');
    Route::post('/postProfil', 'c_formDataCv@updateDataCv');
    Route::post('/updateBangun', 'c_formRencanaPembangunanMasuk@updateRencanaPembangunan');
    Route::get('/cv/rencana-pembangunan-masuk', 'c_rencanaPembangunanMasuk@setRencanaPembangunan');
});

Route::group(['middleware' => ['auth', 'CheckRole:customer']], function () {
    Route::get('/customer/home', 'c_home@setDataCustomer');
    Route::get('/form-customer', 'c_formDataCustomer@setFormDataCustomer');
    Route::post('/postcustomer', 'c_formDataCustomer@updateDataCustomer');

    Route::get('/customer/data-produk', 'c_designRumah@indexCustomer');
    Route::get('/customer/pemesanan-design', 'c_pemesananDesign@pemesanandesignaction');
    Route::get('/profil-cv/{id}', 'c_profilCV@profilCVaction');
    Route::get('/detail/{id}', 'c_detailProduk@produkAction');
    Route::get('/detail/{id}/beli', 'c_formPesanan@beliDesignAction');
    Route::post('/postPesanan', 'c_formPesanan@inputPesanan');
    Route::get('/customer/profil-cv/1kustom-pesanan', 'c_formDesignCustom@requestFormDesignAction');
    Route::get('/profil-cv/{id}/beli', 'c_formPesanan@beliCustomAction');
    Route::post('/postPesananCustom', 'c_formPesanan@inputPesananCustom');
    Route::post('/batal', 'c_formPesanan@batalAction');
    Route::get('/customer/pemesanan-design/bayar/{id}', 'c_formPembayaran@setFormPembayaran');
    Route::get('/customer/pembayaran-design', 'c_pembayaranDesign@setPembayaran');
    Route::post('/postPembayaran', 'c_formPembayaran@inputPembayaran');
    Route::get('/invoice/{id}', 'c_pembayaranDesign@invoice');
    Route::get('/pembangunan/{id}', 'c_formRencanaPembangunan@setFormRencanaPembangunan');
    Route::post('/postBangun', 'c_formRencanaPembangunan@inputRencanaPembangunan');
    Route::get('/customer/rencana-pembangunan', 'c_rencanaPembangunan@setRencanaPembangunan');
});