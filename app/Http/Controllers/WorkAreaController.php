<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; use Carbon\Carbon;
use App\Contractor; use App\Document; use App\Country; use App\User; use App\Forms; use App\WorkArea; use App\Rates;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;


class WorkAreaController extends Controller
{


  public function rates(Request $request)  {  

    $Original = DB::table('documents')
    ->join('forms', 'forms.ID', '=', 'documents.FormID')
    ->where('documents.contractor_id', auth()->user()->id)       
    ->join('countries', 'countries.ID', '=', 'forms.country')     
    ->where('forms.Type','=','Work Area')
    ->leftjoin('work_areas','work_areas.FormID', '=' , 'documents.FormID')->OrderBy('forms.Doc_Desc','ASC')
    ->leftjoin('rates', 'rates.FormId', '=', 'documents.FormID')->distinct('rates.Class')
    ->get(['forms.Doc_Desc', 'work_areas.Type','documents.FormID', 'countries.country','documents.Status', 'work_areas.ID', 'rates.Rate', 'rates.Rate2', 'rates.Class' ])->groupBy('Doc_Desc')->map(function ($Rate, $key) { return $Rate;});


    $Rates = DB::table('rates')
    ->join('forms', 'forms.id' ,'=', 'rates.FormID')->where('rates.contractor_id', auth()->user()->id )->OrderBy('forms.Doc_Desc','ASC')
    ->join('documents', 'documents.FormID', '=', 'rates.formID')
    ->join('countries', 'countries.ID', '=', 'forms.country')->distinct('rates.Class')    		
    ->get(['rates.Class', 'rates.Rate', 'rates.Rate2','forms.Doc_Desc', 'documents.status', 'countries.country'])->groupBy('Doc_Desc')->map(function ($Rate, $key) { return $Rate;});



    return view('vendor.workarea',
      ['Original'=> $Original, 'Rates' => $Rates,
    ]);

  }

  public function addrates(Request $request) {

/*  $request->validate([
      'Type' => 'required',
      'Rate' => ['excludeif:Type,true','numeric|nullable'],
      'Rate2' => ['excludeif:Type,true','numeric|nullable'] //['excludeif:Type,true',],     
    ],
    [   'Type.required' => 'Select at least one State Type.',


    if( !empty ($request->Type)) {
       $request->validate([
          'Rate' => ['numeric'],
          'Rate2' => ['numeric'],
        ]);
    }


  ]); */

    $Type = $request['Type'];
    $FormID = $request['FormID']; 
    $Rate = $request['Rate'];  
    $Rate2 = $request['Rate2'];      
    $Class = $request['Class'];	 

    foreach($Type as $key=>$Type) {



      $upload = WorkArea::updateorCreate(
        ['contractor_id' => auth()->user()->id,   'FormID' => $FormID[$key], 'Type' => $Type  ],
        [ ],	); 
    }

    foreach($Class as $key=>$Class) {
      $test = Rates::updateorcreate(
        ['contractor_id' => auth()->user()->id, 'FormID' => $FormID[$key], 'Class' => $Class ],
        ['Rate' => $Rate[$key], 'Rate2' => $Rate2[$key] ],	);	
    } 


    $Others = $request['Others'];
    $arrayClass = explode(', ', $request['Others']);

    if ($Others != null) {
      foreach($arrayClass as $Class) {
        $Additional = Rates::updateorcreate(
          ['contractor_id'=> auth()->user()->id, 'FormID' => $request['newFormID'], 'Class' =>$Class ],
          [], ); } }

        return back()->withInput()->with('status','Document updated successfully!');

      } 

public function deleterates(Request $request) { //Delete function vendor rates
  $ID = $request['deleteformID'];    

  $Delete = WorkArea::where('contractor_id', auth()->user()->id)->where('FormID', $ID)->delete();  
  $Remove = Rates::where('contractor_id', auth()->user()->id)->where('FormID', $ID)->delete();


  return back()->withInput()->with('status','Rates Removed');
}
}








