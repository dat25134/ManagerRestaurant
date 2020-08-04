<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mon extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function donvitinh(){
        return $this->belongsTo(Donvitinh::class,'id_donvitinhs');
    }

    public function nhommon(){
        return $this->belongsTo(Nhommon::class,'id_nhommons');
    }

    public function thanhphans(){
        return $this->hasMany(Thanhphan::class);
    }

    public function cthoadons(){
        return $this->hasMany(Cthoadon::class);
    }

    public function ctkhuyenmais(){
        return $this->hasMany(Ctkhuyenmai::class);
    }
}
