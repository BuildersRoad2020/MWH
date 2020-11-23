<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technician extends Model
{

	  protected $fillable = [
                          'name', 'role', 'user_id', 'contractor_id' , 'email','phone', 'countrycode'
    ];
        public function contractors() {
        return $this->belongsTo(\App\Contractor::class);
    }

        public function user() {
    	return $this->belongsTo(\App\User::class);
    }

}
