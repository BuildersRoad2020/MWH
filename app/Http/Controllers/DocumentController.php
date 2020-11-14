<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contractor;
use App\Document;
use App\Country;
use App\User;
use App\Forms;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;


class DocumentController extends Controller
{
    public function index() {       //vendor document dashboard1

    $document = DB::table('documents')
      ->join('forms', 'forms.ID', '=', 'documents.FormID')
      ->join('countries','countries.id', '=', 'forms.Country')
      ->Orderby('forms.Type', 'ASC')
      ->Orderby('documents.Status', 'DESC')
      ->where('documents.contractor_id', auth()->user()->id)
      ->where('forms.Type', '<>' ,'Work Area')
      ->where('forms.Type', '<>' ,'Individual')  
      ->where('forms.Type', '<>' ,'Agreement') 
      ->where('forms.Type', '<>' ,'Technical')       
      ->where('forms.Type', '<>' ,'Others')        
      ->select('forms.Type', 'forms.Doc_Desc', 'documents.Coverage', 'documents.Expiration', 'countries.Country', 'documents.Status', 'documents.FileName')
      ->paginate(15);

   $Doc_Descs = Forms::distinct()
      ->where('Type', '<>' ,'Work Area')
      ->where('Type', '<>' ,'Individual')  
      ->where('Type', '<>' ,'Agreement') 
      ->where('Type', '<>' ,'Technical')       
      ->where('Type', '<>' ,'Others')  
      ->OrderBy('Doc_Desc', 'ASC')                                    
      ->select('Doc_Desc', 'id',)
      ->get();      

    $FDC = Forms::where('id', '1') //financial detail form
      ->pluck('FileName')
      ->first();
 
      return view ('vendor.upload',[
        'document' => $document,
        'Doc_Descs' => $Doc_Descs,
        'FDC' => $FDC,
      ]);

    }

    public function index2() {       //vendor document dashboard2

    $document2 = DB::table('documents')
      ->join('forms', 'forms.ID', '=', 'documents.FormID')
      ->join('countries','countries.id', '=', 'forms.Country')      
      ->Orderby('forms.Type', 'ASC')
      ->Orderby('documents.Status', 'DESC')
      ->where('documents.contractor_id', auth()->user()->id)
      ->where('Type', '<>' ,'Insurance') 
      ->where('Type', '<>' ,'Safety') 
      ->where('Type', '<>' ,'Individual')  
      ->where('Type', '<>' ,'Agreement')  
      ->where('Type', '<>' ,'Financial')        
      ->select('forms.Type', 'forms.Doc_Desc', 'documents.Coverage', 'documents.Expiration', 'countries.Country', 'documents.Status', 'documents.FileName')
      ->paginate(15);

   $Doc_Descs2 = Forms::distinct()
      ->where('Type', '<>' ,'Insurance') 
      ->where('Type', '<>' ,'Safety') 
      ->where('Type', '<>' ,'Individual')  
      ->where('Type', '<>' ,'Agreement')  
      ->where('Type', '<>' ,'Financial')    
      ->OrderBy('Doc_Desc', 'ASC')                                     
      ->select('Doc_Desc', 'id',)
      ->get();      


      return view ('vendor.upload2',[
        'document2' => $document2,
        'Doc_Descs2' => $Doc_Descs2,
      ]);

    }

    public function upload(Request $request) { //vendor document dashboard1




     if($request ->hasFile('FileName'))  {
      $request->validate([
            'FileName' => ['required','mimes:pdf', 'max:2000'],
            'Coverage' => ['sometimes'],
            'FormID' => 'required',
           ],
           [
            'FileName.mimes' => 'Document should be: PDF.',
            'FileName.max' => 'Maximum file size allowed is 2 MB',
            'FormID.required' => 'Please select document description' ,
        ]);
    
     
    $FormID = $request['FormID'];   //adds type of file to filename    
    $Type = Forms::where('ID', $FormID)->get('Doc_Desc')->pluck('Doc_Desc'); //adds type of file to filename    
    $File = $request->file('FileName'); //file request
    $FileName = auth()->user()->name . ' '.  $Type->join(' ') . ' '. time() . '.' . $File->getClientOriginalExtension(); //rename file
    $FilePath = public_path() . '/storage/app/documents'; 
    $request->file('FileName')->move($FilePath, $FileName); //save actual file to storage
 

    $upload = Document::updateOrCreate(
        ['contractor_id' => auth()->user()->id, 'FormID'=> $FormID ],
        ['FileName' => $FileName, 'Expiration' => $request['Expiration'], 'Coverage' => $request['Coverage'], 'Status'=> '1']
      );
  
      return redirect()->route('vendor.documentuploads')->with('status','Document uploaded successfully!');
    }
       
    return back();
    }

    public function upload2(Request $request) { //vendor document dashboard2

    // $addtoratestable = Forms::where('Type', '=', 'Work Area')->select('Doc_Desc')->get();

   // dd($addtoratestable->pluck('Doc_Desc'));

     if($request ->hasFile('FileName'))  {
      $request->validate([
            'FileName' => ['required','mimes:pdf', 'max:2000'],
            'Coverage' => ['sometimes'],
            'FormID' => 'required',
           ],
           [
            'FileName.mimes' => 'Document should be: PDF.',
            'FileName.max' => 'Maximum file size allowed is 2 MB',
            'FormID.required' => 'Please select document description' ,
        ]);
    
     
    $FormID = $request['FormID'];   //adds type of file to filename    
    $Type = Forms::where('ID', $FormID)->get('Doc_Desc')->pluck('Doc_Desc'); //adds type of file to filename    
    $File = $request->file('FileName'); //file request
    $FileName = auth()->user()->name . ' '.  $Type->join(' ') . ' '. time() . '.' . $File->getClientOriginalExtension(); //rename file
    $FilePath = public_path() . '/storage/app/documents'; 
    $request->file('FileName')->move($FilePath, $FileName); //save actual file to storage
 

    $upload = Document::updateOrCreate(
        ['contractor_id' => auth()->user()->id, 'FormID'=> $FormID ],
        ['FileName' => $FileName, 'Expiration' => $request['Expiration'], 'Coverage' => $request['Coverage'], 'Status'=> '1']
      );

  
      return redirect()->route('vendor.documentuploads2')->with('status','Document uploaded successfully!');
    }
       
    return back();
    }

    //Final DB

    public function formsanddocuments(Request $request) { //Documents and Forms search and index
    $Type = $request['type'];                             //for Admin Dashboard
    $Country = $request['country'];    
    $forms = DB::table('forms')
      ->join('countries','countries.id', '=', 'forms.country' )
      ->Orderby('forms.Type', 'ASC')
      ->Orderby('forms.Doc_Desc', 'ASC')
      ->Where('forms.Type','LIKE','%'.$Type.'%')
      ->Where('countries.country','LIKE','%'.$Country.'%')      
      ->select('forms.Doc_Desc','forms.FileName','countries.country','forms.Type', 'forms.id',)
      ->paginate(15);   

   $types = Forms::distinct()
      ->select('type')
      ->orderby('type', 'ASC')
      ->get();

   $countries = Country::select('id','country')
      ->where('id','<>','1')
      ->get();


        return view('admin.forms',[
          'forms' => $forms,          
          'types' => $types,
          'countries' => $countries,]); 
    }



    public function deletedocument(Request $request) { //Documents and Forms delete function
      $id = $request['id'];                            //for Admin Dashboard
      $delete = Forms::find($id);
      $delete->delete();

      return back()->withInput()->with('status','Document Removed');
    }

    public  function updatedocument(Request $request) {     //Documents and Forms update
                                                            //for Admin Dashboard
      if($request ->hasFile('FileName'))  {
      $request->validate([
            'FileName' => ['required','mimes:pdf', 'max:2000'],
           ],
           [
            'FileName.mimes' => 'Document should be: PDF.',
            'FileName.max' => 'Maximum file size allowed is 2 MB',
        ]);
     
    $id = $request['id'];  
    $Doc_Desc = $request['Doc_Desc'];   //adds type of file to filename    
    $File = $request->file('FileName'); //file request
    $FileName = $Doc_Desc . time() . '.' . $File->getClientOriginalExtension(); //rename file
    $FilePath = public_path() . '/storage/app/forms'; 
    $request->file('FileName')->move($FilePath, $FileName); //save actual file to storage

    $upload = Forms::find($id);
    $upload->FileName = $FileName;
    $upload->save();
    
      return back()->withInput()->with('status','Document updated successfully!');
    }
      return back()->withInput()->with('status','No document uploaded!');
    }

    public  function newdocument(Request $request) {          //add new type
                                                              //admin dashboard
      if($request ->hasFile('FileName'))  {
      $request->validate([
            'Doc_Desc' => 'required',
            'Type' => 'required',
            'Country' => 'required',        
            'FileName' => ['required','mimes:pdf', 'max:2000'],
           ],
           [
            'FileName.mimes' => 'Document should be: PDF.',
            'FileName.max' => 'Maximum file size allowed is 2 MB',
        ]);
     
      $Doc_Desc = $request['Doc_Desc'];   //adds type of file to filename    
      $File = $request->file('FileName'); //file request
      $FileName = $Doc_Desc . time() . '.' . $File->getClientOriginalExtension(); //rename file
      $FilePath = public_path() . '/storage/app/forms'; 
      $request->file('FileName')->move($FilePath, $FileName); //save actual file to storage

      $forms = new Forms;
      $forms->Doc_Desc = $request->Doc_Desc;
      $forms->FileName = $FileName;    
      $forms->Type = $request->Type;
      $forms->Country = $request->Country;
      $forms->save();
    
      return back()->withInput()->with('status','Document updated successfully!');
    }


      $request->validate([
          'Doc_Desc' => 'required',
          'Type' => 'required',
          'Country' => 'required',
        ]);

      $forms = new Forms;
      $forms->Doc_Desc = $request->Doc_Desc;
      $forms->Type = $request->Type;
      $forms->Country = $request->Country;
      $forms->save();
      return back()->withInput()->with('status','Document added successfully!');
    }

    public  function forms() {

      $Forms = Forms::orwhere('Type', 'Financial')->orwhere('Type', 'Agreement')->select('Doc_desc', 'FileName')->orderby('Doc_desc', 'ASC')->get();   


      return view('vendor.forms',[
          'Forms' => $Forms]);          
    }

    

}
