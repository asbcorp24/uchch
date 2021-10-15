<?php

namespace App;

use App\Scopes\AncientScope;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Auth;
use ESolution\DBEncryption\Traits\EncryptedAttribute;

class StudentSved extends Model
{
    use EncryptedAttribute;
    protected $table = 'student_sved';
    public $timestamps = true;
    protected $encryptable = [
        'value', 'comment'
    ];
    public function typ()
    {
        return $this->belongsTo('App\TypDann','type_sv');
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
