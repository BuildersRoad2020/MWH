<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contractor; use Illuminate\Support\Facades\DB;
use App\User; use App\Forms;
use App\Technician; use App\IndividualDocs;
use Auth;
use Carbon\Carbon;

class TechnicianController extends Controller
{
    public function index(Request $request) {			// inverse relationship(from Tech Table to Contractor Table)
        $user = User::where('id', auth()->user()->id)
          ->update([
        'last_login_at' => Carbon::now()->toDateTimeString(),
        'last_login_ip' => $request->getClientIp()
        ]); 
          
        if ((Auth::user()->email_verified_at == null)) {
        return view('technician.changepassword');
        }
     
    	$technicians = Technician::where('user_id', auth()->user()->id)
    	 ->first();

    	$contractors = Contractor::where('user_id', $technicians->contractor_id)
    	 ->first();  

      $Doc_Descs = DB::table('forms')
        ->where('Type', '=','Individual')->get();

     $id = Technician::where('user_id',auth()->user()->id)->select('id')->first();        

      $document =  DB::table('individual_docs')->join('forms','forms.id', '=', 'individual_docs.FormID')->join('countries','countries.id', '=', 'forms.Country')
        ->where('individual_docs.technician_id', $id->id) 
        ->Orderby('forms.Doc_Desc', 'ASC')->select('forms.Doc_Desc','individual_docs.FileName','individual_docs.Expiration','countries.Country','individual_docs.Coverage','individual_docs.Status')->paginate(15);
 
       	return view ('technician.index',[
    	'technicians' => $technicians,
    	'contractors' => $contractors,
        'Doc_Descs' => $Doc_Descs,
        'document' => $document,
    	]);
    }

    public function update(Request $request) {

        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'phone' => ['required','regex:/^[0-9]+$/'],
            'countrycode' => 'numeric',            
        ]);

        $update = User::find(auth()->user()->id);
        $update->name = ucwords($request['name']);
        $update->save();

        $technician = Technician::where('user_id', auth()->user()->id)->update([
        'name' => ucwords($request['name']),
        'phone' => $request['phone'],
        'countrycode' => $request['countrycode']]);;

    return redirect()->route('technician.index')->with('status','Details updated successfully!');

    }


    public function upload(Request $request) {


    if($request ->hasFile('FileName'))  {
      $request->validate([
            'FileName' => ['required','mimes:pdf', 'max:2000'],
            'Coverage' => ['sometimes'],
            'FormID' => 'required',
            'Expiration' => 'nullable|after:tomorrow',
           ],
           [
            'FileName.mimes' => 'Document should be: PDF.',
            'FileName.max' => 'Maximum file size allowed is 2 MB',
            'FormID.required' => 'Please select document description',
            'Expiration.after' => 'Invalid Expiration Date',
        ]);
    
    $FormID = $request['FormID'];   //adds type of file to filename    
    $Type = Forms::where('ID', $FormID)->get('Doc_Desc')->pluck('Doc_Desc'); //adds type of file to filename    
    $File = $request->file('FileName'); //file request
    $FileName = auth()->user()->name . ' '.  $Type->join(' ') . ' '. time() . '.' . $File->getClientOriginalExtension(); //rename file
    $FilePath = public_path() . '/storage/app/documents'; 
    $request->file('FileName')->move($FilePath, $FileName); //save actual file to storage

    $id = Technician::where('user_id',auth()->user()->id)->select('id','contractor_id')->first();

    $upload = IndividualDocs::updateOrCreate(
        ['technician_id' => $id->id, 'FormID'=> $FormID, 'contractor_id' => $id->contractor_id],
        ['FileName' => $FileName, 'Expiration' => $request['Expiration'], 'Coverage' => $request['Coverage'], 'Status'=> '2']
      );
  
      return back()->withInput()->with('technician.index')->with('status','Document uploaded successfully!');
    }
       
    return back();
    }


}
