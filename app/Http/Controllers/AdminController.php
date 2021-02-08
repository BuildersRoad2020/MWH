<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contractor;
use App\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

//this is the index. shows users when they login

class AdminController extends Controller
{
  public function index(Request $request)
  {

    $user = User::where('id', auth()->user()->id)
      ->update([
        'last_login_at' => Carbon::now()->toDateTimeString(),
        'last_login_ip' => $request->getClientIp()
      ]);

    if ((Auth::user()->email_verified_at == null)) {
      return view('admin.changepassword');
    }

    $users = User::wherein('role', [1, 2, 3])
      ->OrderBy('role', 'ASC')
      ->OrderBy('name', 'ASC')
      ->paginate(15);

    return view('admin.index', [
      'users' => $users,
    ]);
  }

  public function search(Request $request)
  {
    $query = $request['query'];
    $users = User::where('name', 'LIKE', '%' . $query . '%')
      ->orWhere('email', 'LIKE', '%' . $query . '%')
      ->OrderBy('role', 'ASC')
      ->OrderBy('name', 'ASC')
      ->paginate(15);

    if (count($users) > 0) {
      return view('admin.index', [
        'users' => $users
      ]);
    } else {
      return back()->withInput()->with('status', 'No user found');
    }
  }

  public function create()
  {
    return view('admin.createusers');
  }
}
