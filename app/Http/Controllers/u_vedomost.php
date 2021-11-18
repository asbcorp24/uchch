<?php

namespace App\Http\Controllers;

use App\nagr;
use App\Scopes\AncientScope;
use App\Scopes\godScope;
use App\TipEkz;
use App\Vedomheader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class u_vedomost extends Controller
{
    public function index($grupp=null,$predmet=null){
        $prep=Session::get('userid',-1);
        $god=Session::get('god',-1);
        $res=null;
        $predm=null;
        $stud=null;

        $predmet=DB::table('nagr')
                 ->join('grupp','grupp.id','=','nagr.grupp')
                ->join('predmet','predmet.id','=','nagr.predmet')
                ->select('grupp.nazv as gnazv','predmet.nazv','nagr.semestr','nagr.id')
                ->where('nagr.prepod',$prep)
            ->where('nagr.god',$god)
            ->get();



$tip_ekz=TipEkz::all();
        return  view('front/ved',compact( 'predmet','tip_ekz'));
    }

    public function api(Request $req){
        $md=$req->md;
if ($md == 26) {
$gr=Vedomheader::where('nagr_id',$req->gatt)->get()->first();
if($gr==null){$gr=new Vedomheader();$gr->nagr_id=$req->gatt;}
    $god=Session::get('god',-1);
$gr->dat=$req->datt;
$gr->t_att=$req->tatt;
$gr->save();
    $predmet=DB::table('nagr')
        ->join('student','nagr.grupp','=','student.grupp')

        ->select( 'student.fam',
            'student.name',
            'student.otch',DB::raw("'0' as ball"),

  'student.id AS studid',
  'nagr.id as predmet_id')
        ->where('nagr.id',$req->gatt)
        ->where('nagr.god',$god)
        ->get();

return [$predmet,$god,$req->gatt];
}
    }
}
