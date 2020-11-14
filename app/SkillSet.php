<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkillSet extends Model
{
    protected $fillable = [
                          'contractor_id', 'MP', 'VW', 'KIO', 'LED' , 'AUD', 'Cab', 'NDIA', 'BPC', 'APC', 'DAR','EW','PROJ','STOR','DEL','RDIS',
    ];

    public function contractor() {
    	return $this->hasOne(\App\Contractor::class);
    }
}
