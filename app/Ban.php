<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ban extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function khuvuc()
    {
        return $this->belongsTo(Khuvuc::class,'id_khuvucs');
    }

    public function hoadons(){
        return $this->hasMany(Hoadon::class);
    }
}
