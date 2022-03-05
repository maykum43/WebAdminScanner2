<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SNCashback;

class SnController extends Controller
{
    public function index(){
        // dd($request->all());die();
        $sn = SNCashback::all();
        return response()->json([
            'success' => 1,
            'message' => 'Get Serial Number Berhasil',
            'sns' => $sn
        ]);
    }

    public function cari_sn(Request $request){

        $sn = SNCashback::where('sn','LIKE','%'.$request->cari_sn.'%')->where('status','Aktif')->get();

        if($sn !== null){
               return response()->json([
               'success' => 1,
               'message' => 'Voucher Ditemukan',
               'sns' => $sn
               ]);
        }
        return $this->error('SN tidak ditemukan');
    }
}


    // if (isset($a) and ! is_null($a)) {
    //     $a = 1;