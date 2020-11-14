<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
   protected $fillable = [
                          'id', 'country', 'town' , 'state', 'state_code', 'post_code',
                            ];
}
