<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Details extends Model
{
    protected $table = 'details';

    public function user(){
        return $this->belongsTo('App\User');
    }
}
