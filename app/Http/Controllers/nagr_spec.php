<?php

namespace TCG\Voyager\Http\Controllers;


namespace App\Http\Controllers;

use App\Grupp;
use App\nagr;
use App\Pck;
use App\Predmet;
use App\Prepod;
use App\Spec;
use App\TipPred;
use App\Usersved;
use App\UsersvedTyp;
use App\VrachSpec;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use TCG\Voyager\Database\Schema\SchemaManager;
use TCG\Voyager\Facades\Voyager;
use App\Scopes\AncientScope;
use App\Scopes\godScope;
class nagr_spec extends \TCG\Voyager\Http\Controllers\VoyagerBaseController
{


    public function index(Request $request, $id=null)
    {




        // If a column has a relationship associated with it, we do not want to show that field

        $view = 'nagr_spec';

        if(!isset($request->pr)) $grupp=Grupp::all();else {
            $grupp=Grupp::where('spec',$request->pr)->get();

        }

$predmet=Predmet::all()->sortBy('nazv');
$prepod=Prepod::all()->sortBy('fam');
        $pck=Pck::all()->sortBy('name');
        $spec=Spec::all();
        $typpr=TipPred::all();

        if($grupp->isEmpty())   return redirect('/admin/grupp')->with(['message' => "Вы должны добавить группу", 'alert-type' => 'error']);
        if($prepod->isEmpty())   return redirect('/admin/prepod')->with(['message' => "Вы должны добавить Преподавателя", 'alert-type' => 'error']);
        if($predmet->isEmpty())   return redirect('/admin/predmet')->with(['message' => "Вы должны добавить Предмет", 'alert-type' => 'error']);
        if($pck->isEmpty())   return redirect('/admin/pck')->with(['message' => "Вы должны добавить кафедру", 'alert-type' => 'error']);
        if(!isset($request->pr)) {
            $nagr = [];
            $defgr=[];

        }
        else{
            $defgr=Spec::find($request->pr);

         if(isset($request->sort))
         {
            if($request->sort==1) $nagr=nagr::withoutGlobalScope(AncientScope::class)->withoutGlobalScope(godScope::class)->select('nagr.*')->join('grupp',function ($join){
                $join->on('nagr.grupp', '=', 'grupp.id');
            })->where('grupp.spec',$request->pr)->where('nagr.obr',Auth::user()->obr)->where('nagr.god', Session::get('god',0))->orderBy('kommerc')->orderBy('predmet')->orderBy('semestr')->get();;
             if($request->sort==2) $nagr=nagr::withoutGlobalScope(AncientScope::class)->withoutGlobalScope(godScope::class)->select('nagr.*')->join('grupp',function ($join){
                 $join->on('nagr.grupp', '=', 'grupp.id');
             })->where('grupp.spec',$request->pr)->where('nagr.obr',Auth::user()->obr)->where('nagr.god', Session::get('god',0))->orderBy('semestr')->orderBy('predmet')->orderBy('kommerc')->get();;
             if($request->sort==3) $nagr=nagr::withoutGlobalScope(AncientScope::class)->withoutGlobalScope(godScope::class)->select('nagr.*')->join('grupp',function ($join){
                 $join->on('nagr.grupp', '=', 'grupp.id');
             })->where('grupp.spec',$request->pr)->where('nagr.obr',Auth::user()->obr)->where('nagr.god', Session::get('god',0))->orderBy('grupp')->orderBy('semestr')->orderBy('predmet')->get();;
             if($request->sort==4) $nagr=nagr::withoutGlobalScope(AncientScope::class)->withoutGlobalScope(godScope::class)->select('nagr.*')->join('grupp',function ($join){
                 $join->on('nagr.grupp', '=', 'grupp.id');
             })->where('grupp.spec',$request->pr)->where('nagr.obr',Auth::user()->obr)->where('nagr.god', Session::get('god',0))->orderBy('prepod')->orderBy('grupp')->orderBy('semestr')->orderBy('predmet')->get();;

         } else
          $nagr=nagr::withoutGlobalScope(AncientScope::class)->withoutGlobalScope(godScope::class)->select('nagr.*')->join('grupp',function ($join){
                $join->on('nagr.grupp', '=', 'grupp.id');
            })->where('grupp.spec',$request->pr)->where('nagr.obr',Auth::user()->obr)->where('nagr.god', Session::get('god',0))->orderBy('kommerc')->orderBy('predmet')->orderBy('semestr')->get();;


        }

        return Voyager::view($view, compact( 'grupp','predmet','prepod','pck','nagr','defgr','spec','typpr'));
    }

}
