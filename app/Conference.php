<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    protected $table = 'conferences';

    public function user(){
        return $this->belongsTo('App\User');
    }
}
