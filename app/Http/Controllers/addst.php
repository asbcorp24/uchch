<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class addst extends Controller
{
    public  function addstudent(Request $req){
$st=new Student();
$st->fam=$req->fam;
$st->name=$req->name;
$st->otch=$req->otch;
$st->d_r=$req->d_r;
$st->grupp=$req->grupp;
$st->save();
        return redirect(url('admin/student/'.$st->id.'/edit'));

    /*fam: Иванов
name: портфолио
otch: Иванович
phone: 89600305931
d_r: 2021-10-08
grupp: 2
id: -1*/
    }
}
