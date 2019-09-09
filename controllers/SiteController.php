<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\EntryForm;
use app\models\Request;

class SiteController extends Controller
{

    public $defaultAction = 'index';
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'myAction' => [
                'class' => 'app\components\myAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionSay($welcome = "")
    {
        return $this->render('say', compact('welcome'));
    }

    public function actionOffline()
    {
        return $this->render('offline');
    }

    public function actionEntry()
    {

        $model = new EntryForm;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // post request
            return $this->render('entry-confirm', compact('model'));
        } else {
            // get request
            return $this->render('entry', compact('model'));
        }
    }

    public function actionRequest()
    {

        $req = new Request;
        $req->scenario = Request::SCENARIO_CREATE;
        $req->mobile = "09111103145";
        $req->code = "1241";
        $req->datetime = date('Y-m-d H:i:s');
        $req->state = 0;
        if ($req->save()) {
            return 'yes';
        }
        return 'false';
    }

    public function actionFindreq()
    {

        $obj = Request::find()->where(['code' => '1241'])->asArray()->one();
        return $obj['code'];
    }
}
