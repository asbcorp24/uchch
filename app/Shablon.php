<?php

namespace App;

use App\Scopes\AncientScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Shablon extends Model
{
    protected $table = 'shablon';
    public function nagruz()
    {
        return $this->belongsTo('App\nagr','predmet_id');
    }
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->obr = Auth::user()->obr;
        });
        static::addGlobalScope(new AncientScope);
    }

}
