<?php

namespace App;

use App\Scopes\AncientScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class Studball extends Model
{
    protected $table = 'studball';
    public $timestamps = true;

    public function typ()
    {
        return $this->belongsTo('App\Predmet','predmet_id');
    }
    public function tball()
    {
        return $this->belongsTo('App\TypBall','ball','num');
    }
       public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $res=Session::get('obr',null);
            $model->obr = Auth::user()?Auth::user()->obr:$res;
        });
        static::addGlobalScope(new AncientScope);
    }
}
