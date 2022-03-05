<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RiwayatSN;
use App\SNCashback;
// use App\User;

class RiwayatController extends Controller
{
    public function index(Request $request){
        // dd($request->all());die();
        if($request->has('cari')){
            $riw = RiwayatSN::where('id','LIKE','%'.$request->cari.'%')->get();
        }
        return response()->json([
            'success' => 1,
            'message' => 'Get Serial Number Berhasil',
            'riws' => $sn
        ]);
    }

    public function his_sn(Request $request){ 

        $his = RiwayatSN::where('id','LIKE','%'.$request->his_sn.'%')->orderBy('created_at','desc')->get();

        if($his){
               return response()->json([
               'success' => 1,
               'message' => 'Hasil Riwayat',
               'riws' => $his
               ]);
        }
        return $this->error('Belum ada history.');
    }

    public function create_his(Request $request){
        // dd($request->all());
        
        // $sn = SNCashback::where('sn',$request)->first();
        $judul = SNCashback::where('sn',$request->sn)->value('judul');

        $create_his = RiwayatSN::create([
            'sn' => $request->sn,
            'id' => $request->user,
            'judul' => $judul,
        ]);
        
        SNCashback::where('sn',$request->sn)->update([
            'status' => 'Nonaktif',
        ]);

        if($create_his){
               return response()->json([
               'success' => 1,
               'message' => 'Success menyimpan riwayat',
               'riws' => $create_his
               ]);
        }

        return $this->error('Gagl Menyimpan History.');

        // return redirect()->route('rwtsn');
    }
}
