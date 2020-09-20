<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Produk;
use App\Pengguna;
use App\Keranjang;
use App\DetailPesanan;
use App\Kabupaten;
use App\Pesanan;
use Image;
use Session;
use Auth;
use DB;

class ProdukController extends Controller
{
    public function TambahProduk(Request $request){

        $this->validate($request, array(
        'nama' => 'required',
        // 'jenis'=> 'required',
        'harga'=>'required',
        'satuan' => 'required',
        'status' => 'required',
        'kategori'=>'required',
        'lokasi'=>'required',
        'foto' => 'required',
        'foto2' => 'required',
        'foto3' => 'required',
        'deskripsi' => 'required',
        'minimum' => 'required',
        'stok' => 'required',
        ));

        $produk = new Produk;
        $produk->id_pengguna=Auth::guard('pengguna')->user()->id;
        $produk->nama=$request->nama;
        // $produk->jenis=$request->jenis;
        $produk->harga=$request->harga;
        $produk->satuan=$request->satuan;
        $produk->status=$request->status;
        $produk->kategori=$request->kategori;
        $produk->lokasi=$request->lokasi;
        $produk->deskripsi=$request->deskripsi;
        $produk->minimum=$request->minimum;
        $produk->stok=$request->stok;


        if ($request->hasFile('foto')){
            $file = $request->file('foto');
            $ext = $file->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $file->move('uploads/file',$newName);
            $produk->foto = $newName;
        }
        if($request->hasFile('foto2')){
            $file = $request->file('foto2');
            $ext = $file->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $file->move('uploads/file',$newName);
            $produk->foto2 = $newName;
        }
        if($request->hasFile('foto3')){
            $file = $request->file('foto3');
            $ext = $file->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $file->move('uploads/file',$newName);
            $produk->foto3 = $newName;
        }
        $produk->save();

        return redirect()->route('dijual')->withMessage('Berhasil Update Course');
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function ubahProduk(Request $request){

        $this->validate($request, array(
            'nama' => 'required',
            // 'jenis'=> 'required',
            'harga'=>'required',
            'satuan' => 'required',
            'status' => 'required',
            'kategori'=>'required',
            'lokasi'=>'required',
            'deskripsi' => 'required',
            'minimum' => 'required',
            'stok' => 'required',
            ));

        $produk = Produk::find($request->id);
        $produk->id_pengguna=Auth::guard('pengguna')->user()->id;
        $produk->nama=$request->nama;
        $produk->jenis=$request->jenis;
        $produk->harga=$request->harga;
        $produk->satuan=$request->satuan;
        $produk->status=$request->status;
        $produk->kategori=$request->kategori;
        $produk->lokasi=$request->lokasi;
        $produk->deskripsi=$request->deskripsi;
        $produk->minimum=$request->minimum;
        $produk->stok=$request->stok;

        if ($request->hasFile('foto')){
            $file = $request->file('foto');
            $ext = $file->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $file->move('uploads/file',$newName);
            $produk->foto = $newName;
        }
        if($request->hasFile('foto2')){
            $file = $request->file('foto2');
            $ext = $file->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $file->move('uploads/file',$newName);
            $produk->foto2 = $newName;
        }
        if($request->hasFile('foto3')){
            $file = $request->file('foto3');
            $ext = $file->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $file->move('uploads/file',$newName);
            $produk->foto3 = $newName;
        }

        $produk->save();

        return redirect()->route('dijual')->withMessage('Berhasil Update Course');
    }

    public function ambilProduk($id){
        $produk=Produk::find($id);
        $id = Auth::guard('pengguna')->user()->id;
        $pengguna = Pengguna::find($id);
        return view('adminjual/fromubah-barang')->withProduk($produk)->withPengguna($pengguna);
    }

    public function daftarProdukHome(){

          $produk=Produk::get();

          if (Auth::guard('pengguna')->check()){
              $id = Auth::guard('pengguna')->user()->id;
              $pengguna = Pengguna::find($id);
              return view('welcome')->with([
                  'pengguna' => $pengguna,
                  'produk' => $produk
              ]);
          }else{
              return view('welcome')->with([
                 'produk' => $produk
              ]);
          }
      }

      public function daftarProdukKategori($kategori){

          $produk = Produk::where('kategori','=',$kategori)->get();

            if (Auth::guard('pengguna')->check()){
            $id = Auth::guard('pengguna')->user()->id;
                $pengguna = Pengguna::find($id);
                return view('test/pakan-sapi')->with([
                    'pengguna' => $pengguna,
                    'produk' => $produk,
                    'kategori' => $kategori,
                ]);
            }else{
                return view('test/pakan-sapi')->with([
                   'produk' => $produk,
                   'kategori' => $kategori,
                ]);
            }
        }

        public function pencarianProduk(Request $request){

            if($request->kategori == "Semua Kategori" && $request->nama == NULL){
              $produk = Produk::get();
            }else if($request->kategori == "Semua Kategori"  && $request->nama != NULL){
              $produk = Produk::where('nama','=',$request->nama)->get();
            }else{
              $produk = Produk::where('kategori','=',$request->kategori)->where('nama','=',$request->nama)->get();
            }

              if (Auth::guard('pengguna')->check()){
              $id = Auth::guard('pengguna')->user()->id;
                  $pengguna = Pengguna::find($id);
                  return view('test/pakan-sapi')->with([
                      'pengguna' => $pengguna,
                      'produk' => $produk,
                      'kategori' => $request->kategori,
                  ]);
              }else{
                  return view('test/pakan-sapi')->with([
                     'produk' => $produk,
                     'kategori' => $request->kategori,
                  ]);
              }
          }

          public function detailBarang($id){
              if(Auth::guard('pengguna')->check()){
              $produk = Produk::find($id);
              $id_pengguna = Auth::guard('pengguna')->user()->id;
                  $pengguna = Pengguna::find($id_pengguna);
                return view('test/beli-barang')->with([
                    'produk'=>$produk,
                    'pengguna'=>$pengguna,
                ]); 
            }else{
                $produk = Produk::find($id);
                return view('test/beli-barang')->with([
               'produk' => $produk,
            ]);

            }
        }
        

        public function profilProduk($id, $kategori){
            if($kategori == "Semua Kategori"){
                $pengguna = Pengguna::find($id);
                $produk = Produk::where('id_pengguna','=', $id)->get();
            }else{
                $pengguna = Pengguna::find($id);
                $produk = Produk::where('kategori', '=', $kategori)->where('id_pengguna','=', $id)->get();
            }

            return view('profil/profil-penjual')->withPengguna($pengguna)->withProduk($produk);
        }


        public function tambahKeranjang(Request $request){
            $id = Auth::guard('pengguna')->user()->id;
            $keranjang = Keranjang::where('id_pengguna', $id)
                                    ->where('id_produk', $request->id_produk)
                                    ->first();
            if($keranjang != null){
                $keranjang->jumlah = $keranjang->jumlah+1;
            }
            else {
                $keranjang= new Keranjang;
                $keranjang->id_produk =$request->id_produk;
                $keranjang->jumlah =$request->jumlah;
                $keranjang->id_pengguna =$request->id_pengguna;
            }
            $keranjang->save();
            

            return redirect()->route('lihat-keranjang')->withMessage('Berhasil Menambah keranjang');
        }
        

        public function bayar(Request $request, $id_produk=null ){
                 
                 $input = $request->all();
                 
                 $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                 $charactersLength = strlen($characters);
                 $randomString = '';
                 for ($i = 0; $i < 2; $i++) {
                     $randomString .= $characters[rand(0, $charactersLength - 1)];
                }
                 $kode_pesanan = date('YmdHis');
                 $kode_pesanan = $randomString.substr($kode_pesanan,2);
                 

                $id = Auth :: guard('pengguna')->user()->id;
                $pengguna = Pengguna::find($id);

                $pesanan = Pesanan ::where ('id_pengguna', $id)
                                ->where('id_pesanan', $request->id_pesanan)
                                ->first();

                if($id_produk == null ){
                    $produk = Keranjang::where('id_pengguna', $id)->get();
                }else{
                    $produk = Produk::where('id',$id_produk)->first();
         
                $pesanan = new Pesanan;
                $pesanan->id_pesanan = $kode_pesanan;
                $pesanan->ongkir = $input['ongkir'];
                $pesanan->harga = $input['harga']*$input['id_jumlah'];
                $pesanan->status ='Belum';
                $pesanan->total_bayar = $input['ongkir']+($input['harga']*$input['id_jumlah']);
                $pesanan->id_pengguna = $id;


                if ($request->hasFile('foto')){
                    $file = $request->file('foto');
                    $ext = $file->getClientOriginalExtension();
                    $newName = rand(100000,1001238912).".".$ext;
                    $newName = "foto_pesanan_".$request->id_pengguna."_".$newName;
                    $file->move('uploads/file',$newName);
                    $pesanan->foto = $newName;
                }
            
                if($pesanan->save()){
                    $detail = new DetailPesanan;
                    $detail->id_pesanan = $pesanan->id_pesanan;
                    
                    $detail->id_penjual = $produk->id_pengguna;
                    $detail->id_pembeli = $pengguna->id;
                    $detail->id_produk = $produk->id;
                    $detail->harga = $input['harga']*$input['id_jumlah'];
                    
                    $detail->ongkir = $input['ongkir'];
                    $detail->total_keuntungan = $input['ongkir']+($input['harga']*$input['id_jumlah']);
                    $detail->jumlah = $input['id_jumlah'];
                    $detail->alamat_antar = $input['alamat'];
                    $detail->ambil = $input['id_jumlah'];
                    $detail->save();

                    return view('profil/bayar')->withMessage('Pesanan Anda Berhasil Silahkan Lakukan Pembayaran')
                    ->with([
                        'produk' => $produk,
                        'pengguna' => $pengguna,
                        'id' => $id_produk,
                        'pesanan'=> $pesanan   
                    ]);
                }else{
                    return view('welcome')->with([
                        'produk' => $produk,
                    ]);              
                }           
            }
        }

        public function batalBayar(Request $request){
                return redirect()->route('pesanan')->withMessage('Pesanan Anda Belum Dibayar [Silahkan Lakukan Pembayaran]');
            }

        public function uploadBayar(Request $request){
            if (auth::guard('pengguna')->check()){
                $id = Auth::guard('pengguna')->user()->id;
                $pengguna = Pengguna::find($id);

                if($request->submit='Oke'){
                    $this->validate($request,['pembayaran'=>'required|file|max:5000']);
                    $extensi = $request->file('pembayaran')->Extension();
                    $pembayaran = md5($request->file('pembayaran').'Nol').'.'.$extensi;
                    $path1 = $request->file('pembayaran')->move(public_path('\uploads'), $pembayaran);

                    $bayar = Pesanan::where('id_pesanan','=',$request->id_pesanan)->update([
                        'foto' => $path1,
                        'status' => 'lunas'
                        ]);
                    $update = detailpesanan::where('id_pesanan','=',$request->id_pesanan)->update([
                        'status' => 'diproses'
                    ]);

                    if($bayar != NULL){

                    return redirect()->route('bdiproses')->withMessage('Pesanan Anda Berhasil Dibayar [Menunggu Konfirmasi Penjual]');
                    }else{
                        return redirect()->route('pesanan')->withMessage('Pembayaran Gagal');
                    }
                }
                else{
                    return redirect()->route('pesanan')->withMessage('Pesanan Anda Belum Dibayar [Silahkan Lakukan Pembayaran]');
                }
        }
        else{
            $produk=Produk::get();
              return view('welcome')->with([
                 'produk' => $produk
             ]);
        }
    }

        public function detailpesanan(Request $request, $id_produk=null){
            
            if (auth::guard('pengguna')->check()){
                $id = Auth::guard('pengguna')->user()->id;
                $pengguna = Pengguna::find($id);
                $pesanan = Pesanan ::where ('id_pengguna', $id)
                                ->where('id_pesanan', $request->id_pesanan)
                                ->first();

                if($id_produk == null){
                    $produk = Keranjang::where('id_pengguna', $id)->get();
                }else{
                    $produk = Produk::where('id',$id_produk)->first();
                }

                $pesanan = DetailPesanan::where('id_pesanan', '=', $request->id_pesanan)->where('id_produk', '=', $request->id_produk)->first();
                $variable1 = $request->id_pengguna;
                $variable2 = $request->id_pengguna;
                $pesanan1 = DetailPesanan::where('id_pesanan', '=', $request->id_pesanan)
                   ->where(function($pesanan1) use ($variable1,$variable2){
                        $pesanan1->where('id_penjual','=',$variable1)
                       ->orWhere('id_pembeli','=',$variable2);
                })->sum('total_keuntungan');
                $pesan = Pesanan::where('id_pesanan', '=', $request->id_pesanan)->first();
                $produk = DetailPesanan::where('id_pesanan', '=', $request->id_pesanan)
                   ->where(function($pesanan1) use ($variable1,$variable2){
                        $pesanan1->where('id_penjual','=',$variable1)
                       ->orWhere('id_pembeli','=',$variable2);
                })->get();
      
                $produks = [];
      
                foreach ($produk as $dataProduk) {
                  $produks[] = [
                    'nama_produk' => $dataProduk->produk->nama,
                    'jumlah' => $dataProduk->jumlah,
                    'satuan' => $dataProduk->produk->satuan,
                    'harga' => $dataProduk->produk->harga,
                  ];
                }

              $produk = Produk::find($id_produk);

              $detail = DB::select("select * 
              FROM detail_pesanan
              WHERE id_pesanan = '".$request->id_pesanan."'");

              $kode_transaksi = $request->id_pesanan;

              return view('profil/detail-pesanan')->withMessage('Pesanan Anda Akan Diproses')->with([
                  'produk' => $produk,
                  'pengguna' => $pengguna,
                  'id' => $id_produk,
                  'pesanan'=> $pesanan,
                  'detail'=> $detail,
                  'kode' => $kode_transaksi,
                  'id'  =>$pengguna->id
              ]);

          }else{
              $produk=Produk::get();
              return view('welcome')->with([
                 'produk' => $produk
             ]);
          }
  
      }
        
      //Open MIDevoloper
        public function pesanSekarang($id_produk=null){
           
            if(Auth::guard('pengguna')->check()){
                $id = Auth::guard('pengguna')->user()->id;
                $pengguna = Pengguna::find($id);
             if($id_produk == null ){
                $produk = Keranjang::where('id_pengguna', $id)->get();
             }else{
                $produk = Produk::where('id',$id_produk)->first();
            }

            $id_pengguna_product = $produk['id_pengguna']; 

            $kabupaten = Kabupaten::orderBy('nama', 'ASC')->get();
            $kecamatan = DB::select("
            SELECT * FROM(
                SELECT
                kecamatan.nama as kec,
                (
                    SELECT ongkir FROM ongkir as kir
                    LEFT JOIN kecamatan as keca ON kir.id_kecamatan=keca.id_kecamatan
                    LEFT JOIN request_mitra as mt ON kir.id_penjual = mt.id_pengguna
                    LEFT JOIN pengguna as pg ON mt.id_pengguna = pg.id
                    WHERE kir.id_penjual = '".$id_pengguna_product."'
                    AND kir.id_kecamatan = kecamatan.id_kecamatan
                    ORDER By keca.nama ASC
                ) as okr
                FROM kecamatan
                ORDER BY kecamatan.nama ASC
                ) as nama_kecamatan ORDER BY nama_kecamatan.kec ASC
                ");

                return view('test/pembayaran')->withMessage('Pesanan Anda Berhasil Silahkan Lakukan Pembayaran')->with([
                'produk' => $produk,
                'pengguna' => $pengguna,
                'id' => $id_produk,
                'kabupaten' => $kabupaten,
                'kecamatan'=> $kecamatan
                ]);

            }else{
                $produk=Produk::get();
                return view('welcome')->with([
                   'produk' => $produk,
               ]);
            }
        }

        public function pesanKeranjang($id_produk=null){
           
            if(Auth::guard('pengguna')->check()){
                $id = Auth::guard('pengguna')->user()->id;
                $pengguna = Pengguna::find($id);
             if($id_produk == null ){
                $produk = Keranjang::where('id_pengguna', $id)->get();
             }else{
                $produk = Produk::where('id',$id_produk)->first();
            }
                $produk = DB::select('select produk.*, keranjang.id_keranjang as id_keranjang, keranjang.id_pengguna as pembeli, keranjang.jumlah as jumlah,
                keranjang.id_produk as id_produk, keranjang.id_keranjang as id_keranjang, produk.id_pengguna as id_penjual,
                keranjang.jumlah as jumlah FROM keranjang 
                LEFT JOIN produk ON keranjang.id_produk = produk.id 
                WHERE keranjang.id_pengguna = "'.$id.'" AND produk.iklan = 1 
                ORDER BY keranjang.id_keranjang ASC');

                $data2 = [];
                foreach ($produk as $data)
                {
                   $data2[] = [
                       'id' => $data->id_keranjang,
                       'id_produk' => $data->id_produk,
                       'nama' => $data->nama,
                       'jenis' => $data->kategori,
                       'satuan' => $data->satuan,   
                       'harga' => $data->harga,
                       'foto' => $data->foto,
                       'id_penjual' => $data->id_penjual,
                       'pembeli'    => $data->pembeli,
                       'id_keranjang'    => $data->id_keranjang
                   ];
                }
                
            $id_pengguna_product = $id; 

            $kabupaten = Kabupaten::orderBy('nama', 'ASC')->get();
            $kecamatan = DB::select("
            SELECT * FROM(
                SELECT
                kecamatan.nama as kec,
                (
                    SELECT ongkir FROM ongkir as kir
                    LEFT JOIN kecamatan as keca ON kir.id_kecamatan=keca.id_kecamatan
                    LEFT JOIN request_mitra as mt ON kir.id_penjual = mt.id_pengguna
                    LEFT JOIN pengguna as pg ON mt.id_pengguna = pg.id
                    WHERE kir.id_penjual = '".$id_pengguna_product."'
                    AND kir.id_kecamatan = kecamatan.id_kecamatan
                    ORDER By keca.nama ASC
                ) as okr
                FROM kecamatan
                ORDER BY kecamatan.nama ASC
                ) as nama_kecamatan ORDER BY nama_kecamatan.kec ASC
                ");

                if($produk == NULL){
                    return redirect()->route('lihat-keranjang')->withMessage('Tidak ada produk dikeranjang');
                }else {
                return view('test/pembayarann')->withProduk($produk)->withPengguna($pengguna)->with([
                    'id' => $id,
                    'kecamatan' => $kecamatan
                ]);;
                }
            }
        }

        public function pesanSekarangStore(Request $request){
           
            if(Auth::guard('pengguna')->check()){
                $id = Auth::guard('pengguna')->user()->id;
                $pengguna = Pengguna::find($id);
                $input = $request->all();
             
                $kecamatan = DB::select("
                SELECT * FROM(
                    SELECT
                    kecamatan.nama as kec,
                    (
                        SELECT ongkir FROM ongkir as kir
                        LEFT JOIN kecamatan as keca ON kir.id_kecamatan=keca.id_kecamatan
                        LEFT JOIN request_mitra as mt ON kir.id_penjual = mt.id_pengguna
                        LEFT JOIN pengguna as pg ON mt.id_pengguna = pg.id
                        WHERE kir.id_penjual = '".$id."'
                        AND kir.id_kecamatan = kecamatan.id_kecamatan
                        ORDER By keca.nama ASC
                    ) as okr
                    FROM kecamatan
                    WHERE kecamatan.id_kabupaten = '".$input->id_kabupaten."'
                    ORDER BY kecamatan.nama ASC
                    ) as nama_kecamatan ORDER BY nama_kecamatan.kec ASC
                    ");
                        return response()->json($kecamatan);

            }else{
                $produk=Produk::get();
                return view('welcome')->with([
                'produk' => $produk,
            ]);
            }
        }

        public function bayarKeranjang(Request $request){

        $input = $request->all();
                  
        $id = Auth :: guard('pengguna')->user()->id;
        $pengguna = Pengguna::find($id);
        
        for ($x=0;$x<count($input['id_produk']);$x++){
            
                $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < 2; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                    }
                $kode_pesanan = date('YmdHis');
                $kode_pesanan = $randomString.substr($kode_pesanan,2);
                
        
        $pesanan = DB::table('pesanan')->insert([
            'id_pesanan' => $kode_pesanan,
            'ongkir' => $input['ongkir'][$x],
            'harga' => $input['harga'][$x]*$input['jumlah'][$x],
            'status' => 'Belum',
            'total_bayar' => $input['ongkir'][$x]+($input['harga'][$x]*$input['jumlah'][$x]),
            'id_pengguna' => $input['pembeli'][$x],             
        ]);
        
        $detailpesanan = DB::table('detail_pesanan')->insert([
            'id_pesanan' => $kode_pesanan,
            'id_penjual' => $input['penjual'][$x],
            'id_pembeli' => $input['pembeli'][$x],
            'id_produk' => $input['id_produk'][$x],
            'harga' => $input['harga'][$x]*$input['jumlah'][$x],
            'ongkir' => $input['ongkir'][$x],
            'total_keuntungan' => $input['ongkir'][$x]+($input['harga'][$x]*$input['jumlah'][$x]),
            'jumlah' => $input['jumlah'][$x],
            'alamat_antar' => $input['alamat'][$x],
            'ambil' => $input['jumlah'][$x],     
        ]);

        $hapusKeranjang = DB::table('keranjang')->where('id_keranjang', $input['id_keranjang'][$x])->delete();

        }
            
           return redirect()->route('pesanan')->withMessage('Pesanan Keranjang Anda Belum Dibayar [Silahkan Lakukan Pembayaran]');
    }

        //Close MIDevoloper

        public function pesanansekarang(Request $request, $id_produk=null){
            if (auth::guard('pengguna')->check()){
                $id = Auth::guard('pengguna')->user()->id;
                $pengguna = Pengguna::find($id);
                $pesanan = Pesanan ::where ('id_pengguna', $id)
                                // ->where('id_pesanan', $request->id_pesanan)
                                ->first();

                if($id_produk == null){
                    $produk = Keranjang::where('id_pengguna', $id)->get();
                }else{
                    $produk = Produk::where('id',$id_produk)->first();
                }

                $pesanan = DetailPesanan::where(function($pesanan) use ($id) {
                    $pesanan->where('id_penjual', '=', $id)
                    ->orWhere('id_pembeli', '=', $id);
                })
                ->Where('status', '=', 'belum bayar')
                ->orderBy('id_detail','DESC')->get();
    
              $data2 = [];
              foreach ($pesanan as $data)
              {
                $variable1 = $request->id_pengguna;
                $variable2 = $request->id_pengguna;
                $pesanan1 = DetailPesanan::where('id_pesanan', '=', $data->id_pesanan)
                   ->where(function($pesanan1) use ($variable1,$variable2){
                        $pesanan1->where('id_penjual','=',$variable1)
                       ->orWhere('id_pembeli','=',$variable2);
                })->sum('total_keuntungan');
    
                $produk = DetailPesanan::where('id_pesanan', '=', $data->id_pesanan)
                   ->where(function($pesanan1) use ($variable1,$variable2){
                        $pesanan1->where('id_penjual','=',$variable1)
                       ->orWhere('id_pembeli','=',$variable2);
                })->get();
    
                $produks = [];
    
                foreach ($produk as $dataProduk) {
                  $produks[] = [
                    'nama_produk' => $dataProduk->produk->nama,
                    'jumlah' => $dataProduk->jumlah,
                    'satuan' => $dataProduk->produk->satuan,
                  ];
                }
    
               $data2[] = [
                   'id_detail' => $data->id_detail,
                   'id_pesanan' => $data->id_pesanan,
                   'id_penjual' => $data->id_penjual,
                   'id_pembeli' => $data->id_pembeli,
                   'id_produk' => $data->id_produk,
                   //'nama_produk' => $data->produk->nama,
                   'jumlah' => $data->jumlah,
                   //'satuan' => $data->produk->satuan,
                   'tanggal' => date("d M Y", strtotime($data->created_at)),
                   'nama_penjual' => $data->penjual->nama,
                   'telp_penjual' => $data->penjual->no_telp,
                   'foto_penjual' => $data->penjual->foto,
                   'nama_pembeli' => $data->pembeli->nama,
                   'telp_pembeli' => $data->pembeli->no_telp,
                   'foto_pembeli' => $data->pembeli->foto,
                   // 'produk' => $produks,
                   // 'total_keuntungan' => $pesanan1,
                   'total_keuntungan' => $data->total_keuntungan,
                   'status' => $data->status,
               ];
              }

              //MI Developer
              $belum_bayar = DB::select("select b.alamat_antar, a.id_pesanan, a.total_bayar, b.status, c.foto2, a.created_at 
              FROM pesanan a, detail_pesanan b, produk c
              WHERE a.id_pengguna = b.id_pembeli
              AND a.id_pengguna = '".$id."'
              AND b.id_produk = c.id
              AND b.id_pesanan = a.id_pesanan
              AND b.status ='Belum Bayar'
              ORDER BY id_detail DESC");


                $produk = Produk::find($id_produk);
                return view('profil/PesananSaya')->with([
                    'produk' => $produk,
                    'pengguna' => $pengguna,
                    'id' => $id_produk,
                    'pesanan'=> $pesanan,
                    'belum_bayar'=>$belum_bayar
                ]);

            }else{
                $produk=Produk::get();
                return view('welcome')->with([
                   'produk' => $produk
               ]);
            }
    
        }

        

        public function bdiproses($id_produk=null, Request $request){{
            $id = Auth::guard('pengguna')->user()->id;
            $pengguna = Pengguna::find($id);
            // $produk = Produk::find($id_produk);
            // $variableku1 = $request->id_pengguna;
            $pesanan = DetailPesanan::where(function($pesanan) use ($id) {
                $pesanan->where('id_penjual', '=', $id)
                ->orWhere('id_pembeli', '=', $id);
            })
            ->Where('status', '=', 'diproses')->orderBy('created_at','DESC')->get();

          $data2 = [];
          foreach ($pesanan as $data)
          {
            $variable1 = $request->id_pengguna;
            $variable2 = $request->id_pengguna; 
            $pesanan1 = DetailPesanan::where('id_pesanan', '=', $data->id_pesanan)
               ->where(function($pesanan1) use ($variable1,$variable2){
                    $pesanan1->where('id_penjual','=',$variable1)
                   ->orWhere('id_pembeli','=',$variable2);
            })->sum('total_keuntungan');

            $produk = DetailPesanan::where('id_pesanan', '=', $data->id_pesanan)
               ->where(function($pesanan1) use ($variable1,$variable2){
                    $pesanan1->where('id_penjual','=',$variable1)
                   ->orWhere('id_pembeli','=',$variable2);
            })->get();

            $produks = [];

            foreach ($produk as $dataProduk) {
              $produks[] = [
                'nama_produk' => $dataProduk->produk->nama,
                'jumlah' => $dataProduk->jumlah,
                'satuan' => $dataProduk->produk->satuan,
              ];
            }

           $data2[] = [
             'id_detail' => $data->id_detail,
             'id_pesanan' => $data->id_pesanan,
             'id_penjual' => $data->id_penjual,
             'id_pembeli' => $data->id_pembeli,
             'id_produk' => $data->id_produk,
            // 'nama_produk' => $data->produk->nama,
             'jumlah' => $data->jumlah,
            // 'satuan' => $data->produk->satuan,
             'tanggal' => date("d M Y", strtotime($data->created_at)),
             'nama_penjual' => $data->penjual->nama,
             'telp_penjual' => $data->penjual->no_telp,
             'foto_penjual' => $data->penjual->foto,
             'nama_pembeli' => $data->pembeli->nama,
             'telp_pembeli' => $data->pembeli->no_telp,
             'foto_pembeli' => $data->pembeli->foto,
             // 'produk' => $produks,
             // 'total_keuntungan' => $pesanan1,
             'total_keuntungan' => $data->total_keuntungan,
             'status' => $data->status,
           ];
          }

          $bdiproses = DB::select("select b.total_keuntungan, b.alamat_antar, a.id_pesanan, a.total_bayar, b.status, c.foto2, a.created_at 
              FROM pesanan a, detail_pesanan b, produk c
              WHERE a.id_pengguna = b.id_pembeli
              AND a.id_pengguna = '".$id."'
              AND b.id_produk = c.id
              AND b.id_pesanan = a.id_pesanan
              AND b.status ='Diproses'");
        
          return view('adminbeli/bdiproses')->withPesanan($pesanan)->withPengguna($pengguna)->with([
            'bdiproses' => $bdiproses
        ]);
        }

        
        }

        public function bdikirim($id_produk=null, Request $request ){
            if (auth::guard('pengguna')->check()){
                $id = Auth::guard('pengguna')->user()->id;
                $pengguna = Pengguna::find($id);
               // $variableku1 = $request->id_pengguna;
               $pesanan = DetailPesanan::where(function($pesanan) use ($id) {
                $pesanan->where('id_penjual', '=', $id)
                ->orWhere('id_pembeli', '=', $id);
            })
            ->Where('status', '=', 'dikirim')->orderBy('created_at','DESC')->get();

          $data2 = [];
          foreach ($pesanan as $data)
          {
            $variable1 = $request->id_pengguna;
            $variable2 = $request->id_pengguna; 
            $pesanan1 = DetailPesanan::where('id_pesanan', '=', $data->id_pesanan)
               ->where(function($pesanan1) use ($variable1,$variable2){
                    $pesanan1->where('id_penjual','=',$variable1)
                   ->orWhere('id_pembeli','=',$variable2);
            })->sum('total_keuntungan');

            $produk = DetailPesanan::where('id_pesanan', '=', $data->id_pesanan)
               ->where(function($pesanan1) use ($variable1,$variable2){
                    $pesanan1->where('id_penjual','=',$variable1)
                   ->orWhere('id_pembeli','=',$variable2);
            })->get();

            $produks = [];

            foreach ($produk as $dataProduk) {
              $produks[] = [
                'nama_produk' => $dataProduk->produk->nama,
                'jumlah' => $dataProduk->jumlah,
                'satuan' => $dataProduk->produk->satuan,
              ];
            }

           $data2[] = [
             'id_detail' => $data->id_detail,
             'id_pesanan' => $data->id_pesanan,
             'id_penjual' => $data->id_penjual,
             'id_pembeli' => $data->id_pembeli,
             'id_produk' => $data->id_produk,
            // 'nama_produk' => $data->produk->nama,
             'jumlah' => $data->jumlah,
            // 'satuan' => $data->produk->satuan,
             'tanggal' => date("d M Y", strtotime($data->created_at)),
             'nama_penjual' => $data->penjual->nama,
             'telp_penjual' => $data->penjual->no_telp,
             'foto_penjual' => $data->penjual->foto,
             'nama_pembeli' => $data->pembeli->nama,
             'telp_pembeli' => $data->pembeli->no_telp,
             'foto_pembeli' => $data->pembeli->foto,
             // 'produk' => $produks,
             // 'total_keuntungan' => $pesanan1,
             'total_keuntungan' => $data->total_keuntungan,
             'status' => $data->status,
           ];
          }

                return view('adminbeli/bdikirim')->withPesanan($pesanan)->withPengguna($pengguna);
            }else{
                $produk=Produk::get();
                return view('welcome')->with([
                   'produk' => $produk
               ]);
            }
    
        }

        public function bditerima($id_produk=null, Request $request){
            if (auth::guard('pengguna')->check()){
                $id = Auth::guard('pengguna')->user()->id;
                $pengguna = Pengguna::find($id);
                $pesanan = DetailPesanan::where(function($pesanan) use ($id) {
                    $pesanan->where('id_penjual', '=', $id)
                    ->orWhere('id_pembeli', '=', $id);
                })
                ->Where('status', '=', 'diterima')->orderBy('created_at','DESC')->get();
    
              $data2 = [];
              foreach ($pesanan as $data)
              {
                $variable1 = $request->id_pengguna;
                $variable2 = $request->id_pengguna; 
                $pesanan1 = DetailPesanan::where('id_pesanan', '=', $data->id_pesanan)
                   ->where(function($pesanan1) use ($variable1,$variable2){
                        $pesanan1->where('id_penjual','=',$variable1)
                       ->orWhere('id_pembeli','=',$variable2);
                })->sum('total_keuntungan');
    
                $produk = DetailPesanan::where('id_pesanan', '=', $data->id_pesanan)
                   ->where(function($pesanan1) use ($variable1,$variable2){
                        $pesanan1->where('id_penjual','=',$variable1)
                       ->orWhere('id_pembeli','=',$variable2);
                })->get();
    
                $produks = [];
    
                foreach ($produk as $dataProduk) {
                  $produks[] = [
                    'nama_produk' => $dataProduk->produk->nama,
                    'jumlah' => $dataProduk->jumlah,
                    'satuan' => $dataProduk->produk->satuan,
                  ];
                }
    
               $data2[] = [
                 'id_detail' => $data->id_detail,
                 'id_pesanan' => $data->id_pesanan,
                 'id_penjual' => $data->id_penjual,
                 'id_pembeli' => $data->id_pembeli,
                 'id_produk' => $data->id_produk,
                // 'nama_produk' => $data->produk->nama,
                 'jumlah' => $data->jumlah,
                // 'satuan' => $data->produk->satuan,
                 'tanggal' => date("d M Y", strtotime($data->created_at)),
                 'nama_penjual' => $data->penjual->nama,
                 'telp_penjual' => $data->penjual->no_telp,
                 'foto_penjual' => $data->penjual->foto,
                 'nama_pembeli' => $data->pembeli->nama,
                 'telp_pembeli' => $data->pembeli->no_telp,
                 'foto_pembeli' => $data->pembeli->foto,
                 // 'produk' => $produks,
                 // 'total_keuntungan' => $pesanan1,
                 'total_keuntungan' => $data->total_keuntungan,
                 'status' => $data->status,
               ];
              }

                return view('adminbeli/bditerima')->withPengguna($pengguna)->withPesanan($pesanan);
            }else{
                $produk=Produk::get();
                return view('welcome')->with([
                   'produk' => $produk
               ]);
            }
    
        }

        public function bbatal($id_produk=null, Request $request){
            if (auth::guard('pengguna')->check()){
                $id = Auth::guard('pengguna')->user()->id;
                $pengguna = Pengguna::find($id);

                $pesanan = DetailPesanan::where(function($pesanan) use ($id) {
                    $pesanan->where('id_penjual', '=', $id)
                    ->orWhere('id_pembeli', '=', $id);
                })
                ->Where('status', '=', 'batal')->orderBy('created_at','DESC')->get();
    
              $data2 = [];
              foreach ($pesanan as $data)
              {
                $variable1 = $request->id_pengguna;
                $variable2 = $request->id_pengguna; 
                $pesanan1 = DetailPesanan::where('id_pesanan', '=', $data->id_pesanan)
                   ->where(function($pesanan1) use ($variable1,$variable2){
                        $pesanan1->where('id_penjual','=',$variable1)
                       ->orWhere('id_pembeli','=',$variable2);
                })->sum('total_keuntungan');
    
                $produk = DetailPesanan::where('id_pesanan', '=', $data->id_pesanan)
                   ->where(function($pesanan1) use ($variable1,$variable2){
                        $pesanan1->where('id_penjual','=',$variable1)
                       ->orWhere('id_pembeli','=',$variable2);
                })->get();
    
                $produks = [];
    
                foreach ($produk as $dataProduk) {
                  $produks[] = [
                    'nama_produk' => $dataProduk->produk->nama,
                    'jumlah' => $dataProduk->jumlah,
                    'satuan' => $dataProduk->produk->satuan,
                  ];
                }
    
               $data2[] = [
                 'id_detail' => $data->id_detail,
                 'id_pesanan' => $data->id_pesanan,
                 'id_penjual' => $data->id_penjual,
                 'id_pembeli' => $data->id_pembeli,
                 'id_produk' => $data->id_produk,
                // 'nama_produk' => $data->produk->nama,
                 'jumlah' => $data->jumlah,
                // 'satuan' => $data->produk->satuan,
                 'tanggal' => date("d M Y", strtotime($data->created_at)),
                 'nama_penjual' => $data->penjual->nama,
                 'telp_penjual' => $data->penjual->no_telp,
                 'foto_penjual' => $data->penjual->foto,
                 'nama_pembeli' => $data->pembeli->nama,
                 'telp_pembeli' => $data->pembeli->no_telp,
                 'foto_pembeli' => $data->pembeli->foto,
                 // 'produk' => $produks,
                 // 'total_keuntungan' => $pesanan1,
                 'total_keuntungan' => $data->total_keuntungan,
                 'status' => $data->status,
               ];
              }

              $bbatal = DB::select("select b.*, c.foto2 
              FROM pesanan a, detail_pesanan b, produk c
              WHERE a.id_pengguna = b.id_pembeli
              AND a.id_pengguna = '".$id."'
              AND b.id_produk = c.id
              AND b.id_pesanan = a.id_pesanan
              AND b.status ='batal'");

                return view('adminbeli/bbatal')->withPengguna($pengguna)->withPesanan($pesanan)->with([
                    'batal' => $bbatal
                ]);
            }else{
                $produk=Produk::get();
                return view('welcome')->with([
                   'produk' => $produk
               ]);
            }
    
        }
       
        public function hapusKeranjang(Request $request){
            $keranjang = Keranjang::where('id_keranjang', $request->id_keranjang)->first();
           // $keranjang = DB :: table('keranjang')->where('id_keranjang')->first();
            if($keranjang != null){
              $keranjang->delete();
              return redirect()->route('welcome')->withMessage('Berhasil Hapus produk keranjang');
            }else{
              return redirect()->route('welcome')->withMessage('Gagal Hapus Produk');
            }
        }
       
        
        public function lihatKeranjang(){
            
            if (Auth::guard('pengguna')->check()){
                $id = Auth::guard('pengguna')->user()->id;
                $pengguna = Pengguna::find($id);
                $keranjang = Keranjang::where('id_pengguna', '=',Auth::guard('pengguna')->user()->id)->get();
                $jumlah = 1;
                if($keranjang ==NULL){

                }else{
                return view('test/keranjang')->withPengguna($pengguna)->withKeranjang($keranjang)->withJumlah($jumlah);
            }
            }else{
                $produk=Produk::get();
                return view('welcome')->with([
                    'produk' => $produk,
                ]);
            }
        }

        public function ubahStatusBatal(Request $request, $pengguna=null){
       //   $this->kirimNotifikasi($request->id_pembeli, 6);
       
            DetailPesanan::where('id_pesanan','=',$request->id_pesanan)->update(['status' => 'batal']);
            return redirect()->route('bbatal')->withMessage('Pesanan Dibatalkan');
          }

        // public function kirimNotifikasi($id_pengguna, $jenis, $token){
        //   $res = array();
        //   if($jenis == 1){
        //     $res['data']['message'] = "Ada Pesanan Masuk";
        //     $res['data']['title'] = "Pesanan";
        //   }else if($jenis == 2){
        //     $res['data']['message'] = "Pembayaran Anda Sudah Diverifikasi oleh admin";
        //     $res['data']['title'] = "Notifikasi";
        //   }else if($jenis == 3){
        //     $res['data']['message'] = "Silahkan Proses Pesanan dari Konsumen";
        //     $res['data']['title'] = "Notifikasi";
        //   }else if($jenis == 4){
        //     $res['data']['message'] = "Pesanan Anda Sedang Dikirim";
        //     $res['data']['title'] = "Notifikasi";
        //   }else if($jenis == 5){
        //     $res['data']['message'] = "Pesanan Anda Selesai";
        //     $res['data']['title'] = "notifikasi";
        //   }else if($jenis == 6){
        //     $res['data']['message'] = "Pesanan Anda Dibatalkan";
        //     $res['data']['title'] = "notifikasi";
        //   }

        // $res['data']['image'] = null;
        // $token = Pengguna::select('token')->where('id','=',$id_pengguna)->first();
        // $token_terpilih =  array($token->token);

        // $fields = array(
        //         'registration_ids' => $token_terpilih,
        //         'data' => $res,
        //     );

        // $url = 'https://fcm.googleapis.com/fcm/send';

        // //building headers for the request
        // $headers = array(
        //     'Authorization: key=AAAAoqG0Hvg:APA91bGanAxYn7sA0iiPolmRrFKW0Wiv6ER087Zib28rT8kfhSn-JlnMLDFOPUax-zEMYXrUcnZS8u5PM_qeTp7PgfM6ZbEeTWjAGVmO2Wylz106AiDae3NUK5NqQTwzgb_shbLzcPAA',
        //     'Content-Type: application/json'
        // );

        // //Initializing curl to open a connection
        // $ch = curl_init();

        // //Setting the curl url
        // curl_setopt($ch, CURLOPT_URL, $url);

        // //setting the method as post
        // curl_setopt($ch, CURLOPT_POST, true);

        // //adding headers
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // //disabling ssl support
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        // //adding the fields in json format
        // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        // //finally executing the curl request
        // $result = curl_exec($ch);
        // if ($result === FALSE) {
        //     die('Curl failed: ' . curl_error($ch));
        // }

        // //Now close the connection
        // curl_close($ch);
        // // echo $result;
        // }

        






}
