<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forms extends Model
{
	  protected $fillable = [
                          'id', 'Doc_Desc', 'FileName', 'Country', 'Type', 
   						          ];
      public function Forms() {
      }

    public function Rates() {
    	return $this->hasmany(\App\Rates::class);
      }      
}
