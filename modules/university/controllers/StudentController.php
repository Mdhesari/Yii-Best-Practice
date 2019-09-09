<?php

namespace app\modules\university\controllers;

use yii\web\Controller;

class StudentController extends Controller
{

    public function actionIndex()
    { 
        return $this->render('index');
    }
}
