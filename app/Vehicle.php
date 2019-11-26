<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable=[];

    public function make(){
        return $this->belongsTo(Make::class);
    }
}
