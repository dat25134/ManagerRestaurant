<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Thanhphan extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function mon(){
        return $this->belongsTo(Mon::class,'id_mons');
    }

    public function mathang(){
        return $this->belongsTo(Mathang::class,'id_mathangs');
    }
}
