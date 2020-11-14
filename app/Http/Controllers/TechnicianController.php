<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contractor;
use App\User;
use App\Technician;
use Auth;
use Carbon\Carbon;

class TechnicianController extends Controller
{
    public function index(Request $request){			// inverse relationship(from Tech Table to Contractor Table)
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
  
       	return view ('technician.index',[
    	'technicians' => $technicians,
    	'contractors' => $contractors,
    	]);
    }

}
