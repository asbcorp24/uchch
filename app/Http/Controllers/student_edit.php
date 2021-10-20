<?php

namespace TCG\Voyager\Http\Controllers;


namespace App\Http\Controllers;

use App\Grupp;
use App\GruppUchzav;
use App\Kategory;
use App\nagr;
use App\Pck;
use App\Predmet;
use App\Prepod;
use App\Student;
use App\StudentSved;
use App\TipPred;
use App\TypBall;
use App\Typpricaza;
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
class student_edit extends \TCG\Voyager\Http\Controllers\VoyagerBaseController
{


    public function index(Request $request, $id=null)
    {




        // If a column has a relationship associated with it, we do not want to show that field

        $view = 'student_browse';

        $grupp=GruppUchzav::all();

        $predmet=Predmet::all()->sortBy('nazv');
        $prepod=Prepod::all()->sortBy('fam');
        $pck=Pck::all()->sortBy('name');



        if($grupp->isEmpty())   return redirect('/admin/grupp')->with(['message' => "Вы должны добавить группу", 'alert-type' => 'error']);

        if(!isset($request->pr)) {
            $nagr = [];
            $defgr=[];

        }
        else{
            $defgr=GruppUchzav::find($request->pr);


                $nagr=Student::where('grupp',$request->pr)->orderBy('fam')->get();;


        }
        $prikaz=Typpricaza::all();

        return Voyager::view($view, compact( 'grupp','predmet','prepod','pck','nagr','defgr','prikaz'));
    }
    public function edit(Request $request, $id)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        if (strlen($dataType->model_name) != 0) {
            $model = app($dataType->model_name);
            $query = $model->query();

            // Use withTrashed() if model uses SoftDeletes and if toggle is selected
            if ($model && in_array(SoftDeletes::class, class_uses_recursive($model))) {
                $query = $query->withTrashed();
            }
            if ($dataType->scope && $dataType->scope != '' && method_exists($model, 'scope'.ucfirst($dataType->scope))) {
                $query = $query->{$dataType->scope}();
            }
            $dataTypeContent = call_user_func([$query, 'findOrFail'], $id);
        } else {
            // If Model doest exist, get data from table name
            $dataTypeContent = DB::table($dataType->name)->where('id', $id)->first();
        }

        foreach ($dataType->editRows as $key => $row) {
            $dataType->editRows[$key]['col_width'] = isset($row->details->width) ? $row->details->width : 100;
        }

        // If a column has a relationship associated with it, we do not want to show that field
        $this->removeRelationshipField($dataType, 'edit');

        // Check permission
        $this->authorize('edit', $dataTypeContent);

        // Check if BREAD is Translatable
        $isModelTranslatable = is_bread_translatable($dataTypeContent);

        // Eagerload Relations
        $this->eagerLoadRelations($dataTypeContent, $dataType, 'edit', $isModelTranslatable);


$sved=StudentSved::where('student_id',$dataTypeContent->id)->get();
$predmet=Predmet::all();
            $view = "student_edit";
    $kat=Kategory::all();
    $typball=TypBall::all();
$prikaz=Typpricaza::all();
$defgr=GruppUchzav::find($request->pr);

        return Voyager::view($view, compact('dataType', 'dataTypeContent', 'isModelTranslatable','kat','sved','predmet','typball','prikaz','defgr'));
    }

}
