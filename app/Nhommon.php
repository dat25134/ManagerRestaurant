<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nhommon extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function mons(){
        return $this->hasMany(User::class);
    }
}
