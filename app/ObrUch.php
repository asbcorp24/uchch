<?php

namespace App;

use App\Scopes\AncientScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class ObrUch extends Model
{  protected $table = 'obr_uch';
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {

        });
        self::created(function ($model){

            $data[] =[
                'nazv' =>"Предмет",
                'obr' => $model->id,
            ];
            $data[] =[
                'nazv' =>"Дипломный проект",
                'obr' => $model->id,
            ];
            $data[] =[
                'nazv' =>"Консультации",
                'obr' => $model->id,
            ];
            $data[] =[
                'nazv' =>"Учебная практика",
                'obr' => $model->id,
            ];
            $data[] =[
                'nazv' =>"Производственная практика",
                'obr' => $model->id,
            ];
            TipPred::withoutGlobalScope(AncientScope::class)->insert($data);

                $settings = array(
                    array('key' => 'admin.kzach','display_name' => 'Коэффициент расчёта зачет','value' => '0.35','details' => NULL,'type' => 'text','order' => '6','group' => 'Admin','obr' =>  $model->id),
                    array('key' => 'admin.kezam','display_name' => 'Коэффициент расчёта экзамен','value' => '0.35','details' => NULL,'type' => 'text','order' => '7','group' => 'Admin','obr' =>  $model->id),
                    array('key' => 'admin.kkp','display_name' => 'Коэффициент расчёта курсовой проект','value' => '0.35','details' => NULL,'type' => 'text','order' => '8','group' => 'Admin','obr' =>  $model->id)
                );
          setting::withoutGlobalScope(AncientScope::class)->insert($settings);



        });

    }

}
