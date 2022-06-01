<?php

namespace App\Http\Controllers;

use App\Kategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class lkstd extends Controller
{
    public function index(Request $request=null, $id=null)
    {
      $stid=Session::get('stud_id',0);
$obr=Session::get('obr',0);
$kat=Kategory::where('obr',$obr)->get();
        return view('lkst/index',compact('kat'));

    }
}
