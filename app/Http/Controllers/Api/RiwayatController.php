<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RiwayatSN;
use App\SnProduk;
use App\HadiahModel;
use App\RiwRedModel;
// use App\User;

class RiwayatController extends Controller
{
    public function error($pesan){
        return response()->json([
            'success' => 0,
            'message' => $pesan
        ]);
    }

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
        $poinAwal = RiwayatSN::where('email',$request->email)->sum('poin');
        $poinRedeem= RiwRedModel::where('email',$request->email)->sum('jml_poin');
        $sisaPoin = $poinAwal - $poinRedeem;

        if($sisaPoin ==! null){
                        return response()->json([
                        'success' => 1,
                        'message' => 'Total Poin',
                        'Nama User' => $request->email,
                        'TotalPoin' => $sisaPoin.' Poin'
                        ]);
                    }
        elseif ($sisaPoin == null) {
            return response()->json([
            'success' => 1,
            'message' => 'Total Poin',
            'Nama User' => $request->email,
            'TotalPoin' => 0
            ]);
            
        }
         return $this->error('Poin Error.');

    }

    public function redeemPoin(Request $request)
    {
        //total poin yang telah di redeem
        $poinRedeem= RiwRedModel::where('email',$request->email)->sum('jml_poin');

        //total poin user
        $totalPoin_user = RiwayatSN::where('email',$request->email)->sum('poin');

        //request poin hadiah
        $req_poinHadiah = HadiahModel::where('name',$request->name)->sum('req_poin');

        //hasil total poin user - poin yang telah di redeem
        $result = $totalPoin_user - $poinRedeem;
        $sisaPoin = $result - $req_poinHadiah;
        $sisaPoin2 = $req_poinHadiah-$result;

        if ($result >= $req_poinHadiah) {
            $riwayatRed = RiwRedModel::create([
                'email'=> $request->email,
                'jml_poin'=> $req_poinHadiah,
                'status'=>$request->status,
                'nama_hadiah'=>$request->name,
            ]);

            HadiahModel::where('name',$request->name)->update([
                // 'stok' => ,
            ]);

            if($riwayatRed){
                return response()->json([
                    'success' => 1,
                    'message' => 'Redem Berhasil',
                    'Data' => $riwayatRed,
                    'Poin Awal'=>$totalPoin_user,
                    'sisaPoin' => $sisaPoin
                ]);
            }
        }else{
            return response()->json([
                'error' => 0,
                'message'=>'Mohon maaf, Poin kamu tidak mencukupi.',
                'Nama'=>$request->email,
                'Poin yang Dibutuhkan'=>$sisaPoin2,
                'Nama Hadiah'=>$request->name,
                'Poin Hadiah'=>$req_poinHadiah
            ]);
        }
        
    }

    public function riwRed(Request $request)
    {
        
    }
}
