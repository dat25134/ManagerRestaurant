<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{

    public function mons(){
        return $this->hasMany(Mon::class,'id_mons');
    }
}
