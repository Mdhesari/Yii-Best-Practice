<?php

namespace app\models;

use yii\db\ActiveRecord;

class Request extends ActiveRecord
{

    const SCENARIO_CREATE = 'scenario_create';
    const SCENARIO_CHECK = 'scenario_check';

    public static function tableName()
    {
        return "{{%auth_requests}}";
    }

    public function scenarios()
    {
        return [
            self::SCENARIO_CREATE => ['mobile', 'code'],
            self::SCENARIO_CHECK => ['state'],
        ];
    }
}
