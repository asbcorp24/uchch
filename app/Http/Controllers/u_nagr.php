<?php

namespace App\Http\Controllers;

use App\nagr;
use App\Scopes\AncientScope;
use App\Scopes\godScope;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class u_nagr extends Controller
{
    public function index(){
        $prep=Session::get('userid',-1);
       $nagr=nagr::withoutGlobalScope(AncientScope::class)->withoutGlobalScope(godScope::class)->select('nagr.*')->join('grupp',function ($join){
            $join->on('nagr.grupp', '=', 'grupp.id');
        })->where('prepod',$prep)->where('nagr.obr',Auth::user()->obr)->where('nagr.god', Session::get('god',0))->orderBy('semestru_nagr.php')->orderBy('predmet')->orderBy('kommerc')->get();;

        return   view('front/nagr',compact( 'nagr'));
    }
}
