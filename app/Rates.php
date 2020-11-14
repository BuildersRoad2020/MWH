<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rates extends Model
{

	protected $fillable = [
                       'contractor_id', 'FormID', 'Class', 'Rate' , 'Rate2' ];

    public function forms() {
    	return $this->belongsTo(\App\Forms::class);
      }

    public function contractor() {
    	return $this->hasOne(\App\Contractor::class);
      }          
}
