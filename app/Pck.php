<?php

namespace App;

use App\Scopes\AncientScope;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class Pck extends Model
{
    protected $table = 'Pck';
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->obr = Auth::user()->obr;

        });
        static::addGlobalScope(new AncientScope);

    }
}
