<?php

namespace App;

use App\Scopes\AncientScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Portfolio extends Model
{
    protected $table = 'portfolio';
    public $timestamps = true;



    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->obr = Auth::user()->obr;
        });
        static::addGlobalScope(new AncientScope);
    }
}
