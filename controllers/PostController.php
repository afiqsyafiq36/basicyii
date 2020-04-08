<?php

namespace app\controllers;

use Yii;
use app\models\Post;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
// use app\models\LoginForm;

class PostController extends Controller {

	//specify forward controller as a default action
	public $defaultAction = 'forward';

	//point ke view index
	public function actionIndex()
	{
	
		return $this->render('index');
	}

	//function forward redirect user browser ke new url
	public function actionForward()
	{
		return $this->redirect('https://www.google.com');
	}

	// public function actionAtribut() 
	// {
	// 	$model = new LoginForm();

	// 	$model->name = 'syafiq';

	// 	return $this->render('index', ['model' => $model, ]);
	// }

	public function actionView($id)
	{
		$model = Post::findOne($id);

		if ($model === null) {
			throw new NotFoundHttpException;
		}

		return $this->render('view', ['model' => $model, ]);

	}

	public function actionCreate()
	{

		$model = new Post;

		if ($model->load(Yii::$app->request->post()) && $model->save()) 
		{
			return $this->redirect(['view', 'id' => $model->id]);
		} else {

			return $this->render('create', ['model' => $model ]);
		}

	}
}