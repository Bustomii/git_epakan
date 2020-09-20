<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Produk;
use App\Pengguna;
use App\Pesanan;
use App\Keranjang;
use Image;
use Session;
use Auth;

class PesananController extends Controller
{
    public function tambahPesanan(Request $request){
        $pesanan = new Pesanan;
        $pesanan->tanggal=$request->tanggal;
        $peasanan->ongkir=$request->ongkir;
        $pesanan->harga=$request->harga;
        $pesanan->total_bayar=$request->total_bayar;
        $pesanan->id_pengguna=$request->id_pengguna;
        $pesanan->status=$request->status;

        if ($request->hasFile('foto')){
            $file = $request->file('foto');
            $ext = $file->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $file->move('uploads/file',$newName);
            $pesanan->foto = $newName;
    }
    $pesanan->save();

    return redirect()->route('bayar')->withMessage('Berhasil Update Course');

    }
}