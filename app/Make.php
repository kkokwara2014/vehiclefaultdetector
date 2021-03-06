<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Make extends Model
{
    protected $fillable=['name'];
    
    public function vehicle(){
        return $this->hasMany(Vehicle::class);
    }
}
