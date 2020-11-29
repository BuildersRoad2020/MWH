<?php

use Illuminate\Database\Seeder;
use App\City;
use App\Country;
use App\State;

class AddressesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $countries = [
        ['id' => '1','country' => ''],
        ['id' => '2','country' => 'Australia'],
        ['id' => '3','country' => 'New Zealand'],
        ['id' => '4','country' => 'Canada'],
        ];

        foreach($countries as $country) {
        Country::create($country);
        }
        
   
        $states = [
        ['id' => '1','country_id' => '1', 'name' => ''],          
        ['id' => '2','country_id' => '2', 'name' => 'New South Wales'],
        ['id' => '3','country_id' => '2', 'name' => 'Queensland'],
        ['id' => '4','country_id' => '2', 'name' => 'South Australia'],
        ['id' => '5','country_id' => '2', 'name' => 'Tasmania'],
        ['id' => '6','country_id' => '2', 'name' => 'Victoria'],
        ['id' => '7','country_id' => '2', 'name' => 'Australian Capital Territory'],
        ['id' => '8','country_id' => '2', 'name' => 'Northern Territory'],
        ['id' => '9','country_id' => '2', 'name' => 'Western Australia'],
        ['id' => '10','country_id' => '3', 'name' => 'Auckland'],
        ['id' => '11','country_id' => '3', 'name' => 'Gisborne'],
        ['id' => '12','country_id' => '4', 'name' => 'Alberta'],
        ['id' => '13','country_id' => '4', 'name' => 'British Columbia'],        
        ];
        
        foreach($states as $state){
        State::create($state);
        }

        $cities = [
        ['id' => '1','state_id' => '1', 'name' => ''],            
        ['id' => '2','state_id' => '2', 'name' => 'New South Wales City'],
        ['id' => '3','state_id' => '2', 'name' => 'New South Wales City2'],
        ['id' => '4','state_id' => '3', 'name' => 'WA 1'],
        ['id' => '5','state_id' => '3', 'name' => 'WA 2'],
        ['id' => '6','state_id' => '4', 'name' => 'Auckland 1'],
        ['id' => '7','state_id' => '4', 'name' => 'Auckland 2'],        
        ['id' => '8','state_id' => '5', 'name' => 'Gis 1'],
        ['id' => '9','state_id' => '5', 'name' => 'Gis 2'],
        ['id' => '10','state_id' => '6', 'name' => 'Alberta 1'],
        ['id' => '11','state_id' => '6', 'name' => 'Alberta 2'],
        ['id' => '12','state_id' => '7', 'name' => 'BC 1'],
        ['id' => '13','state_id' => '7', 'name' => 'BC 2'],      
        ['id' => '14','state_id' => '8', 'name' => 'Gis 3'],
        ['id' => '15','state_id' => '8', 'name' => 'Alberta 4'],
        ['id' => '16','state_id' => '9', 'name' => 'Alberta 5'],
        ['id' => '17','state_id' => '9', 'name' => 'BC Test6'],
        ['id' => '18','state_id' => '10', 'name' => 'BC Test 7'],    
        ['id' => '19','state_id' => '10', 'name' => 'BC 2'],      
        ['id' => '20','state_id' => '11', 'name' => 'Gis 3 Test New'],
        ['id' => '21','state_id' => '11', 'name' => 'Alberta 6'],
        ['id' => '22','state_id' => '12', 'name' => 'Alberta 7'],
        ['id' => '23','state_id' => '12', 'name' => 'ABC Test6'],
        ['id' => '24','state_id' => '13', 'name' => 'BC Test 8'],      
        ['id' => '25','state_id' => '13', 'name' => 'BC Test 9'],                    
        ];
        
        foreach($cities as $city){
        City::create($city);
        }
    }
}
