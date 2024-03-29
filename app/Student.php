<?php

namespace App;

use App\Scopes\AncientScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;


class Student extends Model
{
    protected $table = 'student';
    public $timestamps = true;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public $additional_attributes = ['full_name'];

    public function gruppa()
    {
        return $this->belongsTo('App\GruppUchzav','grupp');
    }
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->obr = Auth::user()->obr;
        });
        self::deleting(function($model){
            // ... code here
            Studball::where('stud_id',$model->id)->delete();
            Sprikaz::where('student_id',$model->id)->delete();
            StudentSved::where('student_id',$model->id)->delete();
        });

        static::addGlobalScope(new AncientScope);
    }
}
