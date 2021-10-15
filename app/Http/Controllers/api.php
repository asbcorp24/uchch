<?php

namespace App\Http\Controllers;

use App\Grupp;
use App\nagr;
use App\Sprikaz;
use App\Studball;
use App\Student;
use App\StudentSved;
use App\TipPred;
use App\TypDann;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Relations\Relation;
use function PHPUnit\Framework\isEmpty;

class api extends Controller
{
    public function index(Request $req)
    {
        $md = $req->md;
        if ($md == 1) {
            $res = TypDann::where('kategor', $req->id)->get();
            return $res;
        }
        if ($md == 2) {
            if ($req->did != -1)
                $res = StudentSved::find($req->did);
            else {
                $res = new StudentSved();
                $res->type_sv = $req->idtyp;
                $res->student_id = $req->id;

                $td = TypDann::find($req->idtyp);
            }

            //if($td->shifr==1)$res->value=$res->encryptedAttribute($req->value); else
            $res->value = $req->value;
            $res->comment = $req->comm;
            $res->save();
            $res->tp = $res->typ->kategor;
            if ($req->did != -1) $res->n = 1; else $res->n = 0;
            return $res;
        }
        if ($md == 3) {
            $res = StudentSved::find($req->id);
            $res->dop = $res->typ;
            return $res;
        }
        if ($md == 4) {
            $res = StudentSved::find($req->id);

            $res->tp = $res->typ->kategor;
            $res->delete();
            return $res;
        }
        if ($md == 5) {
            if ($req->bid > 0) {
                $res = Studball::find($req->bid);
                $res->predmet_id = $req->predm;
                $res->ball = $req->ball;
                $res->save();
                $res->t = $res->typ;
                return $res;
            } else
                $res = new Studball();
            $res->predmet_id = $req->predm;
            $res->stud_id = $req->id;
            $res->sem = $req->kurs;
            $res->ball = $req->ball;
            $res->save();
            $res->t = $res->typ;
            return $res;
        }
        if ($md == 6) {
            $res = Studball::where('stud_id', $req->id)->where('sem', $req->sem)->get();
            foreach ($res as $rs) {
                $rs->td = $rs->typ;
                $rs->b = $rs->tball;
            }

            return $res;
        }
        if ($md == 7) {
            $res = Studball::find($req->id);
            if ($res->tball != null) $res->tb = $res->tball;
            return $res;
        }
        if ($md == 8) {
            $res = Studball::find($req->id);
            $res->delete();
            return $res;
        }
        if ($md == 9) {
            $res = Grupp::all();
            return $res;
        }
        if ($md == 10) {
            $res = nagr::where('grupp', $req->grp)->where('semestr', $req->sem)->get();
            return $res;
        }
        if ($md == 11) {
            $res = nagr::where('grupp', $req->grp)->where('semestr', $req->sem)->get();

            foreach ($res as $rs) {
                $stdb = Studball::where('stud_id', $req->stud)->where('predmet_id', $rs->predmet)->where('sem', $rs->semestr)->first();

                if ($stdb == null) {
                    $tmp = new Studball();
                    $tmp->stud_id = $req->stud;
                    $tmp->predmet_id = $rs->predmet;
                    $tmp->prepod = $rs->prepod;
                    $tmp->sem = $rs->semestr;
                    $tmp->save();

                }
            }
            return 1;
        }
        if ($md == 12) {
            $res = nagr::Select('semestr')->where('grupp', $req->grp)->distinct()->get();
            return $res;
        }
        if ($md == 13) {
            $res = nagr::where('grupp', $req->grp)->where('semestr', $req->sem)->get();
            $stud = Student::where('grupp', $req->ingrp)->get();
            foreach ($stud as $item) {
                foreach ($res as $rs) {
                    $stdb = Studball::where('stud_id', $item->id)->where('predmet_id', $rs->predmet)->where('sem', $rs->semestr)->first();
                    if ($stdb == null) {
                        $tmp = new Studball();
                        $tmp->stud_id = $item->id;
                        $tmp->predmet_id = $rs->predmet;
                        $tmp->prepod = $rs->prepod;
                        $tmp->sem = $rs->semestr;
                        $tmp->save();
                    }
                }

            }
            return $res;
        }

        if ($md == 14) {
            if ($req->pid == -1) {
                $res = new Sprikaz();
                $res->student_id = $req->stud;
            } else $res = Sprikaz::find($req->pid);

            $res->prikaz_id = $req->tpr;
            $res->data_pr = $req->prdate;
            $res->name = $req->prname;
            $res->comment = $req->prcomment;
            $res->save();
            return $res;
        }


        if ($md == 15) {
            $res = Sprikaz::where('student_id', $req->id)->get();
            foreach ($res as $rs) {
                $rs->tb = $rs->pname;

            }
            return $res;
        }
        if ($md == 16) {
            $res = Sprikaz::find($req->id);

            return $res;
        }
        if ($md == 17) {
            $res = Sprikaz::find($req->id);
            $res->delete();
            return $res;
        }

    }
}
