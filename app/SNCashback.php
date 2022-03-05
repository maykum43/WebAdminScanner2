<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SNCashback extends Model
{
    protected $table = "s_n_cashbacks";
    protected $primaryKey = "id_sn";
    protected $fillable = [
        'id_sn','judul','sn','harga','status'
    ];
    public function sns(){
    	return $this->belongsTo('App\User');
    }
}
