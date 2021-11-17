<?php

namespace App;

use App\Scopes\AncientScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;


class TipEkz extends Model
{  protected $table = 'tip_ekz';
    use SoftDeletes;
public static function boot()
{
    parent::boot();
    self::creating(function ($model) {
        $model->obr = Auth::user()->obr;
    });


    static::addGlobalScope(new AncientScope);
}

}
