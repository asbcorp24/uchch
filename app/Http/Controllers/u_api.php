<?php

namespace App\Http\Controllers;

use App\God;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class u_api extends Controller
{
  public function setgod(Request $req){
      $god=God::find($req->god);
      Session::put('god',$god->id);
return back()->withInput();
  }
}
