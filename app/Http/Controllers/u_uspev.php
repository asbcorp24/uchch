<?php

namespace App\Http\Controllers;

use App\nagr;
use App\Scopes\AncientScope;
use App\Scopes\godScope;
use App\Studball;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class u_uspev extends Controller
{
    public function index($grupp=null,$predmet=null){

        $prep=Session::get('userid',-1);
        $res=null;
        $predm=null;
        $stud=null;
        if($predmet==null){
            $stud==DB::table('Studball')
                ->join('student','Studball.stud_id','=','student.id')
                ->join('grupp','grupp.id','=','student.grupp')
                ->select('student.fam','student.name','student.otch','student.id')
                ->distinct()
                ->get();
        }
        if($grupp==null){
$res=DB::table('Studball')
    ->join('student','Studball.stud_id','=','student.id')
    ->join('grupp','grupp.id','=','student.grupp')
    ->select('grupp.nazv','grupp.id')
    ->distinct()
    ->get();}
        if($grupp!=null){
            $predm=DB::table('Studball')
                ->join('student','Studball.stud_id','=','student.id')
                ->join('grupp','grupp.id','=','student.grupp')
                ->join('predmet','Studball.predmet_id','=','predmet.id')
                ->select('predmet.nazv','predmet.id')
                ->where('grupp.id',$grupp)
                ->distinct()
                ->get();}
     return   view('front/uspev',compact( 'res','predm','stud'));
    }
}
