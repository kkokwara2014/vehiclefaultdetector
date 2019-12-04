<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faultreview extends Model
{
    protected $fillable=['user_id','fault_id','headline','description','rating','approved'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function fault(){
        return $this->belongsTo(Fault::class);
    }


}
