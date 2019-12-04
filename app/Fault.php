<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fault extends Model
{
    
    protected $fillable=['category_id','user_id','vehicle_id','problem','cause','solution','imagename'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function vehicle(){
        return $this->belongsTo(Vehicle::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function faultreview(){
        return $this->hasMany(Faultreview::class);
    }
}
