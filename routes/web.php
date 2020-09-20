<?php

// use Auth;
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
//profil
Route::get('info-pribadi/{id?}', 'PenggunaController@ambilProfil')->name("info");
Route::get('pengaturan-akun', 'PenggunaController@ambilprofillama')->name("pengaturan");
Route::post('pengaturan-akun', 'PenggunaController@updatesProfil')->name("simpan-profil");
Route::post('tambah-produk','ProdukController@TambahProduk')->name('tambah-produk');
Route::get('PesananSaya', 'ProdukController@pesanansekarang')->name("pesanan");
Route::post('message', 'ProdukController@uploadBayar')->name("message");
Route::get('detail-pesanan/{id_pesanan?}','ProdukController@detailpesanan')->name('detail-pesanan');
Route::get('dayar','ProdukController@dayar')->name('dayar');
//Route::post('ambilDetailPesanan', 'ProdukController@ambilDetailPesanan')->name('ambilDetailPesanan');

//profil

//daftar mitra
Route::get('/daftar-mitra', 'PenggunaController@daftarmitra')->name("daftar");
//create by MIDevoloper
Route::post('daftar-mitra-new', 'PenggunaController@daftarmitranew')->name("daftar-mitra-new");
Route::post('cairkan', 'PenggunaController@cairkanSaldo')->name("cairkan");
Route::post('cairkanMitra', 'PenggunaController@cairkanSaldoMitra')->name("cairkanMitra");
Route::get('batal/{submit?}', 'ProdukController@batalBayar')->name("batalbayar");


//controller Produk
Route::get('fromubah-barang/{id}','ProdukController@ambilProduk')->name("ubah-produk");
Route::post('fromubah-barang','ProdukController@ubahProduk')->name("simpan-produk");
Route::get('detail/{id}','ProdukController@detailBarang')->name("detail");
Route::get('profil/{id}/{kategori}', 'ProdukController@profilProduk')->name("profil-produk");
Route::get('pembayaran/{id?}','ProdukController@pesanSekarang')->name('pembayaran');
Route::post('pembayaran/{id?}','ProdukController@pesanSekarangstore')->name('pembayaran.store');

Route::get('pembayarann/{id?}','ProdukController@pesanKeranjang')->name('pembayarann');
Route::post('bayarKeranjang','ProdukController@bayarKeranjang')->name('bayarKeranjang');
//keranjang
Route::post('tambah-keranjang','ProdukController@tambahKeranjang')->name('tambah-keranjang');
Route::get('lihat-keranjang','ProdukController@lihatKeranjang')->name('lihat-keranjang');
Route::get('hapusKeranjang','ProdukController@hapusKeranjang')->name('hapusKeranjang');
//Route::post('stokKurang', 'ProdukController@stokKurang')->name('stokKurang');
//keranjang


//controller pesanan
Route::post('pesanan','PesananController@tambahPesanan')->name('tpesanan');

//controller pesanan


/////////////////////////

//adminbeli
Route::get('bdiproses/{id?}','ProdukController@bdiproses')->name('bdiproses');
Route::get('bdikirim','ProdukController@bdikirim')->name('bdikirim');
Route::get('bditerima','ProdukController@bditerima')->name('bditerima');
Route::get('bbatal', 'ProdukController@bbatal')->name('bbatal');
Route::get('ubahStatusBatal/{id_pesanan?}','ProdukController@ubahStatusBatal')->name('ubahStatusBatal');
//adminbeli

//adminjual
Route::get('belum-bayar','PenggunaController@ambilFotobelumbayar')->name('belumbayar');
Route::get('diproses','PenggunaController@ambilFotodiproses')->name('diproses');
Route::get('dikirim','PenggunaController@ambilFotodikirim')->name('dikirim');
Route::get('diterima','PenggunaController@ambilFotoditerima')->name('diterima');
Route::get('pembatalan-pesanan','PenggunaController@ambilFotopembatalan')->name('pembatalan');
Route::get('produk-dijual','PenggunaController@ambilFotoprodukdijual')->name('dijual');
Route::get('tambah-produk','PenggunaController@ambilFototambahproduk')->name('tambah');
Route::get('ubah-barang/{id}','PenggunaController@ambilFotoubahbarang')->name('ubah');
Route::get('fromubah-barang','PenggunaController@ambilFotofromubahbarang')->name('fromubah');
//adminjual

//ongkir
Route::get('daftarKabupaten','PenggunaController@daftarKabupaten')->name('lokasi');
Route::get('daftarKecamatan','PenggunaController@daftarKecamatan')->name('ongkir');
Route::get('daftar-ongkir','PenggunaController@dafatarOngkir')->name('daftarongkir');
Route::get('tambahOngkir', 'PenggunaController@tambahOngkir')->name('tambahOngkir');
//ongkir


//produk
Route::get('pakan/{kategori}','ProdukController@daftarProdukKategori')->name('test');
Route::get('pakan-kuda','PenggunaController@ambilFotopakankuda')->name('test2');
Route::get('pakan-domba','PenggunaController@ambilFotopakandomba')->name('test3');
Route::get('pakan-ayam','PenggunaController@ambilFotopakanayam')->name('test4');
Route::get('pakan-kerbau','PenggunaController@ambilFotopakankerbau')->name('test5');
Route::get('supplement','PenggunaController@ambilFotosupplement')->name('test6');
Route::get('hijauan','PenggunaController@ambilFotohijauan')->name('test7');
Route::get('bahan-mentah','PenggunaController@ambilFotobahanmentah')->name('test8');
Route::get('peternak-binaan','PenggunaController@ambilFotopeternakbinaan')->name('test9');
Route::get('beli-barang','PenggunaController@ambilprofilbelibarang')->name('test10');
Route::post('pencarianProduk','ProdukController@pencarianProduk')->name('pencarianProduk');
//produk

//Bantuan
Route::get('bantuan','PenggunaController@bantuan')->name('bantuan');
/////////////////



Route::get('pembayaran','PenggunaController@ambilFotopembayaran')->name('test11');
Route::get('keranjang','PenggunaController@ambilFotokeranjang')->name('test12');
Route::post('bayar/{id?}','ProdukController@bayar')->name('bayar');
Route::get('profil-penjual','PenggunaController@ambilprofilprofilpenjual')->name('  ');

//Kirim Notifikasi
Route::get('kirimNotifikasi/{id_pengguna}/{jenis}','ProdukController@kirimNotifikasi')->name('kirimNotifikasi');

// kirim Notifikasi

//cara membeli barang
Route::get('cara-membeli','PenggunaController@ambilprofilcaramembeli')->name('test13');

//Mobile API
Route::prefix('mobile')->group(function(){

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
    Route::get('/daftarProdukHome', 'MobileController@daftarProdukHome')->name('mobile.daftarProdukHome');
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
});

// Route::get('/', function () {
//     return view('welcome');
// })->name("welcome");

// Route::get('pakan-sapi', function () {
//     return view('test.pakan-sapi');
// })->name("test");

// Route::get('pakan-kuda', function () {
//     return view('test.pakan-kuda');
// })->name("test2");

// Route::get('pakan-domba', function () {
//     return view('test.pakan-domba');
// })->name("test3");

// Route::get('pakan-ayam', function () {
//     return view('test.pakan-ayam');
// })->name("test4");

// Route::get('pakan-kerbau', function () {
//     return view('test.pakan-kerbau');
// })->name("test5");

// Route::get('supplement', function () {
//     return view('test.supplement');
// })->name("test6");

// Route::get('hijauan', function () {
//     return view('test.hijauan');
// })->name("test7");

// Route::get('bahan-mentah', function () {
//     return view('test.bahan-mentah');
// })->name("test8");

// Route::get('peternak-binaan', function () {
//     return view('test.peternak-binaan');
// })->name("test9");

// Route::get('beli-barang', function () {
//     return view('test.beli-barang');
// })->name("test10");

// Route::get('pembayaran', function () {
//     if (Auth::guard('pengguna')->check()){
//         return view('test.pembayaran');
//     }else{
//         return view('welcome');
//     }
// })->name("test11");

// Route::get('keranjang', function () {
//     if(Auth::guard('pengguna')->check()){
//         return view('test.keranjang');
//     }else{
//         return view('welcome');
//     }
// })->name("test12");

// Route::get('cara-membeli', function () {
//     return view('test.cara-membeli');
// })->name("test13");

// Route::get('info-pribadi', function () {
//     if (Auth::guard('pengguna')->check()){
//         return view('profil.info-pribadi');
//     }else{
//         return view('welcome');
//     }
// })->name("info");


// Route::get('pesanan-saya', function () {
//     if (auth::guard('pengguna')->check()){
//         return view('profil.pesanan-saya');
//     }else{
//         return view('welcome');
//     }

// })->name("pesanan");

Route::get('home-login', function () {
    return view('home.home-login');
})->name("home");

// Route::get('pengaturan-akun', function () {
//     if (auth::guard('pengguna')->check()){
//         return view('profil.pengaturan-akun');
//     }else{
//         return view('welcome');
//     }
// })->name("pengaturan");



// Route::get('bantuan', function () {
//     return view('profil.bantuan');
// })->name("bantuan");

//Route::get('daftar-mitra', function () {
 //   return view('profil.daftar-mitra');
//})->name("daftar");

// Route::get('bayar', function () {
//     if (auth::guard('pengguna')->check()){
//         return view('profil.bayar');
//     }else{
//         return view('welcome');
//     }
// })->name("bayar");

// Route::get('produk-dijual', function () {
//     if (auth::guard('pengguna')->check()){
//         return view('adminjual.produk-dijual');
//     }else{
//         return view('welcome');
//     }

// })->name("dijual");

// Route::get('tambah-produk', function () {
//     if (auth::guard('pengguna')->check()){
//         return view('adminjual.tambah-produk');
//     }else{
//         return view('welcome');
//     }

// })->name("tambah");

// Route::get('belum-bayar', function () {
//     if (auth::guard('pengguna')->check()){
//         return view('adminjual.belum-bayar');
//     }else{
//         return view('welcome');
//     }

// })->name("belumbayar");

// Route::get('diproses', function () {
//     if (auth::guard('pengguna')->check()){
//         return view('adminjual.diproses');
//     }else{
//         return view('welcome');
//     }
// })->name("diproses");

// Route::get('dikirim', function () {
//     if (auth::guard('pengguna')->check()){
//         return view('adminjual.dikirim');
//     }else{
//         return view('welcome');
//     }

// })->name("dikirim");

// Route::get('diterima', function () {
//     if (auth::guard('pengguna')->check()){
//         return view('adminjual.diterima');
//     }else{
//         return view('welcome');
//     }

// })->name("diterima");

// Route::get('pembatalan-pesanan', function () {
//     if (auth::guard('pengguna')->check()){
//         return view('adminjual.pembatalan-pesanan');
//     }else{
//         return view('welcome');
//     }
// })->name("pembatalan");

Route::get('rincian-pesanan', function () {
    return view('adminjual.rincian-pesanan');
})->name("rincianpesanan");

// Route::get('bdiproses', function () {
//     if (auth::guard('pengguna')->check()){
//         return view('adminbeli.bdiproses');
//     }else{
//         return view('welcome');
//     }
// })->name("bdiproses");

// Route::get('bdikirim', function () {
//     if (auth::guard('pengguna')->check()){
//         return view('adminbeli.bdikirim');
//     }else{
//         return view('welcome');
//     }
// })->name("bdikirim");

// Route::get('bditerima', function () {
//     if (auth::guard('pengguna')->check()){
//         return view('adminbeli.bditerima');
//     }else{
//         return view('welcome');
//     }

// })->name("bditerima");

// Route::get('ubah-barang', function () {
//     if (auth::guard('pengguna')->check()){
//         return view('adminjual.ubah-barang');
//     }else{
//         return view('welcome');
//     }
// })->name("ubah");

// Route::get('fromubah-barang', function () {
//     if (auth::guard('pengguna')->check()){
//         return view('adminjual.fromubah-barang');
//     }else{
//         return view('welcome');
//     }

// })->name("fromubah");

// Route::get('profil-penjual', function () {
//     return view('profil.profil-penjual');
// })->name("profilp");

Route::post('register','PenggunaController@buatPengguna')->name('register');
Route::post('login','Auth\PenggunaLoginController@login')->name('login');
Route::post('kirimUlangOTP','PenggunaController@kirimUlangOTP')->name('kirimUlangOTP');
Route::post('verifikasiOTP','PenggunaController@verifikasiOTP')->name('verifikasiOTP');
Route::post('registerakun','PenggunaController@registerakun')->name('registerakun');
Route::get('/','ProdukController@daftarProdukHome')->name('welcome');
Route::get('logout','PenggunaController@logout')->name('logout');

route:: get('loginOTP','PenggunaController@loginOTP')->name('loginOTP');
route:: get('verifikasi','PenggunaController@verifikasi')->name('verifikasi');
route:: get('daftarakun', 'PenggunaController@daftarakun')->name('daftarakun');
route:: get('registerOTP', 'PenggunaController@registerOTP')->name('registerOTP');

