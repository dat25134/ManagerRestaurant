<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Loaimathang extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function mathangs(){
        return $this->hasMany(Mathang::class);
    }

}
