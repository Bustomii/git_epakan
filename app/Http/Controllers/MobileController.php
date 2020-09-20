<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Produk;
use App\Pengguna;
use App\Pesanan;
use App\DetailPesanan;
use App\Keranjang;
use App\SaldoMasuk;
use App\SaldoCair;
use App\Versi;
use App\Operator;
use App\RequestMitra;
use App\StokKurang;
use App\Kabupaten;
use App\Kecamatan;
use App\Ongkir;
use App\Notifikasi;
use DB;
use Image;
use Session;
use Auth;

class MobileController extends Controller
{

    //Pengguna
    public function login(Request $request){
        if(Auth::guard('pengguna')->attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::guard('pengguna')->user();
            $success['keterangan'] = "Berhasil Login";
            $success['id'] = $user->id;
            $success['nama'] = $user->nama;
            $success['no_telp'] = $user->no_telp;
            $success['token'] = $user->token;
            $success['alamat'] = $user->alamat;
            $success['daerah'] = $user->daerah;
            $success['foto'] = $user->foto;
            $success['saldo'] = $user->saldo;
            $success['email'] = $user->email;
            $success['password'] = $user->password;
            $success['status'] = $user->status;

            $pengguna = Pengguna::find($user->id);
            $pengguna->token = $request->token;
            $pengguna->save();
            return response()->json(['success' => $success]);
        }else{
            return response()->json(['error' => 'Gagal Login']);
        }
      }

      public function loginOTP(Request $request){
        $user = Pengguna::where('no_telp', $request->no_telp)->where('kode_verifikasi', $request->kode_verifikasi)->first();
        if (!empty($user)) {
          if(Auth::guard('pengguna')->loginUsingId($user->id)){

            $users_count = DB::table('oauth_access_tokens')
                            ->where('user_id', '=', $user->id)
                            ->count();
            if($users_count > 0){
                DB::table('oauth_access_tokens')->where('user_id', '=', $user->id)->delete();
                $success['remember_token'] =  $user->createToken('MyApp')-> accessToken; 
            }else{
                $success['remember_token'] =  $user->createToken('MyApp')-> accessToken; 
            }
            
            $success['keterangan'] = "Berhasil Login";
            $success['id'] = $user->id;
            $success['nama'] = $user->nama;
            $success['no_telp'] = $user->no_telp;
            $success['token'] = $user->token;
            $success['alamat'] = $user->alamat;
            $success['daerah'] = $user->daerah;
            $success['foto'] = $user->foto;
            $success['saldo'] = $user->saldo;
            $success['email'] = $user->email;
            $success['password'] = $user->password;
            $success['status'] = $user->status;

            $pengguna = Pengguna::find($user->id);
            $pengguna->token = $request->token;
            $pengguna->save();
            return response()->json(['success' => $success]);
          }
        }else{
          $success['keterangan'] = "Gagal Login";
          return response()->json(['success' => $success]);
        }
      }

      public function register(Request $request){
        $pengguna = new Pengguna;
        $pengguna->nama=$request->nama;
        $pengguna->email=$request->email;
        $pengguna->password = bcrypt($request->password);
        $pengguna->no_telp=$request->no_telp;
        $pengguna->alamat=$request->alamat;
        $pengguna->daerah=$request->daerah;
        $pengguna->token=$request->token;

        if($pengguna->save()){
          return response()->json(['success' => 'Berhasil Register']);
        }else{
          return response()->json(['error' => 'Gagal Register']);
        }
      }

      public function registerOTP(Request $request){
        $cek = Pengguna::where('no_telp', $request->no_telp)->get();
        if($cek->count() > 0){
          return response()->json(['success' => 'Nomor Sudah Terdaftar']);
        }else{
          $pengguna = new Pengguna;
          $pengguna->nama = $request->nama;
          $pengguna->no_telp = $request->no_telp;
          $pengguna->alamat = $request->alamat;
          $pengguna->daerah = $request->daerah;
          $pengguna->token = $request->token;
          $pengguna->kode_verifikasi = $request->kode_verifikasi;

          if($pengguna->save()){
            return response()->json(['success' => 'Berhasil Register']);
          }else{
            return response()->json(['error' => 'Gagal Register']);
          }
        }
      }

      public function kirimUlangOTP(Request $request){
        $cek = Pengguna::where('no_telp', $request->no_telp)->get();
        if($cek->count() > 0){
          $pengguna = Pengguna::where('no_telp', $request->no_telp)->first();
          $pengguna->kode_verifikasi = $request->kode_verifikasi;
          $this->kirimOTP($request);
          if($pengguna->save()){
            return response()->json(['success' => 'Berhasil Kirim Ulang OTP']);
          }else{
            return response()->json(['error' => 'Gagal Kirim Ulang OTP']);
          }
        }else{
          return response()->json(['success' => 'Nomor Tidak Terdaftar']);
        }

      }

      public function updateProfil(Request $request){
        $pengguna = Pengguna::find($request->id);
        $pengguna->nama=$request->nama;
        $pengguna->email=$request->email;
        $pengguna->no_telp=$request->no_telp;
        $pengguna->alamat=$request->alamat;
        $pengguna->daerah=$request->daerah;
        $pengguna->password = bcrypt($request->password);

        if ($request->hasFile('foto')){
            $file = $request->file('foto');
            $ext = $file->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $newName = "foto_pengguna_".$request->id."_".$newName;
            $file->move('uploads/file',$newName);
            $pengguna->foto = $newName;
        }

        if($pengguna->save()){
          return response()->json(['success' => 'Berhasil Update','foto' => $pengguna->foto]);
        }else{
          return response()->json(['error' => 'Gagal Update']);
        }
      }

      //Produk
      public function tambahProduk(Request $request){
        $produk = new Produk;
        $produk->id_pengguna=$request->id_pengguna;
        $produk->nama=$request->nama;
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
            $newName = "foto_produk_".$request->id_pengguna."_1_".$newName;
            $file->move('uploads/file',$newName);
            $produk->foto = $newName;
        }
        if($request->hasFile('foto2')){
            $file = $request->file('foto2');
            $ext = $file->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $newName = "foto_produk_".$request->id_pengguna."_2_".$newName;
            $file->move('uploads/file',$newName);
            $produk->foto2 = $newName;
        }
        if($request->hasFile('foto3')){
            $file = $request->file('foto3');
            $ext = $file->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $newName = "foto_produk_".$request->id_pengguna."_3_".$newName;
            $file->move('uploads/file',$newName);
            $produk->foto3 = $newName;
        }

        if($produk->save()){
          return response()->json(['success' => 'Berhasil Tambah Produk']);
        }else{
          return response()->json(['error' => 'Gagal Tambah Produk']);
        }
      }

      public function ubahProduk(Request $request){
        $produk = Produk::find($request->id);
        $produk->id_pengguna=$request->id_pengguna;
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
            $newName = "foto_produk_".$request->id_pengguna."_1_".$newName;
            $file->move('uploads/file',$newName);
            $produk->foto = $newName;
        }
        if($request->hasFile('foto2')){
            $file = $request->file('foto2');
            $ext = $file->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $newName = "foto_produk_".$request->id_pengguna."_2_".$newName;
            $file->move('uploads/file',$newName);
            $produk->foto2 = $newName;
        }
        if($request->hasFile('foto3')){
            $file = $request->file('foto3');
            $ext = $file->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $newName = "foto_produk_".$request->id_pengguna."_3_".$newName;
            $file->move('uploads/file',$newName);
            $produk->foto3 = $newName;
        }

        if($produk->save()){
          return response()->json(['success' => 'Berhasil Ubah Produk']);
        }else{
          return response()->json(['error' => 'Gagal Ubah Produk']);
        }
      }

      public function hapusProduk(Request $request){
        $produk = Produk::find($request->id);
        if($produk->delete()){
          return response()->json(['success' => 'Berhasil Hapus Produk']);
        }else{
          return response()->json(['error' => 'Gagal Hapus Produk']);
        }
      }

      public function daftarProdukPenjual(Request $request){
        $produk = Produk::where('id_pengguna','=',$request->id_pengguna)->orderBy('created_at','DESC')->get();

        $data2 = [];
        foreach ($produk as $data)
        {
           $data2[] = [
             'id' => $data->id,
             'id_pengguna' => $data->id_pengguna,
             'nama' => $data->nama,
             'jenis' => $data->jenis,
             'harga' => $data->harga,
             'satuan' => $data->satuan,
             'status' => $data->status,
             'kategori' => $data->kategori,
             'lokasi' => $data->lokasi,
             'foto' => $data->foto,
             'foto2' => $data->foto2,
             'foto3' => $data->foto3,
             'deskripsi' => $data->deskripsi,
             'nama_penjual' => $data->pengguna->nama,
             'foto_penjual' => $data->pengguna->foto,
             'no_telp' => $data->pengguna->no_telp,
             'iklan' => $data->iklan,
             'minimum' => $data->minimum,
             'stok' => $data->stok,
           ];
        }
        return response()->json(['success'=>$data2]);
      }

      public function daftarProdukHome(){
        $produk = Produk::where('iklan','=',1)->orderBy('id', 'DESC')->limit(5)->get();

        $data2 = [];
        foreach ($produk as $data)
        {
           $data2[] = [
               'id' => $data->id,
               'id_pengguna' => $data->id_pengguna,
               'nama' => $data->nama,
               'jenis' => $data->jenis,
               'harga' => $data->harga,
               'satuan' => $data->satuan,
               'status' => $data->status,
               'kategori' => $data->kategori,
               'lokasi' => $data->pengguna->daerah,
               'foto' => $data->foto,
               'foto2' => $data->foto2,
               'foto3' => $data->foto3,
               'deskripsi' => $data->deskripsi,
               'nama_penjual' => $data->pengguna->nama,
               'foto_penjual' => $data->pengguna->foto,
               'no_telp' => $data->pengguna->no_telp,
               'iklan' => $data->iklan,
               'minimum' => $data->minimum,
               'stok' => $data->stok,
           ];
        }
        return response()->json(['success'=>$data2]);
      }

      public function daftarProdukKategori($kategori, $halaman){
        if($kategori == "Semua Kategori"){
          $produk = Produk::where('iklan','=',1)->orderBy('id', 'DESC')->forPage($halaman,6)->get();
        }else{
          $produk = Produk::where('kategori','=',$kategori)->where('iklan','=',1)->orderBy('id', 'DESC')->forPage($halaman,6)->get();
        }

        $data2 = [];
        foreach ($produk as $data)
        {
           $data2[] = [
               'id' => $data->id,
               'id_pengguna' => $data->id_pengguna,
               'nama' => $data->nama,
               'jenis' => $data->jenis,
               'harga' => $data->harga,
               'satuan' => $data->satuan,
               'status' => $data->status,
               'kategori' => $data->kategori,
               'lokasi' => $data->pengguna->daerah,
               'foto' => $data->foto,
               'foto2' => $data->foto2,
               'foto3' => $data->foto3,
               'deskripsi' => $data->deskripsi,
               'nama_penjual' => $data->pengguna->nama,
               'foto_penjual' => $data->pengguna->foto,
               'no_telp' => $data->pengguna->no_telp,
               'iklan' => $data->iklan,
               'minimum' => $data->minimum,
               'stok' => $data->stok,
           ];
        }
        return response()->json(['success'=>$data2]);
      }

      public function pencarianProduk(Request $request){

        if($request->kategori == "Semua Kategori" && $request->nama == NULL){
          $produk = Produk::where('iklan','=',1)->forPage($request->halaman,6)->orderBy('id','DESC')->get();
        }else if($request->kategori == "Semua Kategori"  && $request->nama != NULL){
          $produk = Produk::where('nama','LIKE','%'.$request->nama.'%')->where('iklan','=',1)->forPage($request->halaman,6)->orderBy('id','DESC')->get();
        }else{
          $produk = Produk::where('kategori','=',$request->kategori)->where('nama','LIKE','%'.$request->nama.'%')->where('iklan','=',1)->forPage($request->halaman,6)->orderBy('id','DESC')->get();
        }

        $data2 = [];
        foreach ($produk as $data)
        {
           $data2[] = [
               'id' => $data->id,
               'id_pengguna' => $data->id_pengguna,
               'nama' => $data->nama,
               'jenis' => $data->jenis,
               'harga' => $data->harga,
               'satuan' => $data->satuan,
               'status' => $data->status,
               'kategori' => $data->kategori,
               'lokasi' => $data->pengguna->daerah,
               'foto' => $data->foto,
               'foto2' => $data->foto2,
               'foto3' => $data->foto3,
               'deskripsi' => $data->deskripsi,
               'nama_penjual' => $data->pengguna->nama,
               'foto_penjual' => $data->pengguna->foto,
               'no_telp' => $data->pengguna->no_telp,
               'iklan' => $data->iklan,
               'minimum' => $data->minimum,
               'stok' => $data->stok,
           ];
        }
        return response()->json(['success'=>$data2]);
      }

      public function pesan(Request $request){
        date_default_timezone_set('Asia/Jakarta');

        // $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        // $charactersLength = strlen($characters);
        // $randomString = '';
        // for ($i = 0; $i < 2; $i++) {
        //     $randomString .= $characters[rand(0, $charactersLength - 1)];
        // }
        //
        // $kode_pesanan = date('YmdHis');
        // $kode_pesanan = $randomString.substr($kode_pesanan,2);
        // return response()->json(['success'=>$kode_pesanan]);
        $pesanan = new Pesanan;
        $pesanan->id_pesanan = $request->kode_pesanan;
        $pesanan->ongkir = $request->ongkir;
        $pesanan->harga = $request->harga;
        $pesanan->total_bayar = $request->total_bayar;
        $pesanan->id_pengguna = $request->id_pengguna;


        if ($request->hasFile('foto')){
            $file = $request->file('foto');
            $ext = $file->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $newName = "foto_pesanan_".$request->id_pengguna."_".$newName;
            $file->move('uploads/file',$newName);
            $pesanan->foto = $newName;
        }

        if($pesanan->save()){
          return response()->json(['success' => 'Berhasil Tambah Pesanan']);
        }else{
          return response()->json(['error' => 'Gagal Tambah Pesanan']);
        }
      }

      public function ubahStatusPesan(Request $request){
        $pesanan = Pesanan::where('id_pesanan','=',$request->kode_pesanan)->where('id_pengguna', '=', $request->id_pengguna)->first();

        $this->kirimNotifikasiAdmin();

        if ($request->hasFile('foto')){
            $file = $request->file('foto');
            $ext = $file->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $newName = "foto_pesanan_".$request->id_pengguna."_".$newName;
            $file->move('uploads/file',$newName);
            $pesanan->foto = $newName;
        }

        if($pesanan->save()){
          return response()->json(['success' => 'Berhasil Ubah Status Pesanan']);
        }else{
          return response()->json(['error' => 'Gagal Ubah Status Pesanan']);
        }
        // return response()->json(['success' => 'Berhasil Ubah Status Pesanan']);
      }

      public function konfirmasiBayarPesan(Request $request){
        $pesanan = Pesanan::where('id_pesanan','=',$request->kode_pesanan)->first();
        DetailPesanan::where('id_pesanan','=',$request->kode_pesanan)->update(['status' => 'diproses']);

        $detailPesanan = DetailPesanan::where('id_pesanan','=',$request->kode_pesanan)->get();



        foreach ($detailPesanan as $data)
        {
          $this->kirimNotifikasi($data->id_pembeli,2);
          $this->kirimNotifikasi($data->id_penjual,3);
        }

        $pesanan->status = "lunas";
        if($pesanan->save()){
          return response()->json(['success' => 'Berhasil Dikonfirmasi']);
        }else{
          return response()->json(['error' => 'Gagal Dikonfirmasi']);
        }
      }

      public function tambahDetailPesan(Request $request){
        $detail = new DetailPesanan;
        $detail->id_pesanan = $request->kode_pesanan;
        $detail->id_penjual = $request->id_penjual;
        $detail->id_pembeli = $request->id_pembeli;
        $detail->id_produk = $request->id_produk;
        $detail->harga = $request->harga;
        $detail->ongkir = $request->ongkir;
        $detail->total_keuntungan = $request->total_keuntungan;
        $detail->jumlah = $request->jumlah;
        $detail->alamat_antar = $request->alamat_antar;
        $detail->ambil = $request->ambil;

        $this->kirimNotifikasi($request->id_penjual, 1);

        if($detail->save()){
          return response()->json(['success' => 'Berhasil Tambah Detail Pesanan']);
        }else{
          return response()->json(['error' => 'Gagal Tambah Detail Pesanan']);
        }
      }

      public function ubahStatusDikirim(Request $request){
        $this->kirimNotifikasi($request->id_pembeli, 4);
        DetailPesanan::where('id_pesanan','=',$request->kode_pesanan)->where('id_penjual', $request->id_penjual)->where('id_pembeli', $request->id_pembeli)->update(['status' => 'dikirim']);
        return response()->json(['success' => 'Berhasil Dikirim']);
      }

      public function ubahStatusDiterima(Request $request){
        DetailPesanan::where('id_pesanan','=',$request->kode_pesanan)->where('id_penjual', $request->id_penjual)->where('id_pembeli', $request->id_pembeli)->update(['status' => 'diterima']);

        $this->kirimNotifikasi($request->id_pembeli, 5);
        $this->kirimNotifikasi($request->id_penjual, 5);

        $pesanan = DetailPesanan::where('id_pesanan', $request->kode_pesanan)
                                ->where('id_penjual', $request->id_penjual)
                                ->get();
        if($pesanan->count() > 0){


          foreach ($pesanan as $data)
          {
            // $saldo = SaldoMasuk::where('id_pesanan', $request->kode_pesanan)
            //                     ->where('id_pengguna', $request->id_penjual)
            //                     ->first();
            // if($saldo != null){
            //     return response()->json(['success' => 'Saldo Tidak Tertambah']);
            // }else {
            //
            //
            //
            // }

            $saldo= new SaldoMasuk;
            $saldo->id_pesanan = $request->kode_pesanan;
            $saldo->id_pengguna = $request->id_penjual;
            // $saldo->saldo = $pesanan->total_keuntungan;
            $keuntungan = $data->total_keuntungan - ($data->total_keuntungan*0.05);
            $saldo->saldo = $keuntungan;
            $saldo->save();

            $this->stokKurang($data->id_produk, $data->jumlah);

          }
          return response()->json(['success' => 'Berhasil Diterima dan Saldo diteruskan ke penjual']);



        }else {
            return response()->json(['success' => 'Pesanan Tidak Valid']);
        }
      }

      public function ubahStatusDiambil(Request $request){
        DetailPesanan::where('id_pesanan','=',$request->kode_pesanan)->where('id_penjual', $request->id_penjual)->where('id_pembeli', $request->id_pembeli)->update(['status' => 'diambil']);

        $this->kirimNotifikasi($request->id_pembeli, 5);
        $this->kirimNotifikasi($request->id_penjual, 5);

        $pesanan = DetailPesanan::where('id_pesanan', $request->kode_pesanan)
                                ->where('id_penjual', $request->id_penjual)
                                ->get();
        if($pesanan->count() > 0){


          foreach ($pesanan as $data)
          {
            // $saldo = SaldoMasuk::where('id_pesanan', $request->kode_pesanan)
            //                     ->where('id_pengguna', $request->id_penjual)
            //                     ->first();
            // if($saldo != null){
            //     return response()->json(['success' => 'Saldo Tidak Tertambah']);
            // }else {
            //
            //
            //
            // }

            $saldo= new SaldoMasuk;
            $saldo->id_pesanan = $request->kode_pesanan;
            $saldo->id_pengguna = $request->id_penjual;
            // $saldo->saldo = $pesanan->total_keuntungan;
            $keuntungan = $data->total_keuntungan - ($data->total_keuntungan*0.05);
            $saldo->saldo = $keuntungan;
            $saldo->save();

            $this->stokKurang($data->id_produk, $data->jumlah);

          }
          return response()->json(['success' => 'Berhasil Diterima dan Saldo diteruskan ke penjual']);



        }else {
            return response()->json(['success' => 'Pesanan Tidak Valid']);
        }
      }

      public function ubahStatusBatal(Request $request){
        $this->kirimNotifikasi($request->id_pembeli, 6);
        DetailPesanan::where('id_pesanan','=',$request->kode_pesanan)->where('id_penjual', $request->id_penjual)->where('id_pembeli', $request->id_pembeli)->update(['status' => 'batal']);
        return response()->json(['success' => 'Pesanan Dibatalkan']);
      }

      public function tambahKeranjang(Request $request){
          $keranjang = Keranjang::where('id_pengguna', $request->id_pengguna)
                                  ->where('id_produk', $request->id_produk)
                                  ->first();
          if($keranjang != null){
              $keranjang->jumlah = $keranjang->jumlah+1;
          }else {
              $keranjang= new Keranjang;
              $keranjang->id_produk = $request->id_produk;
              $keranjang->jumlah = 1;
              $keranjang->id_pengguna = $request->id_pengguna;
          }

          if($keranjang->save()){
            return response()->json(['success' => 'Berhasil Tambah Keranjang']);
          }
      }

      public function daftarKeranjang($id_pengguna){
        // $produk = Keranjang::where('id_pengguna', $id_pengguna)->orderBy('id_keranjang', 'DESC')->get();
        $produk = DB::table('keranjang')
                  ->select('keranjang.id_keranjang as id_keranjang', 'keranjang.id_produk as id_produk', 'produk.nama as nama', 'produk.kategori as kategori', 'produk.satuan as satuan', 'produk.harga as harga', 'produk.foto as foto', 'produk.id_pengguna as id_pengguna')
                  ->join('produk', 'produk.id', '=', 'keranjang.id_produk')
                  ->where('keranjang.id_pengguna', '=', $id_pengguna)
                  ->where('produk.iklan', '=', 1)
                  ->orderBy('keranjang.id_keranjang')
                  ->get();

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
               'id_penjual' => $data->id_pengguna,
           ];
        }
        return response()->json(['success'=>$data2]);
      }

      public function hapusKeranjang(Request $request){
          $keranjang = Keranjang::where('id_keranjang', $request->id_keranjang)->first();
          if($keranjang->delete()){
            return response()->json(['success' => 'Berhasil Hapus Produk']);
          }else{
            return response()->json(['error' => 'Gagal Hapus Produk']);
          }
      }

      public function tambahSaldoPenjual(Request $request){
          $pesanan = DetailPesanan::where('id_pesanan', $request->kode_pesanan)
                                  ->where('id_penjual', $request->id_penjual)
                                  ->where('id_produk', $request->id_produk)
                                  ->first();
          if($pesanan != null){

            $saldo = SaldoMasuk::where('id_pesanan', $request->kode_pesanan)
                                ->where('id_pengguna', $request->id_penjual)
                                ->where('id_produk', $request->id_produk)
                                ->first();
            if($saldo != null){
                return response()->json(['success' => 'Saldo Tidak Tertambah']);
            }else {
                $saldo= new SaldoMasuk;
                $saldo->id_pesanan = $request->kode_pesanan;
                $saldo->id_pengguna = $request->id_penjual;
                $saldo->id_produk = $request->id_produk;

                $keuntungan = $pesanan->total_keuntungan - ($pesanan->total_keuntungan*0.05);
                $saldo->saldo = $keuntungan;
            }

            if($saldo->save()){
              return response()->json(['success' => 'Saldo Berhasil Ditambah']);
            }else{
              return response()->json(['success' => 'Saldo Gagal Ditambah']);
            }
          }else{
              return response()->json(['success' => 'Pesanan Tidak Valid']);
          }
        }

        public function daftarPesananBelum(Request $request){
          // $pesanan = DetailPesanan::where('id_penjual', $request->id_pengguna)->orWhere('id_pembeli', $request->id_pengguna)->orderBy('id_detail', 'DESC');
          // $belum = $pesanan->where('status', 'belum bayar')->get();
          $variableku1 = $request->id_pengguna;
          $pesanan = DetailPesanan::where(function($pesanan) use ($variableku1) {
                $pesanan->where('id_penjual', '=', $variableku1)
                ->orWhere('id_pembeli', '=', $variableku1);
            })
            ->Where('status', '=', 'belum bayar')->orderBy('created_at','DESC')->get();

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
               'nama_produk' => $data->produk->nama,
               'jumlah' => $data->jumlah,
               'satuan' => $data->produk->satuan,
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
          return response()->json(['success'=>$data2]);
        }

        public function daftarPesananDiproses(Request $request){
          $variableku1 = $request->id_pengguna;
          $pesanan = DetailPesanan::where(function($pesanan) use ($variableku1) {
                $pesanan->where('id_penjual', '=', $variableku1)
                ->orWhere('id_pembeli', '=', $variableku1);
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
             'nama_produk' => $data->produk->nama,
             'jumlah' => $data->jumlah,
             'satuan' => $data->produk->satuan,
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
          return response()->json(['success'=>$data2]);
        }

        public function daftarPesananDikirim(Request $request){
          $variableku1 = $request->id_pengguna;
          $pesanan = DetailPesanan::where(function($pesanan) use ($variableku1) {
                $pesanan->where('id_penjual', '=', $variableku1)
                ->orWhere('id_pembeli',  '=', $variableku1);
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
             'nama_produk' => $data->produk->nama,
             'jumlah' => $data->jumlah,
             'satuan' => $data->produk->satuan,
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
          return response()->json(['success'=>$data2]);
        }

        public function daftarPesananDiterima(Request $request){
          $variableku1 = $request->id_pengguna;
          $pesanan = DetailPesanan::where(function($pesanan) use ($variableku1) {
                $pesanan->where('id_penjual', '=', $variableku1)
                ->orWhere('id_pembeli', '=', $variableku1);
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
             'nama_produk' => $data->produk->nama,
             'jumlah' => $data->jumlah,
             'satuan' => $data->produk->satuan,
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
          return response()->json(['success'=>$data2]);
        }

        public function daftarPesananBatal(Request $request){
          $variableku1 = $request->id_pengguna;
          $pesanan = DetailPesanan::where(function($pesanan) use ($variableku1) {
                $pesanan->where('id_penjual', '=', $variableku1)
                ->orWhere('id_pembeli', '=', $variableku1);
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
             'nama_produk' => $data->produk->nama,
             'jumlah' => $data->jumlah,
             'satuan' => $data->produk->satuan,
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
          return response()->json(['success'=>$data2]);
        }

        public function daftarPesananDiambil(Request $request){
          $variableku1 = $request->id_pengguna;
          $pesanan = DetailPesanan::where(function($pesanan) use ($variableku1) {
                $pesanan->where('id_penjual', '=', $variableku1)
                ->orWhere('id_pembeli', '=', $variableku1);
            })
            ->Where('status', '=', 'diambil')->orderBy('created_at','DESC')->get();

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
             'nama_produk' => $data->produk->nama,
             'jumlah' => $data->jumlah,
             'satuan' => $data->produk->satuan,
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
          return response()->json(['success'=>$data2]);
        }

        public function daftarKonfirmasiPesanan(){
          $pesanan = Pesanan::where('status', 'belum')->orderBy('created_at', 'DESC')->get();

          $data2 = [];
          foreach ($pesanan as $data)
          {
             $data2[] = [
                 'id_pesanan' => $data->id_pesanan,
                 'id_pengguna' => $data->id_pengguna,
                 'foto' => $data->foto,
                 'total_bayar' => $data->total_bayar,
                 'tanggal' => date("d M Y", strtotime($data->created_at)),
             ];
          }
          return response()->json(['success'=>$data2]);
        }

        public function daftarPencairanAdmin(){
          $cair = SaldoCair::where('status', 'belum cair')->orderBy('created_at', 'DESC')->get();

          $data2 = [];
          foreach ($cair as $data)
          {
             $data2[] = [
                 'id' => $data->id,
                 'id_pengguna' => $data->id_pengguna,
                 'saldo_now' => $data->pengguna->saldo,
                 'saldo' => $data->saldo,
             ];
          }
          return response()->json(['success'=>$data2]);
        }

        public function konfirmasiPencairan(Request $request){
          $cair = SaldoCair::where('id', $request->id)->first();
          $cair->status = 'sudah cair';
          if($cair->save()){
            return response()->json(['success' => 'Saldo Berhasil Dicairkan']);
          }else{
            return response()->json(['success' => 'Saldo Gagal Dicairkan']);
          }
        }

        public function ambilProfil(Request $request){
          $user = Pengguna::find($request->id);
          $success['id'] = $user->id;
          $success['nama'] = $user->nama;
          $success['no_telp'] = $user->no_telp;
          $success['token'] = $user->token;
          $success['alamat'] = $user->alamat;
          $success['daerah'] = $user->daerah;
          $success['foto'] = $user->foto;
          $success['saldo'] = $user->saldo;
          $success['email'] = $user->email;
          $success['status'] = $user->status;

          return response()->json(['success' => $success]);
        }

        public function cekVersi(Request $request){
          $versi = Versi::find($request->id_versi);
          $success['id_versi'] = $versi->id_versi;
          $success['version_code'] = $versi->version_code;
          $success['version_name'] = $versi->version_name;
          $success['force_update'] = $versi->force_update;

          return response()->json(['success' => $success]);
        }

        public function kirimNotifikasi($id_pengguna, $jenis){
          $res = array();
          if($jenis == 1){
            $res['data']['message'] = "Ada Pesanan Masuk";
            $res['data']['title'] = "Pesanan";
          }else if($jenis == 2){
            $res['data']['message'] = "Pembayaran Anda Sudah Diverifikasi oleh admin";
            $res['data']['title'] = "Notifikasi";
          }else if($jenis == 3){
            $res['data']['message'] = "Silahkan Proses Pesanan dari Konsumen";
            $res['data']['title'] = "Notifikasi";
          }else if($jenis == 4){
            $res['data']['message'] = "Pesanan Anda Sedang Dikirim";
            $res['data']['title'] = "Notifikasi";
          }else if($jenis == 5){
            $res['data']['message'] = "Pesanan Anda Selesai";
            $res['data']['title'] = "notifikasi";
          }else if($jenis == 6){
            $res['data']['message'] = "Pesanan Anda Dibatalkan";
            $res['data']['title'] = "notifikasi";
          }

        $res['data']['image'] = null;
        $token = Pengguna::select('token')->where('id','=',$id_pengguna)->first();
        $token_terpilih =  array($token->token);

        $fields = array(
                'registration_ids' => $token_terpilih,
                'data' => $res,
            );

        $url = 'https://fcm.googleapis.com/fcm/send';

        //building headers for the request
        $headers = array(
            'Authorization: key=AAAAoqG0Hvg:APA91bGanAxYn7sA0iiPolmRrFKW0Wiv6ER087Zib28rT8kfhSn-JlnMLDFOPUax-zEMYXrUcnZS8u5PM_qeTp7PgfM6ZbEeTWjAGVmO2Wylz106AiDae3NUK5NqQTwzgb_shbLzcPAA',
            'Content-Type: application/json'
        );

        //Initializing curl to open a connection
        $ch = curl_init();

        //Setting the curl url
        curl_setopt($ch, CURLOPT_URL, $url);

        //setting the method as post
        curl_setopt($ch, CURLOPT_POST, true);

        //adding headers
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //disabling ssl support
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        //adding the fields in json format
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        //finally executing the curl request
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }

        //Now close the connection
        curl_close($ch);
        // echo $result;
        }

        public function ambilDetailPesanan(Request $request){
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

          $success['total_keuntungan'] = $pesanan1;
          $success['status'] = $pesanan->status;
          $success['status_bayar'] = $pesan->status;
          $success['ambil'] = $pesanan->ambil;
          $success['foto'] = $pesan->foto;
          $success['produk'] = $produks;
          $success['alamat'] = $pesanan->alamat_antar;
          $success['ongkir'] = $pesanan->ongkir;
          $success['id_penjual'] = $pesanan->penjual->id;
          $success['foto_penjual'] = $pesanan->penjual->foto;
          $success['nama_penjual'] = $pesanan->penjual->nama;
          $success['telp_penjual'] = $pesanan->penjual->no_telp;
          $success['id_pembeli'] = $pesanan->pembeli->id;
          $success['foto_pembeli'] = $pesanan->pembeli->foto;
          $success['nama_pembeli'] = $pesanan->pembeli->nama;
          $success['telp_pembeli'] = $pesanan->pembeli->no_telp;

          return response()->json(['success' => $success]);
        }

        public function ambilDetailProduk(Request $request){
          $produk = Produk::where('id', '=', $request->id_produk)->first();

          $success['nama_produk'] = $produk->nama;
          $success['foto'] = $produk->foto;
          $success['kategori'] = $produk->kategori;
          $success['id_penjual'] = $produk->pengguna->id;
          $success['nama_penjual'] = $produk->pengguna->nama;
          $success['foto_penjual'] = $produk->pengguna->foto;
          $success['telp_penjual'] = $produk->pengguna->no_telp;
          $success['lat_toko'] = $produk->pengguna->lat_toko;
          $success['lng_toko'] = $produk->pengguna->lng_toko;

          return response()->json(['success' => $success]);
        }

        public function kirimOTP(Request $request){
          $userkey = "lhiegd"; //userkey lihat di zenziva
          $passkey = "x592z6tayz"; // set passkey di zenziva
          $telepon = $request->no_telp;

          //SCRIPT KOSTUM
          // $message = "K0d3 v3rifik4si ePakan.id anda adalah : ".$request->kode_verifikasi.". Ini adalah SMS OTP, dan anda tidak perlu membalas SMS ini, Terima Kasih";
          // $url = "https://reguler.zenziva.net/apps/smsapi.php";
          // $curlHandle = curl_init();
          // curl_setopt($curlHandle, CURLOPT_URL, $url);
          // curl_setopt($curlHandle, CURLOPT_POSTFIELDS, 'userkey='.$userkey.'&passkey='.$passkey.'&nohp='.$telepon.'&pesan='.urlencode($message));
          // curl_setopt($curlHandle, CURLOPT_HEADER, 0);
          // curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
          // curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
          // curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
          // curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
          // curl_setopt($curlHandle, CURLOPT_POST, 1);
          // $results = curl_exec($curlHandle);
          // curl_close($curlHandle);

          //SCRIPT OTP
          $otp = $request->kode_verifikasi;
          $url = "https://reguler.zenziva.net/apps/smsotp.php";
          $curlHandle = curl_init();
          curl_setopt($curlHandle, CURLOPT_URL, $url);
          curl_setopt($curlHandle, CURLOPT_POSTFIELDS, 'userkey='.$userkey.'&passkey='.$passkey.'&nohp='.$telepon.'&kode_otp='.$otp);
          curl_setopt($curlHandle, CURLOPT_HEADER, 0);
          curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
          curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
          curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
          curl_setopt($curlHandle, CURLOPT_POST, 1);
          $results = curl_exec($curlHandle);
          curl_close($curlHandle);

          // echo $results;
        }

        public function loginOperator(Request $request){
            if(Auth::guard('operator')->attempt(['email' => $request->email, 'password' => $request->password])){
                $user = Auth::guard('operator')->user();
                $success['keterangan'] = "Berhasil Login";

                $operator = Operator::find($user->id);
                $operator->token = $request->token;
                $operator->save();
                return response()->json(['success' => $success]);
            }else{
                return response()->json(['error' => 'Gagal Login']);
            }
          }

          public function kirimNotifikasiAdmin(){
            $res = array();
            $res['data']['message'] = "Segera Konfirmasi Pesanan Konsumen";
            $res['data']['title'] = "Konfirmasi Pesanan";

            $res['data']['image'] = null;
            $token = Operator::select('token')->where('id','=',1)->first();
            $token_terpilih =  array($token->token);

            $fields = array(
                    'registration_ids' => $token_terpilih,
                    'data' => $res,
                );

            $url = 'https://fcm.googleapis.com/fcm/send';

            //building headers for the request
            $headers = array(
                'Authorization: key=AAAAoqG0Hvg:APA91bGanAxYn7sA0iiPolmRrFKW0Wiv6ER087Zib28rT8kfhSn-JlnMLDFOPUax-zEMYXrUcnZS8u5PM_qeTp7PgfM6ZbEeTWjAGVmO2Wylz106AiDae3NUK5NqQTwzgb_shbLzcPAA',
                'Content-Type: application/json'
            );

            //Initializing curl to open a connection
            $ch = curl_init();

            //Setting the curl url
            curl_setopt($ch, CURLOPT_URL, $url);

            //setting the method as post
            curl_setopt($ch, CURLOPT_POST, true);

            //adding headers
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            //disabling ssl support
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

            //adding the fields in json format
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

            //finally executing the curl request
            $result = curl_exec($ch);
            if ($result === FALSE) {
                die('Curl failed: ' . curl_error($ch));
            }

            //Now close the connection
            curl_close($ch);
            // echo $result;
          }

          public function requestMitra(Request $request){
            $cek = RequestMitra::where('id_pengguna', $request->id_pengguna)->get();
            if($cek->count() > 0){
              return response()->json(['success' => 'Anda Sudah Pernah Mengirim Permintaan Request Mitra']);
            }else{
              $mitra = new RequestMitra;
              $mitra->id_pengguna = $request->id_pengguna;
              $mitra->nama = $request->nama;
              $mitra->nik = $request->nik;
              if ($request->hasFile('foto_ktp')){
                  $file = $request->file('foto_ktp');
                  $ext = $file->getClientOriginalExtension();
                  $newName = rand(100000,1001238912).".".$ext;
                  $newName = "foto_ktp".$newName;
                  $file->move('uploads/file',$newName);
                  $mitra->foto_ktp = $newName;
              }
              $mitra->tipe = $request->tipe;
              if ($request->hasFile('foto_peternakan')){
                  $file = $request->file('foto_peternakan');
                  $ext = $file->getClientOriginalExtension();
                  $newName = rand(100000,1001238912).".".$ext;
                  $newName = "foto_peternakan".$newName;
                  $file->move('uploads/file',$newName);
                  $mitra->foto_peternakan = $newName;
              }
              if ($request->hasFile('foto_cppb')){
                  $file = $request->file('foto_cppb');
                  $ext = $file->getClientOriginalExtension();
                  $newName = rand(100000,1001238912).".".$ext;
                  $newName = "foto_cppb".$newName;
                  $file->move('uploads/file',$newName);
                  $mitra->foto_cppb = $newName;
              }
              if ($request->hasFile('foto_sertifikat')){
                  $file = $request->file('foto_sertifikat');
                  $ext = $file->getClientOriginalExtension();
                  $newName = rand(100000,1001238912).".".$ext;
                  $newName = "foto_sertifikat".$newName;
                  $file->move('uploads/file',$newName);
                  $mitra->foto_sertifikat = $newName;
              }

              if($mitra->save()){
                return response()->json(['success' => 'Berhasil Request Mitra']);
              }else{
                return response()->json(['error' => 'Gagal Request Mitra']);
              }
            }
          }

          public function ubahIklanProduk(Request $request){
            $produk = Produk::where('id_pengguna','=',$request->id_pengguna)->where('id', '=', $request->id)->first();

            $produk->iklan = $request->iklan;
            if($produk->save()){
              return response()->json(['success' => 'Berhasil Ubah Iklan Produk']);
            }else{
              return response()->json(['error' => 'Gagal Ubah Iklan Produk']);
            }
          }

          public function stokKurang($id_produk, $jumlah){
            $stok = new StokKurang;

            $stok->id_produk = $id_produk;
            $stok->jumlah = $jumlah;
            $stok->save();

            // if($stok->save()){
            //   return response()->json(['success' => 'Berhasil Request Mitra']);
            // }else{
            //   return response()->json(['error' => 'Gagal Request Mitra']);
            // }
          }

          public function daftarKabupaten(){
            $kabupaten = Kabupaten::orderBy('nama', 'ASC')->get();

            $data2 = [];
            foreach ($kabupaten as $data)
            {
               $data2[] = [
                   'id_kabupaten' => $data->id_kabupaten,
                   'nama' => $data->nama,
               ];
            }
            return response()->json(['success'=>$data2]);
          }

          public function daftarKecamatan($id_kabupaten){
            $kecamatan = Kecamatan::where('id_kabupaten', '=', $id_kabupaten)->orderBy('nama', 'ASC')->get();

            $data2 = [];
            foreach ($kecamatan as $data)
            {
               $data2[] = [
                   'id_kecamatan' => $data->id_kecamatan,
                   'id_kabupaten' => $data->id_kabupaten,
                   'nama_kecamatan' => $data->nama,
                   'nama_kabupaten' => $data->kabupaten->nama,
               ];
            }
            return response()->json(['success'=>$data2]);
          }

          public function tambahOngkir(Request $request){
            $ongkir = new Ongkir;
            $ongkir->id_kecamatan = $request->id_kecamatan;
            $ongkir->id_penjual = $request->id_penjual;
            $ongkir->ongkir = $request->ongkir;

            if($ongkir->save()){
              return response()->json(['success' => 'Berhasil Tambah Ongkir']);
            }else{
              return response()->json(['error' => 'Gagal Tambah Ongkir']);
            }
          }

          public function ubahOngkir(Request $request){
            $ongkir = Ongkir::where('id_kecamatan','=',$request->id_kecamatan)->where('id_penjual','=',$request->id_penjual)->first();
            $ongkir->ongkir = $request->ongkir;
            if($ongkir->save()){
              return response()->json(['success' => 'Berhasil Ubah Ongkir']);
            }else{
              return response()->json(['error' => 'Gagal Ubah Ongkir']);
            }
          }

          public function daftarOngkir($id_penjual){
            // $ongkir = Ongkir::where('id_penjual', '=', $id_penjual)->orderBy('kecamatan.nama','ASC')->get();
            $ongkir = DB::table('ongkir')
                      ->select('ongkir.ongkir as ongkir', 'kabupaten.nama as nama_kabupaten', 'kecamatan.nama as nama_kecamatan')
                      ->join('kecamatan', 'kecamatan.id_kecamatan', '=', 'ongkir.id_kecamatan')
                      ->join('kabupaten', 'kabupaten.id_kabupaten', '=', 'kecamatan.id_kabupaten')
                      ->where('ongkir.id_penjual', '=', $id_penjual)
                      ->orderBy('nama_kabupaten')
                      ->orderBy('nama_kecamatan')
                      ->get();

            $data2 = [];
            foreach ($ongkir as $data)
            {
               $data2[] = [
                   // 'id_ongkir' => $data->ongkir,
                   // 'id_kecamatan' => $data->id_kecamatan,
                   'nama_kabupaten' => $data->nama_kabupaten,
                   'nama_kecamatan' => $data->nama_kecamatan,
                   'ongkir' => $data->ongkir,
               ];
            }

            return response()->json(['success'=>$data2]);
          }

          public function tarifOngkirKecamatan($id_penjual, $id_kecamatan){
            $ongkir = Ongkir::where('id_penjual', '=', $id_penjual)->where('id_kecamatan', '=', $id_kecamatan)->first();

            if($ongkir){
              $success['ongkir'] = $ongkir->ongkir;
              return response()->json(['success'=>$success]);
            }else{
              return response()->json(['success'=>'Tarif Belum Diatur']);
            }

          }

          public function tambahPencairan(Request $request){
            $pencairan = new SaldoCair;
            $pencairan->id_pengguna = $request->id_pengguna;
            $pencairan->saldo = $request->saldo;

            if($pencairan->save()){
              return response()->json(['success' => 'Berhasil Tambah Request Pencairan']);
            }else{
              return response()->json(['error' => 'Gagal Tambah Request Pencairan']);
            }
          }

          public function daftarPencairan($id_pengguna){
            $pencairan = SaldoCair::where('id_pengguna', '=', $id_pengguna)->orderBy('created_at','DESC')->get();

            $data2 = [];
            foreach ($pencairan as $data)
            {
               $data2[] = [
                   'id' => $data->id,
                   'tanggal' => date("d M Y", strtotime($data->created_at)),
                   'id_pengguna' => $data->id_pengguna,
                   'saldo' => $data->saldo,
                   'status' => $data->status,
               ];
            }
            return response()->json(['success'=>$data2]);
          }

          public function lokasiTokoPenjual($id_penjual){
            $lokasi = Pengguna::where('id', '=', $id_penjual)->first();

            if($lokasi){
              $success['lat_toko'] = $lokasi->lat_toko;
              $success['lng_toko'] = $lokasi->lng_toko;
              return response()->json(['success'=>$success]);
            }else{
              return response()->json(['success'=>'Lokasi Belum Diatur']);
            }

          }

          public function aturLokasiTokoPenjual(Request $request){
            $lokasi = Pengguna::where('id', '=', $request->id_penjual)->first();
            $lokasi->lat_toko = $request->lat_toko;
            $lokasi->lng_toko = $request->lng_toko;

            if($lokasi->save()){
              return response()->json(['success'=>'Lokasi Berhasil Diatur']);
            }else{
              return response()->json(['success'=>'Lokasi Gagal Diatur']);
            }

          }

          public function setListNotifikasi(Request $request){
          $notifikasi = Notifikasi::where('id_pesanan', $request->id_pesanan)
                                  ->where('id_produk', $request->id_produk)
                                  ->where('id_pengguna', $request->id_pengguna)
                                  ->first();
          if($notifikasi != null){
              $notifikasi->isi = $request->isi;
              $notifikasi->status = 'belum';
          }else {
              $notifikasi = new Notifikasi;
              $notifikasi->id_pesanan = $request->id_pesanan;
              $notifikasi->id_produk = $request->id_produk;
              $notifikasi->id_pengguna = $request->id_pengguna;
              $notifikasi->isi = $request->isi;
              $notifikasi->status = 'belum';
          }

          if($notifikasi->save()){
            return response()->json(['success' => 'Berhasil Set Notifikasi']);
          }
      }

      public function daftarListNotifikasi($id_pengguna){
        $notifikasi = Notifikasi::where('id_pengguna', '=', $id_pengguna)->where('status', '=', 'belum')->orderBy('updated_at','DESC')->get();

        $data2 = [];
        foreach ($notifikasi as $data)
        {
           $data2[] = [
               'id_pesanan' => $data->id_pesanan,
               'id_produk' => $data->id_produk,
               'isi' => $data->isi,
               'status' => $data->status,
               'tanggal' => date("d M Y", strtotime($data->updated_at)),
           ];
        }
        return response()->json(['success'=>$data2]);
      }

      public function jumlahListNotifikasi($id_pengguna){
        $notifikasi = Notifikasi::where('id_pengguna', '=', $id_pengguna)->where('status', '=', 'belum')->get();
        $jumlah = $notifikasi->count();

        return response()->json(['success' => $jumlah]);
      }

      public function ubahStatusNotifikasi(Request $request){
        $notifikasi = Notifikasi::where('id_pesanan', $request->id_pesanan)
                              ->where('id_produk', $request->id_produk)
                              ->where('id_pengguna', $request->id_pengguna)
                              ->first();


        $notifikasi->status = 'dilihat';


        if($notifikasi->save()){
          return response()->json(['success' => 'Berhasil Ubah Status Notifikasi']);
        }
      }
      
      public function jumlahTransaksi($id_penjual){
          $transaksi = DetailPesanan::where('id_penjual', '=', $id_penjual)->get();
          $jumlah = $transaksi->count();
          
          return $jumlah;
      }
      
      public function jumlahProduk($id_penjual){
          $produk = Produk::where('id_pengguna', '=', $id_penjual)->get();
          $jumlah = $produk->count();
          
          return $jumlah;
      }
      
      public function cariKodeTransaksi(Request $request){
          $pesanan = DetailPesanan::where('id_pesanan', '=', $request->kode_pesanan)->get();
          $data2 = [];
        foreach ($pesanan as $data)
        {
           $data2[] = [
               'id_detail' => $data->id_detail,
               'id_pesanan' => $data->id_pesanan,
               'id_penjual' => $data->id_penjual,
               'id_pembeli' => $data->id_pembeli,
               'id_produk' => $data->id_produk,
               'nama_produk' => $data->produk->nama,
               'jumlah' => $data->jumlah,
               'satuan' => $data->produk->satuan,
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
        return response()->json(['success'=>$data2]);
      }
      
      public function ambilDetailPenjual($id_penjual){
          $jumlah_transaksi = $this->jumlahTransaksi($id_penjual);
          $jumlah_produk = $this->jumlahProduk($id_penjual);
          
          $penjual = Pengguna::where('id', $id_penjual)->first();
          
          $success['nama'] = $penjual->nama;
          $success['foto'] = $penjual->foto;
          $success['no_telp'] = $penjual->no_telp;
          $success['daerah'] = $penjual->daerah;
          $success['lat_toko'] = $penjual->lat_toko;
          $success['lng_toko'] = $penjual->lng_toko;
          $success['jumlah_transaksi'] = $jumlah_transaksi;
          $success['jumlah_produk'] = $jumlah_produk;
          
          return response()->json(['success'=>$success]);
      }
          //FINAL 1
}
