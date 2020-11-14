<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{

	  protected $fillable = [
                          'id', 'contractor_id', 'FormID', 'FileName', 'Status', 'Coverage', 'Expiration', 
   						          ];
      public function contractor() {
    	return $this->hasOne(\App\Contractor::class);
      }

      public function rates() {
    	return $this->hasMany(\App\Rates::class);
      }      
}
