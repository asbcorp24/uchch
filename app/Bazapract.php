<?php

namespace App;

use App\Scopes\AncientScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Traits\Spatial;

class Bazapract extends Model
{
    protected $table = 'bazapract';
    use SoftDeletes;
    use Spatial;
    protected $dates = ['deleted_at'];
    protected $spatial = ['gps'];
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->obr = Auth::user()->obr;
        });
        static::addGlobalScope(new AncientScope);
    }
}
