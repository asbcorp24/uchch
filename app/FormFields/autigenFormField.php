<?php

namespace App\FormFields;

use TCG\Voyager\FormFields\AbstractHandler;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class autigenFormField extends AbstractHandler
{
    protected $codename = 'autogen';

    public function createContent($row, $dataType, $dataTypeContent, $options)
    {
          function gen_password($length = 6)
    {
        $password = '';
        $arr = array(

            '1', '2', '3', '4', '5', '6', '7', '8', '9', '0'
        );

        for ($i = 0; $i < $length; $i++) {
            $password .= $arr[random_int(0, count($arr) - 1)];
        }
        return $password;
    }
        $psw=gen_password(10);
        return view('formfields.autogen', [
            'row' => $row,
            'options' => $options,
            'dataType' => $dataType,
            'dataTypeContent' => $dataTypeContent,
            'pass'=>$psw.date("His")
        ]);
    }
}
