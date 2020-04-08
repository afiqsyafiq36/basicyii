<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\Session;
?>

<?php

	$session = Yii::$app->session;

	if ($session->isActive) {

		$session['user'] = [
			'id' => 1,
			'username' => 'yiiuser',
		];
		
	} else {
		$session->open();
	}

	//flash session
	if(Yii::$app->session->hasFlash('success')) {
		echo Yii::$app->session->getFlash('success');
	}
?>

<?php $form = ActiveForm::begin(); ?>

<?php $user_id = $session->get('user_id'); ?>

<?= $form->field($model, 'name') ?>
<?= $form->field($model, 'email') ?>

<!-- <?php //echo $form->field($model, 'tarikh') ;

	// $this->widget('zii.widgets.jui.CJuiDatePicker',
	// 	array(
	// 		'attribute' => 'tarikh',
	// 		'name' => 'tarikh',
	// 		'value' => $model->tarikh,
	// 		'model' => $model,
	// 		'options' => array(
	// 			'shownAnim' => 'slide',
	// 			'showButtonPanel' => true,
	// 			'dateFormat' => 'yy-m-d'
	// 		),
	// 		'htmlOptions' => array('style' => ''),
	// 	));
?> -->

<? //yii\jui\DatePicker::widget(['name' => 'attributeName']) ?>

<? //yii\jui\DatePicker::widget(['name' => 'attributeName', 'clientOptions' => ['defaultDate' => '2014-01-01']]) ?>

<? //$form->field($model,'attributeName')->widget(DatePicker::className(),['clientOptions' => ['defaultDate' => '2014-01-01']]) ?> 

<?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>

<?php $form = ActiveForm::end(); ?>