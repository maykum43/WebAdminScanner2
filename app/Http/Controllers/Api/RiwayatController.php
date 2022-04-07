<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RiwayatSN;
use App\SnProduk;
// use App\User;

class RiwayatController extends Controller
{
    public function index(Request $request){
        // dd($request->all());die();
        if($request->has('cari')){
            $riw = RiwayatSN::where('email','LIKE','%'.$request->cari.'%')->get();
        }
        return response()->json([
            'success' => 1,
            'message' => 'Get Serial Number Berhasil',
            'riws' => $sn
        ]);
    }

    public function his_sn(Request $request){ 

        $his = RiwayatSN::where('email','LIKE','%'.$request->his_sn.'%')->orderBy('created_at','desc')->get();

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
        $model = SnProduk::where('sn',$request->sn)->value('model');
        $poin = SnProduk::where('sn',$request->sn)->value('poin');

        $create_his = RiwayatSN::create([
            'sn' => $request->sn,
            'email' => $request->user,
            'model' => $model,
            'poin' => $poin,
        ]);
        
        SnProduk::where('sn',$request->sn)->update([
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

    public function TotalPoin(Request $request)
    {
        // $poin_user = RiwayatSN::select('email',$request->email,'sum(poin)');
        $poin_user = RiwayatSN::where('email',$request->email)->sum('poin');
        //SELECT SUM(poin)FROM riwayat_sn WHERE email = 'Fikri Maulana 2';

                    if($poin_user){
                        return response()->json([
                        'success' => 1,
                        'message' => 'Total Poin',
                        'TotalPoin' => $poin_user
                        ]);
                    }
                    return $this->error('Poin Error.');
    }
}
