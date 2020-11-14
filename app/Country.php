<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'id',
        'country',
       
    ];

    public function states()
    {
    	return $this->hasMany(State::class);
    }

    public function contractor()
    {
    	return $this->hasOne(Contractor::class);
    }
}
