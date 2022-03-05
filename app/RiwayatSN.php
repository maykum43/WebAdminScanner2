<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Factories\HasFactory;

class RiwayatSN extends Model
{
    // use HasFactory;
    
    protected $table = "riwayat_s_n_s";
    protected $primaryKey = "id_rwsn";
    protected $foreignKey = "sn";
    protected $fillable = [
        'id_rwsn','sn','judul','id','status','created_at'
    ]; 
    public function rwt_sns(){
    	return $this->hasMany('App\SNCashback');
    }

    public function rwt_user(){
        return $this->hasMany('App\User');
    }
}
