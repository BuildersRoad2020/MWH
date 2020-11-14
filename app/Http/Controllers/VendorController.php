<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contractor;
use App\User;
use App\Technician;
use App\Skillset;
use App\Country;
use App\State;
use App\City;
use App\Document;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Illuminate\Support\Str;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use \App\Mail\SendMail;
use \App\Mail\DocumentExpiry;
use Intervention\Image\Facades\Image;




class VendorController extends Controller
{
  public function index(Request $request) {

        $user = User::where('id', auth()->user()->id)
          ->update([
        'last_login_at' => Carbon::now()->toDateTimeString(),
        'last_login_ip' => $request->getClientIp()
        ]);    

        if ((Auth::user()->email_verified_at == null)) {
        return view('vendor.changepassword');
        }

        $passemailfromusers = User::where('id', auth()->user()->id)
          ->first();
        $contractors = Contractor::where('user_id', auth()->user()->id)
          ->first();
     
        $contractorcountry = Contractor::pluck('country'); //to echo country name from countries table
        $countryname = Country::where(['id' => $contractorcountry,])
          ->first();
        
        $contractorstate = Contractor::pluck('state'); //to echo state name from countries table(update function uses country_id)
        $statename = State::where(['id' => $contractorstate,])
         -> first();

        $contractorcity = Contractor::pluck('city'); //to echo state name from countries table(update function uses state_id)
        $cityname = City::where(['id' => $contractorcity,])
         -> first();

        $financial = Document::where('contractor_id', auth()->user()->id)
          ->where('FormID','4')
          ->pluck('Status')
          ->first();

        $WorkAreaVendorView = DB::table('documents')
        ->join('work_areas', 'work_areas.FormID', '=', 'documents.FormID')
        ->join('forms', 'forms.ID', '=', 'documents.FormID')
        ->where('forms.Type', '=', 'Work Area')
        ->orwhere('documents.FormID' ,'=', '2')
        ->orwhere('documents.FormID' ,'=', '1')       
        ->select('forms.Type', 'documents.status', 'work_areas.Type')
        ->get();

       


        return view ('vendor.index', [
          'contractors' => $contractors ,
          'passemailfromusers' => $passemailfromusers,
          'countryname' => $countryname,
          'statename' => $statename,
          'cityname' => $cityname,
          'financial' => $financial,

        ]);

    }
    
  public function edit()  {   //pag click sa update button(index page), populate na ang mga fields

      $passemailfromusers = User::where('id', auth()->user()->id)->select('email')
          ->first();
      
      $contractors = Contractor::where('user_id', auth()->user()->id)
        ->first();

      $countries = Country::all(); //dropdown displays all countries  
      $states = State::all(); 
      $cities = City::all();


      $contractorcountry = Contractor::pluck('country'); //to echo country name from countries table
       $countryname = Country::where(['id' => $contractorcountry,])
        ->first();
        

      $contractorstate = Contractor::pluck('state'); //to echo state name from countries table(update function uses country_id)
      $statename = State::where(['id' => $contractorstate,])
        -> first();

      $contractorcity = Contractor::pluck('city'); //to echo state name from countries table(update function uses state_id)
      $cityname = City::where(['id' => $contractorcity,])
        -> first();

       return view ('vendor.update', [
        'contractors' => $contractors,
        'countries' => $countries,
        'states' => $states,
        'cities' => $cities,
        'countryname' => $countryname,
        'statename' => $statename,
        'cityname' => $cityname,
        'passemailfromusers' => $passemailfromusers,
        ]);


    }
   
 public function getStates($id)
    {
        $states = DB::table("states")->where("country_id",$id)->pluck("name","id");

        return json_encode($states);
    }

  public function getCities($id)
    {
        $cities = DB::table("cities")->where("state_id",$id)->pluck("name","id");

        return json_encode($cities);
    }

  
    
  public function update(Request $request){     //function to update db record + with form validation

    $passemailfromusers = User::where('id', auth()->user()->id)
          ->first();

      $request->validate([
          'contractor_name' => 'required',
          'address' => 'required|max:60',
          'city' => 'required',
          'postcode' => 'required',       
          'state' => 'required',
          'country' => 'required',
          'abn' => 'required',
          'Name_primarycontact' => 'required',
          'phone_primary' => 'required|numeric',
          'terms' => 'required',
          'currency' => 'required',
          'branch' => 'required',
          'bankname' => 'required',
          'bsb' => 'required',
          'accountnumber' => 'required|numeric',
          'accountname' => 'required',
          'phone_secondary' => 'nullable|numeric',
          'email_secondary' => 'nullable|email',
        ], [
          'contractor_name.required' => 'Please enter your Contractor Name',
          'Name_primarycontact.required' => 'Please enter Primary Contact Person',  
          'phone_primary.required' => 'Please enter contact number',     
          'phone_primary.numeric' => 'No space and only numbers',                 
          'address.required' => 'Street Name is required',
          'address.max' => 'Street Name maximum characters is only 60',
          'country.required' => 'Please select a Country',
          'state.required' => 'Please select a State',          
          'city.required' => 'Please select a City',
          'postcode.required' => 'Post Code is required',
          'abn.required' => 'Please enter your Australian Business Number',
          'terms.required' => 'Please select Payment Terms', 
          'currency.required' => 'Please select your Currency',  
          'bankname.required' => 'Please enter your Bank Name',
          'branch.required' => 'Please enter your Banks Branch Name',
          'bsb.required' => 'Please enter Bank/State/Branch Number',
          'accountnumber.numeric' => 'Account Number must be numeric',
          'accountname.required' => 'Please enter your Account Name',



        ]);

      $removespace = $request['phone_primary']; //to remove spaces between phone numbers
      $removedspace = str_replace(' ', '', $removespace);
      $removespacecountrycode = $request['phone_primary_countrycode']; //to remove spaces between phone numbers
      $removedspacecountrycode = str_replace(' ', '', $removespacecountrycode);
      $intphone = (int)$removedspace;

      $removespacesecondary = $request['phone_secondary']; //to remove spaces between phone numbers
      $removedspacesecondary = str_replace(' ', '', $removespacesecondary);
      $removespacecountrycodesecondary = $request['countrycodesecondary']; //to remove spaces between phone numbers
      $removedspacecountrycodesecondary = str_replace(' ', '', $removespacecountrycodesecondary);      
      $intphonesecondary = (int)$removedspacesecondary; 
   
      Contractor::where(['user_id' => auth()->user()->id,])
        ->update([
          'contractor_name' => $request['contractor_name'],
          'address' => $request['address'],
          'city' => $request['city'],
          'postcode' => $request['postcode'],
          'state' => $request['state'],
          'country' => $request['country'],
          'abn' => $request['abn'],
          'Name_primarycontact' => $request['Name_primarycontact'],
          'countrycode' => $removedspacecountrycode,
          'phone_primary' => $intphone,
          'email_primary' => $passemailfromusers,
          'Name_secondarycontact' => $request['Name_secondarycontact'],
          'countrycodesecondary' => $removedspacecountrycodesecondary,          
          'phone_secondary' => $intphonesecondary,
          'email_secondary' => $request['email_secondary'],
          'terms' => $request['terms'],
          'currency' => $request['currency'],
          'bankname' => $request['bankname'],
          'branch' => $request['branch'],
          'bsb' => $request['bsb'],
          'accountnumber' => $request['accountnumber'], 
          'accountname' => $request['accountname'], 
          'email_primary' => auth()->user()->email,
        ]);
            
            return redirect()->route('vendor.index')->with('status','Contractor updated successfully!');
      
    }

    //This will be under Technicians Link

  public function showtechnicians (Technician $showtechnicians) {  // - Route Model binding "show(Model $variable that is declared in route)""
  
      $showtechnicians = Technician::where('contractor_id', auth()->user()->id)
           ->orderBy('name')
           ->paginate(15);

      $contractors = Contractor::where('user_id', auth()->user()->id)
          ->first();

            return view ('vendor.technician', [
          'showtechnicians' => $showtechnicians,
          'contractors' => $contractors,    
        ]);
    }


  public function createtechnicians(){       
            return view('vendor.add');
    }

  public function storetechnicians(Request $request){    //create user and then create technician

    $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required','regex:/[+][0-9]/'], 
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

    $newtechnician = User::create([
             $pass =  STR::random(8),
             $removespace = $request['phone'], //to remove spaces between phone numbers
             $removedspace = str_replace(' ', '', $removespace),
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($pass),
            'role' => '3',
        ]);

    Technician::create([
           'contractor_id' => auth()->user()->id,
           'user_id' => $newtechnician->id,
           'name' => $request['name'],
           'email' => $request['email'],
           'phone' => $removedspace,
        ]);
  
    $email = $request['email'];
      
   $details = [          
            'name'=> 'Dear '.$request['name'].'',
            'body' =>  'Your access to Builders group has been created!',
            'user' => 'Your username is : '.$email,
            'password' => 'Your password is : '.$pass,
        ];

    \Mail::to($email)->send(new SendMail($details));
            return redirect()->route('vendor.showtechnicians')->with('status','Technician Added successfully!');
    }

  public function viewskillset() {

      $viewskillset =  Skillset::where([
            'contractor_id'=> auth()->user()->id])
            ->first();
     
            return view ('vendor.skillset', [
            'viewskillset' => $viewskillset,
        ]);
    }
 
 public function updateskillset(Request $request) {

    Skillset::where([
            'contractor_id' => auth()->user()->id,
        ])
            ->update([
            'MP' => $request['MP'],
            'VW' => $request['VW'],
            'KIO' => $request['KIO'],
            'LED' => $request['LED'],
            'AUD' => $request['AUD'],     
            'CAB' => $request['CAB'],
            'NDIA' => $request['NDIA'],
            'BPC' => $request['BPC'],
            'APC' => $request['APC'], 
            'DAR' => $request['DAR'],
            'EW' => $request['EW'],
            'PROJ' => $request['PROJ'],
            'STOR' => $request['STOR'], 
            'DEL' => $request['DEL'],
            'RDIS' => $request['RDIS'],
        ]); 
            return redirect()->route('vendor.viewskillset')->with('status','Contractor Skillset updated successfully!');
    }

 

  
}
