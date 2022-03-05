<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // public function index(){
    //     return view('customer.data_cust');
    // }
    public function index(Request $request){
        if($request->has('cari_user')){
            $cust = User::where('name','LIKE','%'.$request->cari_user.'%')->get();
        }else{
            $cust = User::orderBy('created_at','desc')->get();
        }
        return view('customer.data_cust', compact('cust')); 
    }

    public function edit($id){
        $data = User::where('id',$id)->first();
        return view('customer.edit_cust', compact('data'));
    }

    public function update($id,User $user, Request $request){
        $simpan = $user->where('id',$id)->update([
        // dd($request->all());
            'name' =>$request->name,
            'email' =>$request->email,
            'phone' =>$request->phone,
            'norek' =>$request->norek,
            'nama_bank' =>$request->nama_bank,
            'atas_nama' =>$request->atas_nama,
            'nama_akun_ol' =>$request->nama_akun_ol,
            'status' =>$request->status,
        ]);

        if(!$simpan){
            return redirect()->route('customer')->with('error','data gagal di update');
        }
        return redirect()->route('customer')->with('success','data berhasil di update');
    }

    public function softDelete($id, User $user){

        $simpan = $user->where('id',$id)->update([
            'status' => 'Nonaktif',
        ]);

        if(!$simpan){
            return redirect()->route('customer')->with('error','data gagal di dihapus');
        }

        return redirect()->route('customer')->with('success','data berhasil di hapus');
    }
}
