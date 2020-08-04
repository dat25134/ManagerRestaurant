<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phieunhap extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function user(){
        return $this->belongsTo(User::class,'id_users');
    }

    public function nhacungcap(){
        return $this->belongsTo(Nhacungcap::class,'id_nhacungcaps');
    }

    public function chitietpns(){
        return $this->hasMany(Chitietpn::class);
    }
}
