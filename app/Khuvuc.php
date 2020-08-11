<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Khuvuc extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function bans()
    {
        return $this->hasMany(Ban::class,'id_khuvucs','id');
    }
}
