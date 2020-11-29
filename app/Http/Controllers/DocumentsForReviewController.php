<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document; use App\Country; use App\User; use App\Forms; use App\WorkArea; use App\Rates; 
use Carbon\Carbon; use App\Contractor;
use Illuminate\Support\Facades\DB;

class DocumentsForReviewController extends Controller
{
  public function index(Contractor $Review) {

    $Review = DB::table('documents')
    ->join('contractors', 'contractors.user_id', '=', 'documents.contractor_id')
    ->join('forms', 'forms.id','=','documents.FormID')->where('forms.Type', '<>', 'Work Area')
    ->where('documents.Status', '<>', '2')->OrderBy('forms.Type')->OrderBy('forms.Doc_Desc')
    ->select('forms.Doc_Desc', 'documents.Status','documents.Coverage', 'documents.Expiration', 'contractors.contractor_name', 'contractors.currency', 'documents.id', 'documents.FileName')->paginate('15');

    $count = count($Review);

    $Rates =  DB::table('rates')
    ->join('forms', 'forms.id' ,'=', 'rates.FormID')
    ->join('documents', 'documents.FormID', '=', 'rates.formID')
    ->join('contractors', 'contractors.user_id', '=', 'rates.contractor_id')
    ->join('countries', 'countries.ID', '=', 'forms.country') ->where('documents.Status', '<>', '2')->OrderBy('forms.Doc_Desc')
    ->get(['rates.Class', 'rates.Rate', 'rates.Rate2','forms.Doc_Desc','documents.FileName', 'documents.Status', 'countries.country', 'contractors.contractor_name', 'documents.id',])->groupBy('Doc_Desc')->map(function ($Rate, $key) { return $Rate;});

    $count2 = count($Rates); 

    return view ('admin.review',[
      'Review' => $Review, 'Rates' => $Rates, 'count' => $count, 'count2' => $count2,
      
    ]);

  }

  public function update(Request $request) {

    $documentid = $request['document_id'];
    $FormID = Document::where('id', $documentid)->pluck('FormID');
    $Safety = DB::Table('documents')->join('forms', 'forms.id','=', 'documents.FormID')->where('forms.id','=', $FormID)->pluck('Type')->first();
    $Match = Forms::where('Type', 'Safety')->pluck('Type')->first();

    $Update = Document::find($documentid);
    if($Safety == $Match) {
      $Update->Expiration = Carbon::now()->addDays('730');
    }
    $Update->status = $request['Status'];      
    $Update->save();  

    return back()->withInput()->with('status','Document Approved!');  

  }

  public function workarea(Request $request) {
    $query = $request['query'];
    $Rates =  DB::table('rates')
    ->join('forms', 'forms.id' ,'=', 'rates.FormID')
    ->join('documents', 'documents.FormID', '=', 'rates.formID')
    ->join('contractors', 'contractors.user_id', '=', 'rates.contractor_id')        
    ->join('countries', 'countries.ID', '=', 'forms.country')->whereIn('documents.Status',[2,4])
    ->OrderBy('forms.Doc_Desc')->distinct('rates.Class')     
    ->get(['rates.Class', 'rates.Rate', 'rates.Rate2','forms.Doc_Desc','documents.FileName', 'documents.Status', 'countries.country', 'contractors.contractor_name'])->groupBy('contractor_name')->map(function ($Rate, $key) { return $Rate;});

    $count = count($Rates);

    return view('admin.rates',[
      'Rates' => $Rates, 'count' => $count,
    ]);
  }

  public function search(Request $request) {
    $query = $request['query'];
    $Rates =  DB::table('rates')
    ->join('forms', 'forms.id' ,'=', 'rates.FormID') 
    ->join('documents', 'documents.FormID', '=', 'rates.formID')
    ->join('contractors', 'contractors.user_id', '=', 'rates.contractor_id')        
    ->join('countries', 'countries.ID', '=', 'forms.country')->whereIn('documents.Status',[2,4])->where('Doc_Desc','LIKE','%'.$query.'%')
    ->get(['rates.Class', 'rates.Rate', 'rates.Rate2','forms.Doc_Desc','documents.FileName', 'documents.Status', 'countries.country', 'contractors.contractor_name'])->groupBy('contractor_name')->map(function ($Rate, $key) { return $Rate;});



    if (count($Rates) > 0)   {
      return view('admin.rates',[
        'Rates' => $Rates,
      ]);
    }
    else {
      return back()->withInput()->with('status','No Luck');
    }
  }

}
