<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    

    public function make(){
        return $this->belongsTo(Make::class);
    }
}
