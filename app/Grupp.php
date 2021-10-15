<?php

namespace App;

use App\Scopes\AncientScope;
use App\Scopes\godScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class Grupp extends Model
{
    protected $table = 'grupp';
    public $timestamps = true;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->obr = Auth::user()->obr;
            $model->god = Session::get('god',0);
        });
        static::addGlobalScope(new AncientScope);
        static::addGlobalScope(new godScope);
    }
}
