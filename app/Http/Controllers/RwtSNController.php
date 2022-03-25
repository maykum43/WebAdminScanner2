<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RiwayatSN;
use App\SNCashback;
use App\User;

class RwtSNController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // Request $request
    public function index(Request $request){

        if($request->has('cari')){
            $riw = RiwayatSN::where('id','LIKE','%'.$request->cari.'%')->paginate(10);
        }else{
            $riw = RiwayatSN::orderBy('created_at','desc')->paginate(10);
        }
        return view('riwayatSN.data_riwayatSN', compact('riw'));
    }
    public function create(){
        $data_sn = SNCashback::where('status','Aktif')->get();
        $data_user = User::all(); 

        return view('riwayatSN.create_riw',compact('data_sn'),compact('data_user'));
    }

    public function simpan(Request $request){
        // dd($request->all());

        // $judul = SNCashback::where('sn','Aktif')->get();
        $judul = SNCashback::where('sn',$request->sn)->value('judul');
        
        RiwayatSN::create([
            'sn' => $request->sn,
             
            'id' => $request->user,
            'status' => $request->status,
        ]);

        SNCashback::where('sn',$request->sn)->update([
            'status' => 'Nonaktif',
        ]);

        return redirect()->route('rwtsn');
    }

    public function edit($id){
        $data = RiwayatSN::where('id_rwsn',$id)->first();
        return view('riwayatSN.edit_riw', compact('data'));
    }

    public function update($id,RiwayatSN $rwsn, Request $request){
        // dd($request->all());

        $simpan = $rwsn->where('id_rwsn',$id)->update([
            'sn' => $request->sn,
            'id' => $request->user,
            'status' => $request->status,
        ]);

        if(!$simpan){
            return redirect()->route('rwtsn')->with('error','data gagal di update');
        }
        return redirect()->route('rwtsn')->with('success','data berhasil di update');
    }

    public function UpdateSelesai($id, RiwayatSN $rwsn){

        $simpan = $rwsn->where('id_rwsn',$id)->update([
            'status' => 'Selesai',
        ]);

        if(!$simpan){
            return redirect()->route('rwtsn')->with('error','data gagal di update');
        }

        return redirect()->route('rwtsn')->with('success','data berhasil di update');
    }

    public function SoftDelete($id, RiwayatSN $rwsn){

        $simpan = $rwsn->where('id_rwsn',$id)->update([
            'is_active' => '0',
        ]);

        if(!$simpan){
            return redirect()->route('rwtsn')->with('error','data gagal di update');
        }

        return redirect()->route('rwtsn')->with('success','data berhasil di update');
    }
}
