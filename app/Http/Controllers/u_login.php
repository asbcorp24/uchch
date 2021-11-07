<?php

namespace App\Http\Controllers;

use App\God;
use App\Prepod;
use App\Scopes\AncientScope;
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
     if ($user == null) return view('front/auth-login');

        Auth::loginUsingId(0);
       Auth::user()->obr=$user->obr;


        $god = God::all()->last();
        Session::put('obr', $user->obr);
        Session::put('god', $god->id);
        Session::put('userid', $user->id);
        Session::put('username', $user->fam . ' ' . $user->name . ' ' . $user->othc);
        Session::put('pr', 1);
        return view('front/index');
    }
}
