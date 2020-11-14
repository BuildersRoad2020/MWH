<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contractor extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                          'contractor_name', 'role', 'status', 'address','city','postcode','state','country','abn','Name_primarycontact','phone_primary','email_primary','Name_secondarycontact','phone_secondary','email_secondary', 'terms','currency',  'bankname', 'branch', 'accountname', 'bsb', 'accountnumber', 'user_id', 'id', 'countrycodesecondary', 'countrycode'
    ];

    public function user() {
    	return $this->belongsTo(\App\User::class);
    }

    public function technicians() {
        return $this->hasMany(\App\Technician::class);
    }

    public function skillset() {
        return $this->hasOne(\App\Skillset::class);
    }

    public function Document() {
    return $this->hasOne(\App\Document::class);
    }

    public function ContractorCountry() {
    return $this->hasOne(\App\Country::class);
    }

    public function WorkArea() {
        return $this->hasMany(\App\WorkArea::class);
    }

    public function rates() {
      return $this->hasMany(\App\Rates::class);
      }     

}
