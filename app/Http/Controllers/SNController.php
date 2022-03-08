<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SNCashback;

class SNController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request){ 
        if($request->has('cari_sn')){
                    $sn = SNCashback::where('sn','LIKE','%'.$request->cari_sn.'%')->orWhere('judul','LIKE','%'.$request->cari_sn.'%')->get();
                }else{
                    $sn = SNCashback::all();
                }
                return view('sn.data_sn', compact('sn'));
    }

    public function indexAktif(Request $request){
        $sn = SNCashback::all()->where('status','Aktif');
        return view('sn.data_sn_aktif', compact('sn'));
    }

    public function create(){
        return view('sn.create_sn');
    }

    public function simpan(Request $request){
        // dd($request->all());
        SNCashback::create([
            'sn' => $request->sn,
            'judul' => $request->judul,
            'harga' => $request->harga,
            'status' => $request->status,
        ]);

        return redirect('sn');
    }

    public function edit($id){
        $data = SNCashback::where('id_sn',$id)->first();
        return view('sn.edit_sn', compact('data'));
    }

    public function update($id,SNCashback $snc, Request $request){
        $simpan = $snc->where('id_sn',$id)->update([
            'sn' => $request->sn,
            'judul' => $request->judul,
            'harga' => $request->harga,
            'status' => $request->status,
        ]);
        if(!$simpan){
            return redirect()->route('sn')->with('error','data gagal di update');
        }
        return redirect()->route('sn')->with('success','data berhasil di update');
    }

    public function softDelete($id, SNCashback $snc){
        
        $simpan = $snc->where('id_sn',$id)->update([
            'status' => 'Nonaktif',
        ]);

        if(!$simpan){
            return redirect()->route('sn')->with('error','data gagal di nonaktifkan');
        }

        return redirect()->route('sn')->with('success','data berhasil di dinonaktifkan');
    }

    public function hardDelete($id, SNCashback $snc){
        $delete = $snc->where('id_sn',$id)->delete();

        if(!$delete){
            return redirect()->route('sn')->with('error','Data gagal di dihapus');
        }
        return redirect()->route('sn')->with('success','Data berhasil di hapus');
    }
}
