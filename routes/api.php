<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
|------------------------------------
| API MOBILE
| V. 22/07/2019
|------------------------------------
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Profil
Route::post('/login', 'MobileController@login')->name('mobile.login');
Route::post('/register', 'MobileController@register')->name('mobile.register');
Route::post('/updateProfil', 'MobileController@updateProfil')->name('mobile.update');
Route::post('/ambilProfil', 'MobileController@ambilProfil')->name('mobile.ambilProfil');
Route::get('/daftarPencairan/{id_pengguna}', 'MobileController@daftarPencairan')->name('mobile.daftarPencairan');
Route::post('/tambahPencairan', 'MobileController@tambahPencairan')->name('mobile.tambahPencairan');
Route::get('/lokasiTokoPenjual/{id_penjual}', 'MobileController@lokasiTokoPenjual')->name('mobile.lokasiTokoPenjual');
Route::post('/aturLokasiTokoPenjual', 'MobileController@aturLokasiTokoPenjual')->name('mobile.aturLokasiTokoPenjual');
Route::get('/jumlahTransaksi/{id_penjual}', 'MobileController@jumlahTransaksi')->name('mobile.jumlahTransaksi');
Route::get('/jumlahProduk/{id_penjual}', 'MobileController@jumlahProduk')->name('mobile.jumlahProduk');
Route::get('/ambilDetailPenjual/{id_penjual}', 'MobileController@ambilDetailPenjual')->name('mobile.ambilDetailPenjual');

//Produk
Route::post('/tambahProduk', 'MobileController@tambahProduk')->name('mobile.tambahProduk');
Route::post('/ubahProduk', 'MobileController@ubahProduk')->name('mobile.ubahProduk');
Route::post('/hapusProduk', 'MobileController@hapusProduk')->name('mobile.hapusProduk');
Route::post('/daftarProdukPenjual', 'MobileController@daftarProdukPenjual')->name('mobile.daftarProdukPenjual');

Route::group(['middleware' => 'auth:api'], function(){
    Route::get('/daftarProdukHome', 'MobileController@daftarProdukHome')->name('mobile.daftarProdukHome');
});

Route::get('/daftarProdukKategori/{kategori}/{halaman}', 'MobileController@daftarProdukKategori')->name('mobile.daftarProdukKategori');
Route::post('/pencarianProduk', 'MobileController@pencarianProduk')->name('mobile.pencarianProduk');
Route::post('/tambahKeranjang', 'MobileController@tambahKeranjang')->name('mobile.tambahKeranjang');
Route::post('/hapusKeranjang', 'MobileController@hapusKeranjang')->name('mobile.hapusKeranjang');
Route::get('/daftarKeranjang/{id_pengguna}', 'MobileController@daftarKeranjang')->name('mobile.daftarKeranjang');
Route::post('/ubahIklanProduk', 'MobileController@ubahIklanProduk')->name('mobile.ubahIklanProduk');
Route::post('/stokKurang', 'MobileController@stokKurang')->name('mobile.stokKurang');

//Pesanan
Route::post('/pesan', 'MobileController@pesan')->name('mobile.pesan');
Route::post('/ubahStatusPesan', 'MobileController@ubahStatusPesan')->name('mobile.ubahstatusPesan');
Route::post('/konfirmasiBayarPesan', 'MobileController@konfirmasiBayarPesan')->name('mobile.konfirmasiBayarPesan');
Route::post('/tambahDetailPesan', 'MobileController@tambahDetailpesan')->name('mobile.tambahDetailpesan');
Route::post('/ubahStatusDikirim', 'MobileController@ubahStatusDikirim')->name('mobile.ubahStatusDikirim');
Route::post('/ubahStatusDiterima', 'MobileController@ubahStatusDiterima')->name('mobile.ubahStatusDiterima');
Route::post('/tambahSaldoPenjual', 'MobileController@tambahSaldoPenjual')->name('mobile.tambahSaldoPenjual');
Route::post('/daftarPesananBelum', 'MobileController@daftarPesananBelum')->name('mobile.daftarPesananBelum');
Route::post('/daftarPesananDiproses', 'MobileController@daftarPesananDiproses')->name('mobile.daftarPesananDiproses');
Route::post('/daftarPesananDikirim', 'MobileController@daftarPesananDikirim')->name('mobile.daftarPesananDikirim');
Route::post('/daftarPesananDiterima', 'MobileController@daftarPesananDiterima')->name('mobile.daftarPesananDiterima');
Route::post('/daftarPesananBatal', 'MobileController@daftarPesananBatal')->name('mobile.daftarPesananBatal');
Route::post('/daftarPesananDiambil', 'MobileController@daftarPesananDiambil')->name('mobile.daftarPesananDiambil');
Route::post('/ambilDetailPesanan', 'MobileController@ambilDetailPesanan')->name('mobile.ambilDetailPesanan');
Route::post('/loginOTP', 'MobileController@loginOTP')->name('mobile.loginOTP');
Route::post('/registerOTP', 'MobileController@registerOTP')->name('mobile.registerOTP');
Route::post('/kirimUlangOTP', 'MobileController@kirimUlangOTP')->name('mobile.kirimUlangOTP');
Route::post('/ambilDetailProduk', 'MobileController@ambilDetailProduk')->name('mobile.ambilDetailProduk');
Route::post('/ubahStatusDiambil', 'MobileController@ubahStatusDiambil')->name('mobile.ubahStatusDiambil');
Route::post('/ubahStatusBatal', 'MobileController@ubahStatusBatal')->name('mobile.ubahStatusBatal');
Route::post('/cariKodeTransaksi', 'MobileController@cariKodeTransaksi')->name('mobile.cariKodeTransaksi');

//Admin
Route::get('/daftarPencairanAdmin', 'MobileController@daftarPencairanAdmin')->name('mobile.daftarPencairanAdmin');
Route::get('/daftarKonfirmasiPesanan', 'MobileController@daftarKonfirmasiPesanan')->name('mobile.daftarKonfirmasiPesanan');
Route::post('/konfirmasiPencairan', 'MobileController@konfirmasiPencairan')->name('mobile.konfirmasiPencairan');
Route::post('/loginOperator', 'MobileController@loginOperator')->name('mobile.loginOperator');
Route::get('/kirimNotifikasiAdmin', 'MobileController@kirimNotifikasiAdmin')->name('mobile.kirimNotifikasiAdmin');

//Cek Versi
Route::post('/cekVersi', 'MobileController@cekVersi')->name('mobile.cekVersi');

//Kirim Notifikasi
Route::get('/kirimNotifikasi/{id_pengguna}/{jenis}', 'MobileController@kirimNotifikasi')->name('mobile.kirimNotifikasi');
Route::post('/setListNotifikasi', 'MobileController@setListNotifikasi')->name('mobile.setListNotifikasi');
Route::get('/daftarListNotifikasi/{id_pengguna}', 'MobileController@daftarListNotifikasi')->name('mobile.daftarListNotifikasi');
Route::get('/jumlahListNotifikasi/{id_pengguna}', 'MobileController@jumlahListNotifikasi')->name('mobile.jumlahListNotifikasi');
Route::post('/ubahStatusNotifikasi', 'MobileController@ubahStatusNotifikasi')->name('mobile.ubahStatusNotifikasi');

//Kirim OTP
Route::post('/kirimOTP', 'MobileController@kirimOTP')->name('mobile.kirimOTP');

//Request Mitra
Route::post('/requestMitra', 'MobileController@requestMitra')->name('mobile.requestMitra');

//Ongkir
Route::get('/daftarKabupaten', 'MobileController@daftarKabupaten')->name('mobile.daftarKabupaten');
Route::get('/daftarKecamatan/{id_kabupaten}', 'MobileController@daftarKecamatan')->name('mobile.daftarKecamatan');
Route::get('/daftarOngkir/{id_penjual}', 'MobileController@daftarOngkir')->name('mobile.daftarOngkir');
Route::post('/tambahOngkir', 'MobileController@tambahOngkir')->name('mobile.tambahOngkir');
Route::post('/ubahOngkir', 'MobileController@ubahOngkir')->name('mobile.ubahOngkir');
Route::get('/tarifOngkirKecamatan/{id_penjual}/{id_kecamatan}', 'MobileController@tarifOngkirKecamatan')->name('mobile.tarifOngkirKecamatan');
