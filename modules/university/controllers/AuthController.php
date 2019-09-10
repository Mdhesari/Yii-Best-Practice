<?php

namespace app\modules\university\controllers;

use Yii;
use yii\web\Controller;
use app\modules\university\models\ModelLoginTel;

class AuthController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {

        $model = new ModelLoginTel;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            return 'true';
        }

        return 'false';
    }
}
