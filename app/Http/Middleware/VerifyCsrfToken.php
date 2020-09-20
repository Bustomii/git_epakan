<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'mobile/login',
        'mobile/register',
        'mobile/updateProfil',
        'mobile/tambahProduk',
        'mobile/ubahProduk',
        'mobile/hapusProduk',
        'mobile/daftarProdukPenjual',
        'mobile/pencarianProduk',
        'mobile/pesan',
        'mobile/ubahStatusPesan',
        'mobile/konfirmasiBayarPesan',
        'mobile/tambahDetailPesan',
        'mobile/ubahStatusDikirim',
        'mobile/ubahStatusDiterima',
        'mobile/tambahKeranjang',
        'mobile/hapusKeranjang',
        'mobile/tambahSaldoPenjual',
        'mobile/ambilProfil',
        'mobile/tambahPencairan',
        'mobile/konfirmasiPencairan',
        'mobile/daftarPesananBelum',
        'mobile/daftarPesananDiproses',
        'mobile/daftarPesananDikirim',
        'mobile/daftarPesananDiterima',
        'mobile/daftarPesananBatal',
        'mobile/daftarPesananDiambil',
        'mobile/cekVersi',
        'mobile/ambilDetailPesanan',
        'mobile/kirimOTP',
        'mobile/loginOperator',
        'mobile/loginOTP',
        'mobile/registerOTP',
        'mobile/kirimUlangOTP',
        'mobile/requestMitra',
        'mobile/ambilDetailProduk',
        'mobile/ubahStatusDiambil',
        'mobile/ubahIklanProduk',
        'mobile/stokKurang',
        'mobile/tambahOngkir',
        'mobile/ubahOngkir',
        'mobile/aturLokasiTokoPenjual',
        'mobile/ubahStatusBatal',
        'mobile/setListNotifikasi',
        'mobile/ubahStatusNotifikasi',
        'mobile/cariKodeTransaksi',
    ];
}
