<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chitietpn extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function phieunhap(){
        return $this->belongsTo(Phieunhap::class,'id_phieunhaps');
    }

    public function mathang(){
        return $this->belongsTo(Mathang::class,'id_mathangs');
    }
}
