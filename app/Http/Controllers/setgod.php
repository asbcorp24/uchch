<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class setgod extends Controller
{
   public function index(Request $req){
$god=$req->god;
$req->session()->put('god',$god);
       return back()->withInput();

   }
}
