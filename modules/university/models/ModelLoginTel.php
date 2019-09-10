<?php

namespace app\models;

use yii\base\Model;

class ModelLoginTel extends Model
{
    public $tel;

    public function rules()
    {
        return [
            ['tel', 'required', 'message' => ' {attribute} باید وارد شود'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'tel' => 'شماره همراه',
        ];
    }
}
