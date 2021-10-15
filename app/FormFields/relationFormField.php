<?php

namespace App\FormFields;

use TCG\Voyager\FormFields\AbstractHandler;

class relationFormField extends AbstractHandler
{
    protected $codename = 'relation';

    public function createContent($row, $dataType, $dataTypeContent, $options)
    {
        return view('formfields.relation', [
            'row' => $row,
            'options' => $options,
            'dataType' => $dataType,
            'dataTypeContent' => $dataTypeContent
        ]);
    }
}