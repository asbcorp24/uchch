<?php

namespace TCG\Voyager\Http\Controllers;


namespace App\Http\Controllers;

use App\otchets_perem;
use App\VrachSpec;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\DB;
class otchet extends \TCG\Voyager\Http\Controllers\VoyagerBaseController
{



    public function boot()
    {


    }

    public function logic(Request $request){



        $id=$request->otch;
        $res=\App\Otchet::find($id);
        $data = $request->all();
        $text=$res->text;
        $script=$res->script;
$par=[];
$col=[];$x=0;
       $sqltxt= $res->sql;
        $dat = explode(PHP_EOL, $sqltxt);

      foreach ($data as $key=>$value) {

         if($key=='otch')continue;
          if($key=='_token')continue;
          $par[$key]=$value;

      }

     // return [$res->sql,$par];

        if ( mb_strpos($dat[0], 'SET')!== false){
           $tm=$dat[0];
           $dat[0]='';
            $res->sql=implode(PHP_EOL,$dat);

            {
                $resu =  DB::statement($tm,$par);
              $resu = DB::select($res->sql);
                return [$resu,$text,$script];
            }

                 }
        $resu = DB::select($res->sql, $par );
     return [$resu,$text,$script];

    }
    public function shows(Request $request){

$id=$request->route('id');
    //    $ot=\App\Otchet::all();

   //   $res=\App\Otchet::find($id);
     //   $resu = DB::select('select * from users where 1');//, ['id' => 1]
        $otc=\App\Otchet::find($id);
        $perem=otchets_perem::where('otchet_id',$id)->get();
        $mas=[];$x=0;
        foreach ($perem as $per){
            if ($per->type==5){


                $res=DB::select($per->sql);
                $mas[$per->name]=$res;
            }

        }

     return view('otchet_show_full',compact('perem','id','mas','otc'));


    }

    public function index(Request $request){




$ot=\App\Otchet::all();

    return view('otchet_show',compact('ot'));


}

}
