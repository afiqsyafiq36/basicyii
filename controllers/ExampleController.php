<?php
    namespace app\controllers;

    //module
    use Yii;
    use yii\web\Controller;
    use app\models\UserForm;

    //class
    class ExampleController extends Controller 
    {
        public $defaultAction = "hello-world"; //nama action jadikan default

        public function actionIndex() {

            $message = "index action di sini dalam Controller Example";

            return $this->render('papar', ['message' => $message]);
        }

        public function actionHelloWorld() {
            return 'Hello dunia';
        }

        public function actionTestParams($first, $second) {
            return "$first $second";
        }

        //test untuk UserForm
        public function actionUserForm()
        {
            $model = new UserForm();

            if ($model->load(Yii::$app->request->post()) ) 
            {
                //code here
                $model->validate();
                Yii::$app->session->setFlash('success', 'You have entered the data correctly');
            } 
            return $this->render('_userform', ['model' => $model]);
            
        }
    }
?>