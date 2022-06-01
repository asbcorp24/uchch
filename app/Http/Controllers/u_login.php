<?php

namespace App\Http\Controllers;

use App\God;
use App\Prepod;
use App\Scopes\AncientScope;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class u_login extends Controller
{
    public function show()
    {

        return view('front/auth-login');
    }

    public function login(Request $req)
    {

        if ($req->userpassword == null) return view('front/auth-login');
        $user = Prepod::withoutGlobalScope(AncientScope::class)->where('password', $req->userpassword)->get()->first();
        $not = "";

        $stud=Student::withoutGlobalScope(AncientScope::class)->where('passw', $req->userpassword)->get()->first();
     if (($user == null)&&($stud == null)) return view('front/auth-login');
if($stud!=null){
  Session::put('stud_id',$stud->id);
    Session::put('username', $stud->fam . ' ' . $stud->name . ' ' . $stud->othc);
    Session::put('obr', $stud->obr);
     return redirect( 'studinfo');
  // return redirect()->route('login');
}

        Session::put('obr', $user->obr);



        $god = God::withoutGlobalScope(AncientScope::class)->where('obr',$user->obr)->get()->last();

        Session::put('god', $god->id);
        Session::put('userid', $user->id);
        Session::put('username', $user->fam . ' ' . $user->name . ' ' . $user->othc);
        Session::put('pr', 1);
        return view('front/index');
    }
}
