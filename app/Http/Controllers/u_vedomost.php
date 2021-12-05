<?php

namespace App\Http\Controllers;

use App\nagr;
use App\Prepod;
use App\Scopes\AncientScope;
use App\Scopes\godScope;
use App\Shablon;
use App\Studball;
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


        $predmet=DB::table('shablon')
            ->join('nagr','shablon.predmet_id','nagr.id')
            ->join('grupp','grupp.id','=','nagr.grupp')
            ->join('predmet','predmet.id','=','nagr.predmet')
            ->select('grupp.nazv as gnazv','predmet.nazv','nagr.semestr','shablon.id')
            ->where('shablon.prepod',$prep)
            ->get();


$obr=Prepod::withoutGlobalScope(AncientScope::class)->find($prep)->obr;
$tip_ekz=TipEkz::withoutGlobalScope(AncientScope::class)->where('obr',$obr)->get();

        return  view('front/ved',compact( 'predmet','tip_ekz'));
    }

    public function api(Request $req){
        $md=$req->md;

        if ($md == 28) {
          $st=Studball::where('predmet_id',$req->pid)->where('stud_id',$req->sid)->get()->first();
          if($st!=null) $st->delete();
          $st=new Studball();
          $st->predmet_id=$req->pid;
          $st->stud_id=$req->sid;
          $st->ball=$req->ball;
     $st->save();
return $st;
            }

            if ($md == 26) {
$gr=Shablon::withoutGlobalScope(AncientScope::class)->find($req->gatt);
if ($gr==null) return 1;
$gr->dat_ekz=$req->datt;
$gr->tip_att=$req->tatt;

$gr->save();
$god=Session::get('god',-1);

    $predmet=DB::table('shablon')
        ->join('nagr','shablon.predmet_id','nagr.id')
        ->join('student','shablon.grupp_id','=','student.grupp')
        ->join('predmet','predmet.id','=','nagr.predmet')
        ->select( 'student.fam',
            'student.name',
            'student.otch',DB::raw("'0' as ball"),

            'student.id AS studid',
            'nagr.id as predmet_id')
        ->where('shablon.id',$req->gatt)
        ->get();



return [$predmet,$god,$req->gatt];
}
    }
}
