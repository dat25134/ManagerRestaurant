<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ctkhuyenmai extends Model
{
    // use SoftDeletes;
    // protected $dates = ['deleted_at'];

    public function khuyenmai(){
        return $this->belongsTo(Khuyenmai::class,'id_khuyenmais');
    }

    public function mon(){
        return $this->belongsTo(Mon::class,'id_mons');
    }
}
