<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Auth;

class PenggunaLoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest:pengguna');
    }
    
    public function login(Request $request){
        $this->validate($request,[
            'email'     => 'required|string',
            'password'  => 'required'
        ]);

        if(Auth::guard('pengguna')->attempt(['email'=>$request->email, 'password'=>$request->password], $request->remember)){
            return redirect()->back();
        }
        return redirect()->back()->withInput($request->only('email', 'remember'))->withMessage('Username atau Password salah');
    }
    
    public function depan(){
        
        if(Auth::guard('pengguna')->check()){
            $nama = Auth::guard('pengguna');
            return $nama;
        }else{
            return view('welcome');
        }
    }
}