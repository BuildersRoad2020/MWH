<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndividualDocs extends Model
{
	  protected $fillable = [
                          'id', 'contractor_id', 'FormID', 'FileName', 'Status', 'Coverage', 'Expiration', 'technician_id'
   						          ];
}
