<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contractor;
use App\User;
use Auth;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ResetPasswordController extends Controller
{

    public function resetPassword(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
// The passwords matches
            return redirect()->back()->with("error","Your current password does not match with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
//Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);

//Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->save();

        return redirect()->route('admin.index')->with('status','Password changed successfully!');

    }

    public function resetPasswordtechnician(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
// The passwords matches
            return redirect()->back()->with("error","Your current password does not match with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
//Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);

//Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->save();

        return redirect()->route('technician.index')->with('status','Password changed successfully!');

    }

    public function resetPasswordvendor(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
// The passwords matches
            return redirect()->back()->with("error","Your current password does not match with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
//Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);

//Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->save();

        return redirect()->route('vendor.index')->with('status','Password changed successfully!');

    }

}