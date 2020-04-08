<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;
use app\models\LoginForm;
use app\models\ContactForm;

//kena panggil page model untukguna dkt function actionEntry() untuk declare as $model
use app\models\EntryForm;
use yii\base\View;

class SiteController extends Controller
{
    // public $layout = "newlayout"; //bagitau kita guna layout yg baru kita buat
    /**
     * {@inheritdoc}
     */
    //test
    public function actionSay($message = 'Hello'){

        return $this->render('say'/*nama php file*/,['message' => $message]);
    }
    //test
    public function actionSpeak($message = 'default message')
    {
        return $this->render('speak',['message' => $message]);
    }

    public function actionDefault() {
        echo 'We are offline';
    }

    //entryform function test
    public function actionEntry()
    {
        $model = new EntryForm();

        if ($model->load(yii::$app->request->post()) && $model->validate()) {
            //valid data received in $model
            //do something meaningful here about $model

            return $this->render('entry-confirm', ['model' => $model]);   

        } else {

            //either the page is initially displayed or there is some validation error
            return $this->render('entry', ['model' => $model]);
        } 
    }

    //tamat entryform test

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
        //Hantar user url homeurl
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
        $model->scenario = ContactForm::SCENARIO_EMAIL_FROM_USER; 
        //code user ni mmenunjukkan data nama yg sedia ada semasa login tidak lagi require dlm form
        // $model->scenario = ContactForm::SCENARIO_EMAIL_FROM_GUEST;

        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionShowContactModel() {

        //create object of contact form
        $mContactForm = new \app\models\ContactForm();

        //set attribute
        $mContactForm->name = "contactForm";
        $mContactForm->email = "afiq@gmail.com";
        $mContactForm->subject = "Subject";
        $mContactForm->body = "body";

        //display model on screen
        // var_dump($mContactForm->attributes);
        return \yii\helpers\Json::encode($mContactForm);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        // \Yii::$app->view->on(View::EVENT_BEGIN_PAGE, function() {
        //     echo date('m.d.Y H:i:s'); //papar tarikh
        // });
        return $this->render('about');

        // $email = 'afiqsyaf26@gmail.com';
        // $phone = '0109897898';

        // return $this->render('about', [
        //     'emails' => $email,
        //     'phones' => $phone,
        // ]); // send a field of data to render view about
    }

    //test widget
    public function actionTestWidget()
    {
        return $this->render('testwidget');
    }

    //post request
    public function actionTestGet() {

        // var_dump(Yii::$app->request->get()); //request using method get()
        // var_dump(Yii::$app->request->headers); //HTTP header information
        var_dump(Yii::$app->request->userHost);
        var_dump(Yii::$app->request->userIP);

       /* $req = Yii::$app->request;
        
        if ($req->isAjax) {
            echo "request by Ajax";
        } 

        if ($req->isGet) {
            echo "request by Get";
        }

        if ($req->isPost) {
            echo "request by Post";
        }

        if ($req->isPut) {
            echo "request by Put";
        }
        

        //url without host
        var_dump(Yii::$app->request->url); echo "<br />";

        //whole url include host path
        var_dump(Yii::$app->request->absoluteUrl); echo "<br />";

        //host of url
        var_dump(Yii::$app->request->hostInfo); echo "<br />";

        //the part after entry script and before the question mark
        var_dump(Yii::$app->request->pathInfo);echo "<br />";

        //part after question mark
        var_dump(Yii::$app->request->queryString);echo "<br />";

        //part after host and before entry script
        var_dump(Yii::$app->request->baseUrl);echo "<br />";

        //url without path info and query string
        var_dump(Yii::$app->request->scriptUrl);echo "<br />";

        //url hostname in url
        var_dump(Yii::$app->request->serverName);echo "<br />";

        //port that used by web server
        var_dump(Yii::$app->request->serverPort);echo "<br />";
        */
    }

    public function actionTestResponse () {

        //show response for status pages
        // Yii::$app->response->statusCode = 429;
        // throw new \yii\web\GoneHttpException;

        /*
        Yii::$app->response->headers->add('Pragma', 'no-cache'); //send HTTP headers property of the response component

        //show data using JSON format
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return [
            'id' => '1',
            'name' => 'sadur',
            'age' => 24,
            'city' => 'melaka',
            'country' => 'malaysia',
        ];
        */

        return \Yii::$app->response->sendFile('favicon.ico');

    }

    // public function actionTempat()
    // {
    //     # code...
    //     Yii::$app->mycomponent->welcome();

    // }
}
