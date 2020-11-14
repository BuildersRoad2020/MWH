<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contractor;
use App\User;
use App\SkillSet;
use App\Country;
use App\State;
use App\City;
use App\Document;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use \App\Mail\StatusUpdate;

class ShowContractorsController extends Controller
{

	public function index() {
	$showcontractors = Contractor::where('role', 2)
   	 ->orderBy('contractor_name')
   	 ->paginate(25);
   	     	return view ('admin.showcontractors', [
    		'showcontractors' => $showcontractors
    	]);
   }

	public function show (Contractor $showdetailedcontractor) {  // - Route Model binding "show(Model $variable that is declared in route)""
	
  $showskillset = SkillSet::where([
    'contractor_id' => $showdetailedcontractor->user_id,
  ])
    ->first();

  $contractorcountry = Contractor::pluck('country'); //to echo country name from countries table(update function uses country_id)
  $countryname = Country::find($contractorcountry)
         -> first();

  $contractorstate = Contractor::pluck('state'); //to echo state name from countries table(update function uses country_id)
  $statename = State::find($contractorstate)
         -> first();

  $contractorcity = Contractor::pluck('city'); //to echo state name from countries table(update function uses country_id)
  $cityname = City::find($contractorcity)
         -> first();

 
    $review = DB::table('documents')
      ->join('forms', 'forms.ID', '=', 'documents.FormID')
      ->join('countries','countries.id', '=', 'forms.Country')
      ->Orderby('forms.Type', 'ASC')
      ->Orderby('documents.Status', 'DESC')
      ->where(['documents.contractor_id' => $showdetailedcontractor->user_id],)
      ->where('forms.Type', '<>' ,'Work Area')
      ->where('forms.Type', '<>' ,'Individual')  
      ->where('forms.Type', '<>' ,'Agreement') 
      ->where('forms.Type', '<>' ,'Technical')       
      ->where('forms.Type', '<>' ,'Others')        
      ->select('forms.Type', 'forms.Doc_Desc', 'documents.Coverage', 'documents.Expiration', 'countries.Country', 'documents.Status', 'documents.FileName')
      ->paginate(15);        

 
  return view('admin.show', [
		'showdetailedcontractor' => $showdetailedcontractor,
    'showskillset' => $showskillset,
    'countryname' => $countryname,
    'statename' => $statename,
    'cityname' => $cityname,
    'review' => $review,
	]);

   }


   //test
   
    public function update(Contractor $showdetailedcontractor, Request $request) { //pag approve sa vendor

     $request->validate([
      'status' => 'required',
      ]);

    $checkFDC = Document::where(['contractor_id'=> $showdetailedcontractor->user_id])
      ->where('FormID',[1])   //Financial Detail Confirmation     
      ->count();

    $checkPLI = Document::where(['contractor_id'=> $showdetailedcontractor->user_id])
      ->where('FormID',[2])   // Public Liability Insurance     
      ->count();      

    $checkSWMS = Document::where(['contractor_id'=> $showdetailedcontractor->user_id])
      ->where('FormID',[4]) // SWMS Building Property and Site Maintenance        
      ->count();     

    $checkSWMS2 = Document::where(['contractor_id'=> $showdetailedcontractor->user_id])
      ->where('FormID',[5])  // SWMS Communication Equipment      
      ->count();      

    if($checkFDC == 0 || $checkPLI == 0 || $checkSWMS == 0 || $checkSWMS2 == 0)
       {
      return back()->withInput()->with('status','Incomplete Documents!');   
    }

    $checkpending = Document::where(['contractor_id'=> $showdetailedcontractor->user_id])
      ->whereIn('Status',[1,3,5])
      ->count();


    if($checkpending > 0)
             {
      return back()->withInput()->with('status','Please review documents!');   
    }

    $update = Contractor::where([
     'id' => $showdetailedcontractor->id])
     ->update([
     'status' => $request['status'],
        ]);

     $status =  Contractor::where([
     'id' => $showdetailedcontractor->id])
         ->pluck('Status')
         ->first();

    if($status == 1){
      $var = 'approved';
    }

    if($status == 0){
      $var = 'on Hold';
    }

     $ConfirmationEmail = [   
            'name'=> 'Dear '.$showdetailedcontractor->contractor_name,
            'body' =>  'Your account with Builders Road has been ' . $var,
 
        ];
        \Mail::to($showdetailedcontractor->email_primary)->send(new StatusUpdate($ConfirmationEmail));
          
  

      return back()->withInput()->with('admin.showcontractors')->with('status','Contractor updated successfully!');
    }
 
  //end test


  public function create(){

 $passuserstatus = User::where([      //for drop down filtering
      'role' => '2',
      'status' => '0',])
      ->get();

  return view('admin.addcontractors', [
    'passuserstatus' => $passuserstatus
  ]);

  }


  public function store(Request $request){                



    $request->validate([
            'contractor_name' => ['required', 'string', 'max:255'],
            'user_id' => 'required',
    ]);

 
    Contractor::create([
            'contractor_name' => $request['contractor_name'],
            'user_id' => $request['user_id'],
            'email_primary' => User::find($request['user_id'])->email,
        ]);

    SkillSet::create([                            //creates entry for Skill_sets table
          'contractor_id' => $request['user_id'],
    ]);


    User::where([                                   // para ma update ang status table pag select sa vendor
            'id' => $request['user_id'],
           ])
            ->update(['Status' => 1]);
          
      
   return redirect()->route('admin.showcontractors')->with('status','Contractor added successfully!');
  }






}
