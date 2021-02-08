<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contractor;
use App\User;
use App\Rates;
use App\Forms;
use App\Document;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ChartsController extends Controller
{
  public function index()
  {

    $contractor = Contractor::select('status', \DB::raw("COUNT(*) as count"))
      ->groupBy('status')
      ->orderBy('status')
      ->get();

    $data = [];
    foreach ($contractor as $row) {
      $data['label'][] = $row->status ? 'approved' : 'onhold';
      $data['data'][] = (int) $row->count;
    }
    $data['chart_data'] = json_encode($data);

    //ACT Bar Chart
    $ACT = Rates::wherein('class', ['Metro', 'Regional', 'Remote'])->where('FormID', '=', '7')->select('class', \DB::raw("Count(*) as count"))->groupBy('class')->get();
    $data2 = [];
    foreach ($ACT as $row) {
      $data2['label_act'][] = $row->class;
      $data2['data_act'][] = (int) $row->count;
    }
    $data2['chart_data2'] = json_encode($data2);

    $NSW = Rates::wherein('class', ['Metro', 'Regional', 'Remote'])->where('FormID', '=', '6')->select('class', \DB::raw("Count(*) as count"))->groupBy('class')->get();
    $data3 = [];
    foreach ($NSW as $row) {
      $data3['label_nsw'][] = $row->class;
      $data3['data_nsw'][] = (int) $row->count;
    }
    $data3['chart_data3'] = json_encode($data3);

    $QLD = Rates::wherein('class', ['Metro', 'Regional', 'Remote'])->where('FormID', '=', '10')->select('class', \DB::raw("Count(*) as count"))->groupBy('class')->get();
    $data4 = [];
    foreach ($QLD as $row) {
      $data4['label_qld'][] = $row->class;
      $data4['data_qld'][] = (int) $row->count;
    }
    $data4['chart_data4'] = json_encode($data4);

    $NT = Rates::wherein('class', ['Metro', 'Regional', 'Remote'])->where('FormID', '=', '8')->select('class', \DB::raw("Count(*) as count"))->groupBy('class')->get();
    $data5 = [];
    foreach ($NT as $row) {
      $data5['label_nt'][] = $row->class;
      $data5['data_nt'][] = (int) $row->count;
    }
    $data5['chart_data5'] = json_encode($data5);

    $SA = Rates::wherein('class', ['Metro', 'Regional', 'Remote'])->where('FormID', '=', '11')->select('class', \DB::raw("Count(*) as count"))->groupBy('class')->get();
    $data6 = [];
    foreach ($SA as $row) {
      $data6['label_sa'][] = $row->class;
      $data6['data_sa'][] = (int) $row->count;
    }
    $data6['chart_data6'] = json_encode($data6);

    $TAS = Rates::wherein('class', ['Metro', 'Regional', 'Remote'])->where('FormID', '=', '12')->select('class', \DB::raw("Count(*) as count"))->groupBy('class')->get();
    $data7 = [];
    foreach ($TAS as $row) {
      $data7['label_tas'][] = $row->class;
      $data7['data_tas'][] = (int) $row->count;
    }
    $data7['chart_data7'] = json_encode($data7);

    $VIC = Rates::wherein('class', ['Metro', 'Regional', 'Remote'])->where('FormID', '=', '13')->select('class', \DB::raw("Count(*) as count"))->groupBy('class')->get();
    $data8 = [];
    foreach ($VIC as $row) {
      $data8['label_vic'][] = $row->class;
      $data8['data_vic'][] = (int) $row->count;
    }
    $data8['chart_data8'] = json_encode($data8);

    $WA = Rates::wherein('class', ['Metro', 'Regional', 'Remote'])->where('FormID', '=', '14')->select('class', \DB::raw("Count(*) as count"))->groupBy('class')->get();
    $data9 = [];
    foreach ($WA as $row) {
      $data9['label_wa'][] = $row->class;
      $data9['data_wa'][] = (int) $row->count;
    }
    $data9['chart_data9'] = json_encode($data9);

    //dd($data2);
    return view('admin.charts', [
      'data' => $data,
      'data2' => $data2,
      'data3' => $data3,
      'data4' => $data4,
      'data5' => $data5,
      'data6' => $data6,
      'data7' => $data7,
      'data8' => $data8,
      'data9' => $data9,
    ]);
  }
  public function vendor()
  {
    //mandatory document chart
    $mandatory = Forms::where('mandatory', '=', '1')->select('ID')->get();
    $data = [];
    foreach ($mandatory as $id) {
      $data['uploaded_count'][] = Document::where('contractor_id', auth()->user()->id)->where('FormID', $id->ID)->pluck('FormID')->first();
    }
    foreach ($data['uploaded_count'] as $index => $value) { //to remove null values reported above
      if ($value === null) unset($data['uploaded_count'][$index]);
    }
    $data['total_count'][] = Forms::where('mandatory', '=', '1')->count();
    $data['label'][0] = 'Uploaded';
    $data['label'][1] = 'Pending';
    $data['data'][0] = count($data['uploaded_count']);
    $data['data'][1] = Forms::where('mandatory', '=', '1')->count() - $data['data'][0];
    $encoded['label'] = $data['label'];
    $encoded['data'] = $data['data'];
    $data['compliance'] = round(($data['data'][0] / Forms::where('mandatory', '=', '1')->count() * 100),2) . '%';

    $data['chart_data'] = json_encode($encoded);
    $test = $data['data'][0] / Forms::where('mandatory', '=', '1')->count();

    //dd($data);
    return view('vendor.charts', [
      'data' => $data,
    ]);
  }
}
