<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accomodation extends Model
{
    protected $table = 'accomodations';
    
    public function user(){
        return $this->belongsTo('App\User');
    }
}
