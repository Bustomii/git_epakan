<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Pengguna;
use App\Produk;
use App\Kabupaten;
use App\Kecamatan;
use App\Ongkir;
use App\SaldoMasuk;
use App\RequestMitra;
use Storage;
use Image;
use Session;
use Auth;
use DB;

class PenggunaController extends Controller
{

    // public function __construct(){
    //     $this->middleware('guest:guest');
    // }


    public function buatPengguna(Request $request){

    // $this->validate($request, array(
    //     'nama' => 'required|string|max:255',
    //     'no_telp'=> 'required|numeric|max:13',
    //     'email' => 'required|string|max:30',
    //     'password' => 'required|string|min:255',
    // ));
    // return 2;
      $pengguna = new Pengguna;
      $pengguna->nama=$request->nama;
      $pengguna->email=$request->email;
      $pengguna->password = bcrypt($request->password);
      $pengguna->no_telp=$request->no_telp;
      $pengguna->alamat=$request->alamat;
      $pengguna->daerah=$request->daerah;

    $pengguna->save();

      return redirect()->route('welcome')->withMessage('Berhasil Menambah Akun');
    }

    public function depan(){
        $produk=Produk::get();
        if(Auth::guard('pengguna')->check()){
            $user = Auth::guard('pengguna')->user();
            return view('welcome')->withUser($user);
        }else{
            return view('welcome')->with([
               'produk' => $produk
           ]);
       }
    }

    public function logout(){
        Auth::guard('pengguna')->logout();
        return redirect()->back();
    }

/////////////////////////////////////////////////////////////////////////////////////////////

    //create by MIDeveloper
    public function cairkanSaldo(Request $request){
        if (auth::guard('pengguna')->check()){
            $id = Auth::guard('pengguna')->user()->id;
            $pengguna = Pengguna::find($id);
            $input = $request->all();

            if($input['case']==1){
            $i = 0;
            $count = count($input['id_saldo']);
            while($i < $count){
                $x[] = array(
                    'id'               => $input['id_saldo'][$i],
                    'status_saldo'     => $input['status'][$i],
                );
                $i++;
            }
            $j = 0;
            $count1 = count($input['id_saldo']);
            while($j < $count1){
                $Update = DB::table('saldo_masuk')
                    ->where('id', $x[$j]['id'])
                    ->update($x[$j]);
                $j++;
            }

            $saldocair = DB::table('saldo_cair')->insert([
                'id_pengguna' => $id,
                'saldo'  => $input['total'],
                'status'   => 'belum cair'
            ]);


            if(!is_null($Update) && !is_null($saldocair)){
            return redirect()->route('info')->withMessage('Permintaan Pencairan Saldo Berhasil');
            }else {
                return redirect()->route('info')->withMessage('Saldo Gagal Dicarikan');
            }
        }
        else {
            return redirect()->route('info')->withMessage('Permintaan Pencairan Ditolak, Saldo Anda Rp.0');
        }
        }else{
            $produk=Produk::get();
            return view('welcome')->with([
               'produk' => $produk
           ]);
        }
    }

    public function cairkanSaldoMitra(Request $request){
        if (auth::guard('pengguna')->check()){
            $id = Auth::guard('pengguna')->user()->id;
            $pengguna = Pengguna::find($id);
            $input = $request->all();

            if($input['case']==1){
            $i = 0;
            $count = count($input['id_saldo']);
            while($i < $count){
                $x[] = array(
                    'id'               => $input['id_saldo'][$i],
                    'status_saldo'     => $input['status'][$i],
                );
                $i++;
            }
            $j = 0;
            $count1 = count($input['id_saldo']);
            while($j < $count1){
                $Update = DB::table('saldo_masuk')
                    ->where('id', $x[$j]['id'])
                    ->update($x[$j]);
                $j++;
            }

            $saldocair = DB::table('saldo_cair')->insert([
                'id_pengguna' => $id,
                'saldo'  => $input['total'],
                'status'   => 'belum cair'
            ]);


            if(!is_null($Update) && !is_null($saldocair)){
            return redirect()->route('belumbayar')->withMessage('Permintaan Pencairan Saldo Berhasil');
            }else {
                return redirect()->route('belumbayar')->withMessage('Saldo Gagal Dicarikan');
            }
        }
        else {
            return redirect()->route('belumbayar')->withMessage('Permintaan Pencairan Ditolak, Saldo Anda Rp.0');
        }
        }else{
            $produk=Produk::get();
            return view('welcome')->with([
               'produk' => $produk
           ]);
        }
    }

    //controler profl
    //create by MIDeveloper
    public function ambilProfil(){
        if (auth::guard('pengguna')->check()){
            $id = Auth::guard('pengguna')->user()->id;
            $pengguna = Pengguna::find($id);

            $id_saldo = DB::select("
            SELECT id as id_saldo, saldo FROM saldo_masuk
            WHERE id_pengguna = '".$id."'
            AND status_saldo = 0
            ");
            
            $saldo = DB::select("
            SELECT SUM(saldo) as sal FROM saldo_masuk
            WHERE id_pengguna = '".$id."'
            AND status_saldo = 0
            ");
            foreach($saldo as $data){
				$total = $data->sal;
			}

            return view('profil/info-pribadi')->with([
                'total'=>$total,
                'pengguna'=>$pengguna,
                'id_saldo'=>$id_saldo
            ]);
        }else{
            $produk=Produk::get();
            return view('welcome')->with([
               'produk' => $produk
           ]);
        }

    }

    public function ambilProfil1(Request $request){
        if (auth::guard('pengguna')->check()){
            $id_produk= $request->id_produk;
            $id_total= $request->id_total;
            $id_jumlah= $request->id_jumlah;

            $id = Auth::guard('pengguna')->user()->id;
            $pengguna = Pengguna::find($id);
            return view('profil/pesanan-saya')->withPengguna($pengguna)->with([
                'id_produk'=> $id_produk
            ])->with([
                'id_jumlah'=>$id_jumlah,
                'id_total'=>$id_total
            ]);
        }else{
            $produk=Produk::get();
            return view('welcome')->with([
               'produk' => $produk
           ]);
        }

    }
    
    //create by MIDeveloper
    public function daftarmitranew(Request $request){
        if (auth::guard('pengguna')->check()){
            $id = Auth::guard('pengguna')->user()->id;
            $pengguna = Pengguna::find($id);
            
            if($this->validate($request,['ktp'=>'required|file|max:5000'])){
            $extensi = $request->file('ktp')->Extension();
            $ktp = md5($request->file('foto_peternakan').'Nol').'.'.$extensi;
            $path1 = $request->file('ktp')->move(public_path('\uploads\request_mitra'), $ktp);
            }

            if($this->validate($request,['foto_peternakan'=>'required|file|max:5000'])){
                $extensi = $request->file('foto_peternakan')->Extension();
            $foto_peternakan = md5($request->file('foto_peternakan').'Satu').'.'.$extensi;
            $path2 = $request->file('foto_peternakan')->move(public_path('\uploads\request_mitra'),$foto_peternakan);
            }

            if($this->validate($request,['foto_cppb'=>'required|file|max:5000'])){
            $extensi = $request->file('foto_cppb')->Extension();
            $foto_cppb = md5($request->file('foto_peternakan').'Dua').'.'.$extensi;
            $path3 = $request->file('foto_cppb')->move(public_path('\uploads\request_mitra'),$foto_cppb);
            }

            if($this->validate($request,['foto_sertifikat'=>'required|file|max:5000'])){
            $extensi = $request->file('foto_sertifikat')->Extension();
            $foto_sertifikat = md5($request->file('foto_peternakan').'Tiga').'.'.$extensi;
            $path4 = $request->file('foto_sertifikat')->move(public_path('\uploads\request_mitra'),$foto_sertifikat);
            }

            // echo $path1.'<p>'.$path2.'<p>'.$path3.'<p>'.$path4;
            // Insert database
            $daftarmitra = DB::table('request_mitra')->insert([
                'id_pengguna'       => $request->id_pengguna,
                'nama'              => $request->nama,
                'nik'               => $request->nik,
                'foto_ktp'          => $path1,
                'foto_peternakan'   => $path2,
                'foto_cppb'         => $path3,
                'foto_sertifikat'   => $path4               
            ]);
            
            if ($daftarmitra != NULL){
                    return redirect()->route('belumbayar')->withMessage('Daftar Mitra Berhasil');
                }else{
                return view('profil/daftar-mitra')->withPengguna($pengguna);
                }
        }else{
            $produk=Produk::get();
            return view('welcome')->with([
               'produk' => $produk
           ]);
        }

    }
    //controler profl

    ////////////////////////////////////////////////////////////////////////////////////
    public function daftarmitra(Request $request){
        if (auth::guard('pengguna')->check()){
            $id = Auth::guard('pengguna')->user()->id;
            $pengguna = Pengguna::find($id);
            return view('profil/daftar-mitra')->withPengguna($pengguna);
        }else{
            $produk=Produk::get();
            return view('welcome')->with([
               'produk' => $produk
           ]);
        }

    }

        // // $cek = RequestMitra::where('id_pengguna', $request->id_pengguna)->get();
        // // if($cek->count() > 0){
        // //   return redirect()->route('welcome')->withMessage('Anda Sudah Pernah Mengirim Permintaan Request Mitra');
        // // }else{
        // //     $mitra = new RequestMitra;
        // //       $mitra->id_pengguna=Auth::guard('pengguna')->user()->id;
        // //       $mitra->nama = $request->nama;
        // //       $mitra->nik = $request->nik;
        // //       if ($request->hasFile('foto_ktp')){
        // //           $file = $request->file('foto_ktp');
        // //           $ext = $file->getClientOriginalExtension();
        // //           $newName = rand(100000,1001238912).".".$ext;
        // //           $newName = "foto_ktp".$newName;
        // //           $file->move('uploads/file',$newName);
        // //           $mitra->foto_ktp = $newName;
        // //       }
        // //       $mitra->tipe = $request->tipe;
        // //       if ($request->hasFile('foto_peternakan')){
        // //           $file = $request->file('foto_peternakan');
        // //           $ext = $file->getClientOriginalExtension();
        // //           $newName = rand(100000,1001238912).".".$ext;
        // //           $newName = "foto_peternakan".$newName;
        // //           $file->move('uploads/file',$newName);
        // //           $mitra->foto_peternakan = $newName;
        // //       }
        // //       if ($request->hasFile('foto_cppb')){
        // //           $file = $request->file('foto_cppb');
        // //           $ext = $file->getClientOriginalExtension();
        // //           $newName = rand(100000,1001238912).".".$ext;
        // //           $newName = "foto_cppb".$newName;
        // //           $file->move('uploads/file',$newName);
        // //           $mitra->foto_cppb = $newName;
        // //       }
        // //       if ($request->hasFile('foto_sertifikat')){
        // //           $file = $request->file('foto_sertifikat');
        // //           $ext = $file->getClientOriginalExtension();
        // //           $newName = rand(100000,1001238912).".".$ext;
        // //           $newName = "foto_sertifikat".$newName;
        // //           $file->move('uploads/file',$newName);
        // //           $mitra->foto_sertifikat = $newName;
        // //       }
        // //       if ($mitra->save()){
        // //         return redirect()->route('welcome')->withMessage('Berhasil Request Mitra');
        // //       }else{
        // //         return redirect()->route('welcome')->withMessage('Gagal Request Mitra');
        //       }
        //     }       
        // }



    ///////////////////////////////////////////////////////////////////////////////////

    //controler admin beli
   // public function ambilProfil2($id_produk){
   //     if (auth::guard('pengguna')->check()){
   //         $id = Auth::guard('pengguna')->user()->id;
   //         $pengguna = Pengguna::find($id);
   //         $produk = Produk::find($id_produk);
   //         return view('adminbeli/bdiproses')->withPengguna($pengguna)->withPengguna($produk);
   //     }else{
   //         $produk=Produk::get();
   //         return view('welcome')->with([
   //            'produk' => $produk
   //        ]);
   //     }

    //}

/*     public function bdikirim(){
        if (auth::guard('pengguna')->check()){
            $id = Auth::guard('pengguna')->user()->id;
            $pengguna = Pengguna::find($id);
            return view('adminbeli/bdikirim')->withPengguna($pengguna);
        }else{
            $produk=Produk::get();
            return view('welcome')->with([
               'produk' => $produk
           ]);
        }

    }
*/
    
    //controler admin beli

////////////////////////////////////////////////////////////////////////////////////////////////////////

    //controler adminjual
    public function daftarKabupaten(){
        if (auth::guard('pengguna')->check()){
            $id = Auth::guard('pengguna')->user()->id;
            $pengguna = Pengguna::find($id);
            $kabupaten = Kabupaten::orderBy('nama', 'ASC')->get();
            $data2 = [];
            foreach ($kabupaten as $data)
            {
               $data2[] = [
                   'id_kabupaten' => $data->id_kabupaten,
                   'nama' => $data->nama,
                   
               ];
            }

            return view('adminjual/daftarKabupaten')->with([
                'pengguna'=> $pengguna,
                'kabupaten' => $kabupaten
            ]);
        }else{
            $produk=Produk::get();
            return view('welcome')->with([
               'produk' => $produk
           ]);
        }

    }

    //create by MIDeveloper
    public function daftarKecamatan(){
        if (auth::guard('pengguna')->check()){
            $id = Auth::guard('pengguna')->user()->id;
            $pengguna = Pengguna::find($id); 
            $id_kabupaten = $_GET ['daerah'];
            
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
                  WHERE kecamatan.id_kabupaten = '".$id_kabupaten."'
                  ORDER BY kecamatan.nama ASC
              ) as nama_kecamatan ORDER BY nama_kecamatan.kec ASC
              ");

            return view('adminjual/daftarKecamatan')->with([
                'pengguna'  => $pengguna,
                'kecamatan' => $kecamatan,
            ]);
            
        }else{
            $produk=Produk::get();
            return view('welcome')->with([
               'produk' => $produk
           ]);
        }

    }

    //create by MIDeveloper
    public function dafatarOngkir(){
        if (auth::guard('pengguna')->check()){
            $id = Auth::guard('pengguna')->user()->id;
            $pengguna = Pengguna::find($id); 
            
            $nama = $_GET ['nama'];

            $keca = DB::table('kecamatan as kec')
            ->select(['kec.id_kabupaten as id_kab', 'okr.id_penjual', 'kec.id_kecamatan as id_kec', 'kec.nama as kec', 'kab.nama as kab', 'okr.ongkir as ongkr', 'okr.id_ongkir as id_okr'])
            ->leftjoin('ongkir as okr', 'kec.id_kecamatan','=','okr.id_kecamatan')
            ->leftjoin('kabupaten as kab', 'kec.id_kabupaten','=','kab.id_kabupaten')
            ->where('kec.nama', '=', $nama)
            ->where('okr.id_penjual','=', $id)
            ->get();
            
            $kec = array();
            foreach ($keca as $data)
            {
               $kec = array(
                   'kec' => $data->kec,
                   'kab' => $data->kab,
                   'ongkir' => $data->ongkr,
                   'id_ongkir' => $data->id_okr,
                   'id_kec' => $data->id_kec,
                   'id_kab' => $data->id_kab,
                   'penjual' => $data->id_penjual
               );
            }

            $kecamatan = DB::table('kecamatan as kec')
            ->select(['kec.id_kabupaten as id_kab', 'okr.id_penjual', 'kec.id_kecamatan as id_kec', 'kec.nama as kec', 'kab.nama as kab', 'okr.ongkir as ongkr', 'okr.id_ongkir as id_okr'])
            ->leftjoin('ongkir as okr', 'kec.id_kecamatan','=','okr.id_kecamatan')
            ->leftjoin('kabupaten as kab', 'kec.id_kabupaten','=','kab.id_kabupaten')
            ->where('kec.nama', '=', $nama)
            ->get();
            
            $kecam = array();
            foreach ($kecamatan as $data2)
            {
               $kecam = array(
                   'kec' => $data2->kec,
                   'kab' => $data2->kab,
                   'ongkir' => $data2->ongkr,
                   'id_ongkir' => $data2->id_okr,
                   'id_kec' => $data2->id_kec,
                   'id_kab' => $data2->id_kab,
                   'penjual' => $data2->id_penjual
               );
            }

            return view('adminjual/daftar-ongkir')->with([
                'pengguna' => $pengguna,
                'data' => $kec,
                'keca' => $kecam,
            ]);


        }else{
            $produk=Produk::get();
            return view('welcome')->with([
               'produk' => $produk,
               'kecamatan' => $kecamatan,
           ]);
        }

    }
    
    //create by MIDeveloper
    public function tambahOngkir(Request $request){
        if (auth::guard('pengguna')->check()){
            $id = Auth::guard('pengguna')->user()->id;
            $pengguna = Pengguna::find($id); 
            $ongkir = new Ongkir;
            $ongkir->id_kec = $request->id_kec;
            $ongkir->id_penjual = $request->id_penjual;
            $ongkir->ongkir = $request->ongkir;
            $ongkir->daerah = $request->daerah;
            $ongkir->cek = $request->cek;

            if($ongkir->cek==''){
                $ongkirInsert = DB::table('ongkir')->insert([
                    'id_penjual' => $ongkir->id_penjual,
                    'id_kecamatan'  => $ongkir->id_kec,
                    'ongkir'   => $ongkir->ongkir
                ]);

                if(!is_null($ongkirInsert)){
                    return redirect()->route('lokasi')->withMessage('Ongkir Berhasil Tambah');
                }else{
                    return redirect()->route('lokasi') ->withMassage('Ongkir Gagal Tambah');
                }
            }
            else{
                $ongkirUpdate = DB::table('ongkir')
                ->where('id_penjual', '=', $ongkir->id_penjual)
                ->where('id_kecamatan', '=', $ongkir->id_kec)
                ->update([
                    'id_penjual' => $ongkir->id_penjual,
                    'id_kecamatan'  => $ongkir->id_kec,
                    'ongkir'   => $ongkir->ongkir
                ]);

                if(!is_null($ongkirUpdate)){
                    return redirect()->route('lokasi')->withMessage('Ongkir Berhasil Update');
                }else{
                    return redirect()->route('lokasi') ->withMassage('Ongkir Gagal Update');
                }
            }

        }else{
            $produk=Produk::get();
            return view('welcome')->with([
               'produk' => $produk,
               'kecamatan' => $kecamatan,
           ]);
        }


        // $id = Auth::guard('pengguna')->user()->id;

        // $ongkir = new Ongkir;
        // $ongkir->id_kecamatan = $request->id_kecamatan;
        // $ongkir->id_penjual = $request->id_penjual;
        // $ongkir->ongkir = $request->ongkir;

        // if($ongkir->save()){
        //   return redirect()->route('ongkir')->withMessage('Berhasil Tambah Ongkir');
        // }else{
        //   return redirect()->route('ongkir') ->withMassage('Gagal Tambah Ongkir');
        // }
      }


    public function ambilFotobelumbayar(Request $request){
        if (auth::guard('pengguna')->check()){
            $id = Auth::guard('pengguna')->user()->id;
            $pengguna = Pengguna::find($id);
            $cek_pengguna = DB::select("select a.*, b.status as cek from request_mitra a, pengguna b
            WHERE a.id_pengguna = b.id
            AND a.id_pengguna = '".$id."'");
            
            foreach($cek_pengguna as $cek){
				$cek_data = $cek->cek;
            }
            
            $id_saldo = DB::select("
            SELECT id as id_saldo FROM saldo_masuk
            WHERE id_pengguna = '".$id."'
            AND status_saldo = 0
            ");
            
            $saldo = DB::select("
            SELECT SUM(saldo) as sal FROM saldo_masuk
            WHERE id_pengguna = '".$id."'
            AND status_saldo = 0
            ");
            foreach($saldo as $data){
				$total = $data->sal;
			}

            if($cek_pengguna ==NULL){
                    echo "<script language='javascript'>
                    window.alert('Anda Belum Terdaftar Mitra Silahkan Daftar');
                    window.location.href='/daftar-mitra';
                    </script>";
            }
            else{

              $belum_bayar = DB::select("select b.alamat_antar, b.ongkir, b.jumlah, b.harga, a.id_pesanan, a.total_bayar, b.status, c.foto2, a.created_at 
              FROM pesanan a, detail_pesanan b, produk c
              WHERE b.id_penjual = '".$id."'
              AND b.id_produk = c.id
              AND b.id_pesanan = a.id_pesanan
              AND b.status ='Belum Bayar'
              ORDER BY id_detail DESC");

            if($cek_data == 1){     
                return view('adminjual/belum-bayar')->with([
                    'total'=>$total,
                    'pengguna'=>$pengguna,
                    'id_saldo'=>$id_saldo,
                    'belum_bayar'=>$belum_bayar
                ]);
            }
            else if($cek_data == 0){
                return redirect()->route('info')->withMessage('Permintaan Mitra Sedang Diproses');
            }
        }
        }else{
            $produk=Produk::get();
            return view('welcome')->with([
               'produk' => $produk
           ]);
        }

    }

    public function ambilFotodiproses(){
        if (auth::guard('pengguna')->check()){
            $id = Auth::guard('pengguna')->user()->id;
            $pengguna = Pengguna::find($id);

            $diproses = DB::select("select b.alamat_antar, b.ongkir, b.jumlah, b.harga, a.id_pesanan, a.total_bayar, b.status, c.foto2, a.created_at 
            FROM pesanan a, detail_pesanan b, produk c
            WHERE b.id_penjual = '".$id."'
            AND b.id_produk = c.id
            AND b.id_pesanan = a.id_pesanan
            AND b.status ='diproses'
            ORDER BY id_detail DESC");

            return view('adminjual/diproses')->withPengguna($pengguna)->with([
                'diproses'=>$diproses
            ]);
        }else{
            $produk=Produk::get();
            return view('welcome')->with([
               'produk' => $produk
           ]);
        }

    }

    public function ambilFotodikirim(){
        if (auth::guard('pengguna')->check()){
            $id = Auth::guard('pengguna')->user()->id;
            $pengguna = Pengguna::find($id);

            $dikirim = DB::select("select b.alamat_antar, b.ongkir, b.jumlah, b.harga, a.id_pesanan, a.total_bayar, b.status, c.foto2, a.created_at 
            FROM pesanan a, detail_pesanan b, produk c
            WHERE b.id_penjual = '".$id."'
            AND b.id_produk = c.id
            AND b.id_pesanan = a.id_pesanan
            AND b.status ='dikirim'
            ORDER BY id_detail DESC");

            return view('adminjual/dikirim')->withPengguna($pengguna)->with([
                'dikirim'=>$dikirim
            ]);

        }else{
            $produk=Produk::get();
            return view('welcome')->with([
               'produk' => $produk
           ]);
        }

    }

    public function kirimBarang(Request $request){
        if (auth::guard('pengguna')->check()){
            $id = Auth::guard('pengguna')->user()->id;
            $pengguna = Pengguna::find($id);
            $get = $request->all();

            if($request['konfirmasi']==1){
            $updatestatusdikirim = DB::table('detail_pesanan')
                ->where('id_pesanan', '=', $request['kode_pesanan'])
                ->update([
                    'status' => 'dikirim',
                ]);

                if(!is_null($updatestatusdikirim)){
                    return redirect()->route('dikirim')->withMessage('Pesanan Berhasil Dikirim');
                }else{
                    return redirect()->route('diproses') ->withMassage('Pesanan Gagall Dikirim');
                }
            }
            else{

                $updatestatusditerima = DB::table('detail_pesanan')
                ->where('id_pesanan', '=', $request['kode_pesanan'])
                ->update([
                    'status' => 'diterima',
                ]);

                if(!is_null($updatestatusditerima)){
                    return redirect()->route('bditerima')->withMessage('Konfirmasi Pesanan Diterima Berhasil');
                }else{
                    return redirect()->route('bdikirim') ->withMassage('Gagal Konfirmasi Pesanan Diterima');
                }

            }
        }else{
            $produk=Produk::get();
            return view('welcome')->with([
               'produk' => $produk
           ]); 
        }
    }

    public function ambilFotoditerima(){
        if (auth::guard('pengguna')->check()){
            $id = Auth::guard('pengguna')->user()->id;
            $pengguna = Pengguna::find($id);
            
            $diterima = DB::select("select b.alamat_antar, b.ongkir, b.jumlah, b.harga, a.id_pesanan, a.total_bayar, b.status, c.foto2, a.created_at 
            FROM pesanan a, detail_pesanan b, produk c
            WHERE b.id_penjual = '".$id."'
            AND b.id_produk = c.id
            AND b.id_pesanan = a.id_pesanan
            AND b.status ='diterima'
            ORDER BY id_detail DESC");

            return view('adminjual/diterima')->withPengguna($pengguna)->with([
                'diterima'=>$diterima
            ]);

        }else{
            $produk=Produk::get();
            return view('welcome')->with([
               'produk' => $produk
           ]);
        }

    }
 
    public function ambilFotopembatalan(){
        if (auth::guard('pengguna')->check()){
            $id = Auth::guard('pengguna')->user()->id;
            $pengguna = Pengguna::find($id);
            return view('adminjual/pembatalan-pesanan')->withPengguna($pengguna);
        }else{
            $produk=Produk::get();
            return view('welcome')->with([
               'produk' => $produk
           ]);
        }

    }

    public function ambilFotoprodukdijual(){
        if (Auth::guard('pengguna')->check()){
            $id = Auth::guard('pengguna')->user()->id;
            $produk=Produk::where('id_pengguna','=',$id)->get();
            $pengguna = Pengguna::find($id);
            return view('adminjual/produk-dijual')->with([
                'pengguna' => $pengguna,
                'produk' => $produk
            ]);
        }else{$produk=Produk::get();
            return view('welcome')->with([

                'produk' => $produk
            ]);
        }

    }

    public function ambilFototambahproduk(){
        if (auth::guard('pengguna')->check()){
            $id = Auth::guard('pengguna')->user()->id;
            $pengguna = Pengguna::find($id);
            return view('adminjual/tambah-produk')->withPengguna($pengguna);
        }else{
            $produk=Produk::get();
            return view('welcome')->with([
               'produk' => $produk
           ]);
        }

    }

    public function ambilFotoubahbarang($id){
        $produk=Produk::find($id);
        if (auth::guard('pengguna')->check()){
            $id = Auth::guard('pengguna')->user()->id;
            $pengguna = Pengguna::find($id);
            return view('adminjual/ubah-barang')->with([
                'pengguna'=> $pengguna,
                'produk'=>$produk
            ]);
        }else{
            return view('welcome');
        }

    }

    public function ambilFotofromubahbarang(){
        if (auth::guard('pengguna')->check()){
            $id = Auth::guard('pengguna')->user()->id;
            $pengguna = Pengguna::find($id);
            return view('adminjual/fromubah-barang')->withPengguna($pengguna);
        }else{
            $produk=Produk::get();
            return view('welcome')->with([
               'produk' => $produk
           ]);
        }

    }

    //controler adminjual

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //controler produk
    public function ambilFotopakansapi(){
        if (auth::guard('pengguna')->check()){
            $id = Auth::guard('pengguna')->user()->id;
            $pengguna = Pengguna::find($id);
            return view('test/pakan-sapi')->withPengguna($pengguna);
        }else{
            return view('test/pakan-sapi');
        }

    }

    public function ambilFotopakankuda(){
        if (auth::guard('pengguna')->check()){
            $id = Auth::guard('pengguna')->user()->id;
            $pengguna = Pengguna::find($id);
            return view('test/pakan-kuda')->withPengguna($pengguna);
        }else{
            return view('test/pakan-kuda');
        }

    }

    public function ambilFotopakandomba(){
        if (auth::guard('pengguna')->check()){
            $id = Auth::guard('pengguna')->user()->id;
            $pengguna = Pengguna::find($id);
            return view('test/pakan-domba')->withPengguna($pengguna);
        }else{
            return view('test/pakan-domba');
        }

    }

    public function ambilFotopakanayam(){
        if (auth::guard('pengguna')->check()){
            $id = Auth::guard('pengguna')->user()->id;
            $pengguna = Pengguna::find($id);
            return view('test/pakan-ayam')->withPengguna($pengguna);
        }else{
            return view('test/pakan-ayam');
        }

    }

    public function ambilFotopakankerbau(){
        if (auth::guard('pengguna')->check()){
            $id = Auth::guard('pengguna')->user()->id;
            $pengguna = Pengguna::find($id);
            return view('test/pakan-kerbau')->withPengguna($pengguna);
        }else{
            return view('test/pakan-kerbau');
        }

    }

    public function ambilFotosupplement(){
        if (auth::guard('pengguna')->check()){
            $id = Auth::guard('pengguna')->user()->id;
            $pengguna = Pengguna::find($id);
            return view('test/supplement')->withPengguna($pengguna);
        }else{
            return view('test/supplement');
        }

    }

    public function ambilFotohijauan(){
        if (auth::guard('pengguna')->check()){
            $id = Auth::guard('pengguna')->user()->id;
            $pengguna = Pengguna::find($id);
            return view('test/hijauan')->withPengguna($pengguna);
        }else{
            return view('test/hijauan');
        }

    }

    public function ambilFotobahanmentah(){
        if (auth::guard('pengguna')->check()){
            $id = Auth::guard('pengguna')->user()->id;
            $pengguna = Pengguna::find($id);
            return view('test/bahan-mentah')->withPengguna($pengguna);
        }else{
            return view('test/bahan-mentah');
        }

    }

    public function ambilFotopeternakbinaan(){
        if (auth::guard('pengguna')->check()){
            $id = Auth::guard('pengguna')->user()->id;
            $pengguna = Pengguna::find($id);
            return view('test/peternak-binaan')->withPengguna($pengguna);
        }else{
            return view('test/peternak-binaan');
        }

    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function ambilFotokeranjang(){
        if (auth::guard('pengguna')->check()){
            $id = Auth::guard('pengguna')->user()->id;
            $pengguna = Pengguna::find($id);
            return view('test/keranjang')->withPengguna($pengguna);
        }else{
            $produk=Produk::get();
            return view('welcome')->with([
               'produk' => $produk
           ]);
        }

    }


    //pembayaran
    public function ambilFotopembayaran(){
        if (auth::guard('pengguna')->check()){
            $id = Auth::guard('pengguna')->user()->id;
            $pengguna = Pengguna::find($id);
            $produk = Produk::find($id_produk);
            return view('test/pembayaran')->withProduk($produk)->withPengguna($pengguna);
        }else{
            $produk=Produk::get();
            return view('welcome')->with([
               'produk' => $produk
           ]);

        }

    }

    //bayar
    public function ambilFotobayar(Request $request){
        if (auth::guard('pengguna')->check()){
            $id_total= $request->id_total;
            $id_produk= $request->id_produk;
            $id_jumlah= $request->id_jumlah;
            
            $id = Auth::guard('pengguna')->user()->id;
            $pengguna = Pengguna::find($id);
            return view('profil/bayar')->withPengguna($pengguna)->with([
                'id_produk'=> $id_produk
            ])->with([
                'id_jumlah'=>$id_jumlah,
                'id_total'=>$id_total
            ]);
        }else{
            $produk=Produk::get();
            return view('welcome')->with([
               'produk' => $produk
           ]);

        }

    }
    //controller cara membeli
    public function ambilprofilcaramembeli(){
        if (auth::guard('pengguna')->check()){
            $id = Auth::guard('pengguna')->user()->id;
            $pengguna = Pengguna::find($id);
            return view('test/cara-membeli')->withPengguna($pengguna);
        }else{
            $produk=Produk::get();
            return view('test/cara-membeli')->with([
               'produk' => $produk
           ]);
        }

    }

    //controller beli-barang
    public function ambilprofilbelibarang(){
        
        if (auth::guard('pengguna')->check()){
            $id = Auth::guard('pengguna')->user()->id;
            $pengguna = Pengguna::find($id);
            return view('test/beli-barang')->withPengguna($pengguna);
        }else{
            $produk=Produk::get();
            return view('test/beli-barang')->with([
               'produk' => $produk
           ]);
        }
    }

        //controller profil-penjual
        public function ambilprofilprofilpenjual(){
            if (auth::guard('pengguna')->check()){
                $id = Auth::guard('pengguna')->user()->id;
                $pengguna = Pengguna::find($id);
                return view('profil/profil-penjual')->withPengguna($pengguna);
            }else{
                $produk=Produk::get();
                return view('profil/profil-penjual')->with([
                   'produk' => $produk
               ]);
            }

        }



    public function ambilprofillama(){
        if (auth::guard('pengguna')->check()){
            $id = Auth::guard('pengguna')->user()->id;
            $pengguna = Pengguna::find($id);
            return view('profil/pengaturan-akun')->withPengguna($pengguna);
        }else{
            $produk=Produk::get();
            return view('welcome')->with([
               'produk' => $produk
           ]);
        }

    }
    //controler produk

    ///////////////////////////////////////////////////////////////////////////////////////////

    public function bantuan(){
            if (auth::guard('pengguna')->check()){
                $id = Auth::guard('pengguna')->user()->id;
                $pengguna = Pengguna::find($id);
                return view('profil/bantuan')->withPengguna($pengguna);
            }else{
                return view('profil/bantuan');
            }
    }



    public function updatesProfil(Request $request){

        $this->validate($request, array(
        'nama' => 'required',
        'email'=> 'required',
        // 'foto' => 'image',
        'no_telp' => 'required',
        'alamat' => 'required',
        'daerah' => 'required',
        ));

        $pengguna = Pengguna::find($request->id);
        $pengguna->nama=$request->nama;
        $pengguna->email=$request->email;
        $pengguna->no_telp=$request->no_telp;
        $pengguna->alamat=$request->alamat;
        $pengguna->daerah=$request->daerah;


        if ($request->hasFile('foto')){
            $file = $request->file('foto');
            $ext = $file->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $newName = "foto_pengguna_".$request->id."_".$newName;
            $file->move('uploads/file',$newName);
            $pengguna->foto = $newName;
        }

      
        $pengguna->save();

        return redirect()->route('info')->withMessage('Berhasil Update Course');
    }

    //LOGIN

    public function verifikasiOTP(Request $request){
        $user = Pengguna::where('no_telp', $request->no_telp)->where('kode_verifikasi', $request->kode_verifikasi)->first();
        if (!empty($user)) {
          if(Auth::guard('pengguna')->loginUsingId($user->id)){
            return redirect()->route('welcome')->withMessage('Berhasil Login');
           
          }
        }else{
          $success['keterangan'] = "Gagal Login";
          return redirect()->route('welcome')->withMessage('Gagal Login');

        }
      }

      public function registerakun(Request $request){
        $pengguna = new Pengguna;
        $pengguna->nama=$request->nama;
        $pengguna->email=$request->email;
        $pengguna->password = bcrypt($request->password);
        $pengguna->no_telp=$request->no_telp;
        $pengguna->alamat=$request->alamat;
        $pengguna->daerah=$request->daerah;
        $pengguna->token=$request->token;

        if($pengguna->save()){
            return view()->route('welcome')->withMessage('Berhasil Register');
        }else{
            return redirect()->route('welcome')->withMessage('Gagal Register');
        }
      }

      public function registerOTP(Request $request){
        $cek = Pengguna::where('no_telp', $request->no_telp)->get();
        if($cek->count() > 0){
          return redirect()->route('welcome')->withMassage('Nomor Sudah Terdaftar');
        }else{
          $pengguna = new Pengguna;
          $pengguna->nama = $request->nama;
          $pengguna->no_telp = $request->no_telp;
          $pengguna->alamat = $request->alamat;
          $pengguna->daerah = $request->daerah;
          $pengguna->token = $request->token;
          $pengguna->kode_verifikasi = $request->kode_verifikasi;

          if($pengguna->save()){
            return redirect()->route('welcome')->withMessage('Berhasil Register');
          }else{
            return redirect()->route('welcome')->withMessage('Gagal Register');
          }
        }
      }

      
    public function kirimUlangOTP(Request $request){
        $cek = Pengguna::where('no_telp', $request->no_telp)->get();
        if($cek->count() > 0){
          $pengguna = Pengguna::where('no_telp', $request->no_telp)->first();
          $kode_verifikasi = $this->generateRandomString(4);
          $pengguna->kode_verifikasi = $kode_verifikasi;
          $this->kirimOTP($request->no_telp, $kode_verifikasi);
          $pengguna->save();
          return view('profil.verifikasi')->withTelp($pengguna->no_telp)->withMessage('Kode Verfiikasi Berhasil Terkirim');
        }else{
            return redirect()->route('welcome')->withMessage('Nomor Tidak Terdaftar');
        }

      }

    public function generateRandomString($length) {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

      public function kirimOTP($no_telp, $kode_verifikasi){
        $userkey = "lhiegd"; //userkey lihat di zenziva
        $passkey = "x592z6tayz"; // set passkey di zenziva
        $telepon = $no_telp;

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
        $otp = $kode_verifikasi;
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
      
   
    public function loginOTP(){
        return view('profil/login');
    }

    public function verifikasi(){
        return view('profil/verifikasi');
    }

    public function daftarakun(){
        return view('profil/daftarakun');
    }
    


    
}
