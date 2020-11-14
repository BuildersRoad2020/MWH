<?php

namespace App\Http\Controllers;

use App\City;
use App\State;
use App\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{

	//public function index()
    //    {
    //        $countries = DB::table("countries")->pluck("id");
    //        return view('vendor.update',compact('countries'));
    //    }
 
   public function getStateList()
        {
            $states = State::whereHas('countries', function($query) {
                $query->whereId(request()->input('country_id', 0));
            })
            ->pluck('name', 'id');

            return response()->json($states);
        }

   public function getCityList()
        {
            $cities = City::whereHas('states', function($query) {
                $query->whereId(request()->input('state_id', 0));
            })
            ->pluck('name', 'id');

            return response()->json($cities);
        }
}

