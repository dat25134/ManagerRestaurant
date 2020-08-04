<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Khuyenmai extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function ctkhuyenmais(){
        return $this->hasMany(Ctkhuyenmai::class);
    }
}
