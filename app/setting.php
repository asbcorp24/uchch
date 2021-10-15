<?php

namespace App;

use App\Scopes\AncientScope;
use App\Scopes\godScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

//use \TCG\Voyager\Models\
class setting extends \TCG\Voyager\Models\Setting
{
    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->obr = Auth::user()->obr;
       //     $model->god = Session::get('god', 0);
        });
       static::addGlobalScope(new AncientScope);
     //   static::addGlobalScope(new godScope);
    }
}
