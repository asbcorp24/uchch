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
    public function index($grupp = null, $predmet = null)
    {
        $prep = Session::get('userid', -1);
        $god = Session::get('god', -1);
        $res = null;
        $predm = null;
        $stud = null;


        $predmet = DB::table('shablon')
            ->join('nagr', 'shablon.predmet_id', 'nagr.id')
            ->join('grupp', 'grupp.id', '=', 'nagr.grupp')
            ->join('predmet', 'predmet.id', '=', 'nagr.predmet')
            ->select('grupp.nazv as gnazv', 'predmet.nazv', 'nagr.semestr', 'shablon.id')
            ->where('shablon.prepod', $prep)
            ->where('shablon.act',1)
            ->get();


        $obr = Prepod::withoutGlobalScope(AncientScope::class)->find($prep)->obr;
        $tip_ekz = TipEkz::withoutGlobalScope(AncientScope::class)->where('obr', $obr)->get();

        return view('front/ved', compact('predmet', 'tip_ekz'));
    }

    public function api(Request $req)
    {
        $md = $req->md;
        if ($md == 31) {
            $st = Shablon::find($req->id);
        $st->act=$req->db;
            $st->save();
            return $st;
        }
        if ($md == 28) {
            $st = Studball::where('predmet_id', $req->pid)->where('stud_id', $req->sid)->get()->first();
            if ($st != null) $st->delete();
            $st = new Studball();
            $st->predmet_id = $req->pid;
            $st->stud_id = $req->sid;
            $st->ball = $req->ball;
            $st->save();
            return $st;
        }

        if ($md == 26) {
            $gr = Shablon::withoutGlobalScope(AncientScope::class)->find($req->gatt);
            if ($gr == null) return 1;
            $gr->dat_ekz = $req->datt;
            $gr->tip_att = $req->tatt;

            $gr->save();
            $gr->natt = $req->natt;
            $gr->ntatt = $req->ntatt;
            $god = Session::get('god', -1);
            $dpredmet = DB::table('shablon')
                ->join('nagr', 'shablon.predmet_id', 'nagr.id')
                ->join('student', 'shablon.grupp_id', '=', 'student.grupp')
                ->join('studball', [['studball.stud_id', '=', 'student.id'], ['studball.predmet_id', '=', 'shablon.id'],])
                ->select('studball.id', 'student.fam',
                    'student.name',
                    'student.otch', 'studball.ball',
                    'student.id AS studid',
                    'shablon.id as predmet_id')
                ->where('shablon.id', $req->gatt);
            $insel = DB::table('studball')->select('stud_id')->where('predmet_id', $req->gatt)->get()->pluck('stud_id')->toArray();

            $predmet = DB::table('shablon')
                ->join('nagr', 'shablon.predmet_id', 'nagr.id')
                ->join('student', 'shablon.grupp_id', '=', 'student.grupp')
                ->join('predmet', 'predmet.id', '=', 'nagr.predmet')
                ->select(DB::raw("'0' as id"), 'student.fam',
                    'student.name',
                    'student.otch', DB::raw("'0' as ball"),

                    'student.id AS studid',
                    'shablon.id as predmet_id')
                ->where('shablon.id', $req->gatt)
                ->whereNotIn('student.id', $insel)
                ->union($dpredmet)
                ->get();


            return [$predmet, $gr, $req->gatt];
        }
    }
}
