<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable=['make_id','serialnum','model','engine','drivetraincount','doorcount','cylindernum'];

    public function make(){
        return $this->belongsTo(Make::class);
    }
}
