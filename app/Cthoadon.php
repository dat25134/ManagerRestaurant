<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cthoadon extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function hoadon(){
        return $this->belongsTo(Hoadon::class,'id_hoadons','id');
    }

    public function mon(){
        return $this->belongsTo(Mon::class,'id_mons','id');
    }
}
