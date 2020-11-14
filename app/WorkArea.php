<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkArea extends Model
{
    protected $fillable = [
                          'id', 'contractor_id', 'Type', 'FormID',
   						          ];

    public function contractor() {
    	return $this->hasOne(\App\Contractor::class);
      }
}
