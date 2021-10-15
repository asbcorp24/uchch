<?php

namespace App\Http\Controllers;

use App\Grupp;
use App\nagr;
use App\Predmet;
use App\Prepod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class addngr extends Controller
{
   public function index(Request $req){
       if ($req->id>0) $nagr=nagr::find($req->id);else $nagr=new nagr();
       $nagr->kurs=$req->kurs;
       $nagr->semestr=$req->semestr;
       $nagr->typ_pr=$req->typ_pr;
       $nagr->predmet=$req->predmet;
       $nagr->prepod=$req->prepod;
       $nagr->grupp=$req->grupp;
       $nagr->pck=$req->pck;
       $nagr->podgr=$req->podgr;
       $nagr->pogos=$req->pogos;
       $nagr->leck=$req->leck;
       $nagr->lab=$req->lab;
       $nagr->pract=$req->pract;
       $nagr->KP=$req->KP;
       $nagr->ekz=$req->ekz;
       $nagr->zach=$req->zach;
       $nagr->srs=$req->srs;
       $nagr->inoe=$req->inoe;
       $nagr->save();
       return back()->withInput();
   }
   public function loadngr(Request $req){
       $id=$req->id;
       $nagr=nagr::find($id);
       return $nagr;
   }
    public function delngr(Request $req){
        $id=$req->id;
        $nagr=nagr::find($id);
        $nagr->delete();
    }

    public function add_prepod(Request $req)
    {
        $dat = $req->dat;
        $dat = explode(PHP_EOL, $dat);
        foreach ($dat as $dt) {
            $tmp = explode(' ', $dt);
            $data[] = [
                'fam' => $tmp[0],
                'name' => $tmp[1],
                'otch' => $tmp[2],
                'obr' => Auth::user()->obr
            ];

        }
        Prepod::insert($data);
        return back()->withInput();
    }
    public  function add_grupp(Request $req){
        $dat=$req->dat;
        $dat=explode(PHP_EOL,$dat);
        foreach($dat as $dt){
            $data[] =[
                'nazv' =>$dt,
                'obr'=>Auth::user()->obr,
                'god'=>Session::get('god',0)
            ];
        }
        Grupp::insert($data);
        return back()->withInput();
    }
    public  function add_predmet(Request $req){
        $dat=$req->dat;
        $dat=explode(PHP_EOL,$dat);
        foreach($dat as $dt){
            $data[] =[
                'nazv' =>$dt,
                'nazv_full' =>$dt,
                'obr'=>Auth::user()->obr,

            ];
        }
        Predmet::insert($data);
        return back()->withInput();
    }

}

