<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hoadon extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function ban(){
        return $this->belongsTo(Ban::class,'id_bans');
    }

    public function vat(){
        return $this->belongsTo(Vat::class,'id_vats');
    }

    public function user(){
        return $this->belongsTo(User::class,'id_users');
    }

    public function cthoadons(){
        return $this->hasMany(Cthoadon::class,'id_hoadons','id');
    }

}
