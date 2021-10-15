<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use App\Scopes\AncientScope;

class Prepod extends Model
{
    protected $table = 'prepod';
    public $timestamps = true;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function getFullNameAttribute()
    {
        return "{$this->fam} {$this->name} {$this->otch}";
    }
    public $additional_attributes = ['full_name'];
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->obr = Auth::user()->obr;
        });
        static::addGlobalScope(new AncientScope);
    }
}
