<?php

namespace app\controllers;

use app\models\Country;
use app\models\Ibubapa;
use Yii;
use app\models\Pelajar;
use app\models\PelajarSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StudentController implements the CRUD actions for Student model.
 */
class StudentController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    

    /**
     * Lists all Student models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PelajarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);  //cari function search dlm model PelajarSearch()
                                                            //queryParams GET parameter value dlm function search
        return $this->render('index', [   //render return views bersama parameter searchModel dan dataProvider
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Student model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
           return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
    }

    // public function actionViewCountry($id)
    // {
    //     return $this->render('papar', [
    //         'model' => $this->findModel($id),
    //     ]);
    // }
    

    /**
     * Creates a new Student model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pelajar();
        $penjaga = new Ibubapa();
        $action = "create";   //hantar nilai ke create untuk asingkan page edit dan create new

        if ($model->load(Yii::$app->request->post()) && $penjaga->load(Yii::$app->request->post())) {
            // echo "<pre>";
            // print_r($penjaga);
            // echo "</pre>";
            // echo "<pre>";
            // print_r($model);
            // echo "</pre>";
            // die();
            $model->save();
            $penjaga->save();

            return $this->redirect(['view', 'id' => $model->id,]);
        }

        return $this->render('create', [
            'action' => $action,
            'model' => $model,
            'penjaga' => $penjaga,
        ]);
        
    }
   

    /**
     * Updates an existing Student model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id); 
        $penjaga = $this->findPenjaga($id); 
        //$this adalah sekarang dlm controller ini
        //findModel() adalah function dlm controller mencari findModel() bersama $id

        if ($model->load(Yii::$app->request->post()) && $penjaga->load(Yii::$app->request->post())) {

            // $model->status = 1;
            // echo "<pre>";
            // print_r($penjaga);
            // echo "</pre>";
            $model->save();
            $penjaga->save();
            // echo "<pre>";
            // print_r($penjaga);
            // echo "</pre>";
            return $this->redirect(['view', 'id' => $model->id]);
        } 

        if ($penjaga == 0) {
            // echo "<pre>";
            // print_r($penjaga);
            // echo "</pre>";
            $this->redirect(['ibubapa/create', 'penjaga' => $penjaga, 'model' => $model]);   //guna ni untuk papar create ibubapa sekiranya data mereka null
        } else {

            return $this->render('update', [
                'model' => $model,
                'penjaga' => $penjaga,
            ]);
        }

        
    }

    /**
     * Deletes an existing Student model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        //$this adalah sekarang dlm controller ini
        //findModel() adalah function dlm controller mencari findModel() bersama $id
        // $a=Yii::$app->request->post();
        // echo '<pre>';
        // print_r($_POST);
        // echo '</pre>';

        // if ($model->load(Yii::$app->request->post())) {   /* load request apa yg di post*/

            $model->status = 1;   //set value field status = 1 
            $model->save();   //pastu save kan
            
            return $this->redirect(['index']);
        // }
        // return $this->render('',['model' => $model]);
      
    }

    /**
     * Finds the Student model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Student the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) //dkt sini findModel() yg dicari
    {
        if (($model = Pelajar::findOne($id)) !== null) { //cari tble Pelajar::findOne(id), jika x null returnkan model
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findPenjaga($id) //dkt sini findModel() yg dicari
    {
        $query = Ibubapa::find()->where(['id_pelajar'=>$id])->one();

        if ($query !== null) { //cari tble Pelajar::findOne(id), jika not null returnkan model
            return $query;
        } 
        if ($query == null) {
            return $query = 0;   //hntr nilai ni ke update untuk bgitau condition
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
