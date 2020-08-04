<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nhacungcap extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function phieunhaps(){
        return $this->hasMany(Phieunhap::class);
    }


}
