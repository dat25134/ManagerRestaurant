<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mathang extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function loaimathang(){
        return $this->belongsTo(Loaimathang::class,'id_loaimathangs');
    }

    public function donvitinh(){
        return $this->belongsTo(Donvitinh::class,'id_donvitinhs');
    }

    public function chitietpns(){
        return $this->hasMany(Chitietpn::class);
    }

    public function thanhphans(){
        return $this->hasMany(Thanhphan::class);
    }
}
