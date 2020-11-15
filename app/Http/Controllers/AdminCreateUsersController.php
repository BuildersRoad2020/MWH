<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Str;


use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use \App\Mail\SendMail;


//Controller allows Admin to Create Vendors and Admin


class AdminCreateUsersController extends Controller
{

 

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

  /*  protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => 'required',
        ]);
   } */


  public function createusers()
    {

        return view('admin.create');
    }

  public function storeusers(Request $request){

    $request->validate([
            'name' => ['required', 'string', 'max:255', 'min:8'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => 'required',
    ]);

    $UCwordsname = ucwords($request['name']);

    $createuser = User::create([
            $pass =  STR::random(8),
            'name' => $UCwordsname,
            'email' => $request['email'],
            'password' => Hash::make($pass),
            'role' => $request['role'],
            ]);

        $email = $request['email'];
        $details = [
           
            'name'=> 'Dear '.$UCwordsname.'',
            'body' =>  'Your access to Builders group has been created!',
            'user' => 'Your username is : '.$email,
            'password' => 'Your password is : '.$pass,

        ];
        \Mail::to($email)->send(new SendMail($details));
  
    if ($request['role'] == 1) {
     return redirect()->route('admin.index')->with('status','User created successfully!');
       }
     else if ($request['role'] == 2)
      { 
        return redirect()->route('admin.addcontractors')

      ->with('status','User created successfully! Please assign User to Contractor');
    }
    
  }

 
    

}