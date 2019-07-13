<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abtract extends Model
{
    protected $table = 'abtracts';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
