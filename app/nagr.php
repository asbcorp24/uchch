<?php

namespace App;

use App\Scopes\AncientScope;
use App\Scopes\godScope;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class nagr extends Model
{
    protected $table = 'nagr';

    public $additional_attributes = ['full_name'];


    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->obr = Auth::user()->obr;
            $model->god = Session::get('god', 0);
        });
        static::addGlobalScope(new AncientScope);
        static::addGlobalScope(new godScope);
    }
    public function predmets()
    {
        return $this->belongsTo('App\Predmet','predmet');
    }
    public function getFullNameAttribute()
    {
        return "{$this->predmets->nazv}- {$this->prepods->fam}- {$this->prepods->name}- {$this->prepods->otch}-{$this->grupps->nazv}";
    }
    public function prepods()
    {
        return $this->belongsTo('App\Prepod','prepod');
    }
    public function grupps()
    {
        return $this->belongsTo('App\Grupp','grupp');
    }
    public function kaf()
    {
        return $this->belongsTo('App\Pck','pck');
    }
    public function typ_pred()
    {
        return $this->belongsTo('App\TipPred','typ_pr');
    }

}
