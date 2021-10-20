<?php

namespace App;

use App\Scopes\AncientScope;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Auth;


class Sprikaz extends Model
{
    protected $table = 'sprikaz';
    public $timestamps = true;

    public function pname()
    {
        return $this->belongsTo('App\Typpricaza','prikaz_id');
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
