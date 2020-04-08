<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Country;

/* @var $this yii\web\View */
/* @var $model app\models\Student */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_pelajar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'umur')->textInput() ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

  

    <?php 
        //use app\models\Country;
        $countries = Country::find()->all();

        //use yii\helpers\ArrayHelper;
        $listData = ArrayHelper::map($countries,'id','name');

        echo $form->field($model, 'id_country')->dropDownList($listData,['prompt'=>'Select...']);
    ?>  

    <?= $form->field($penjaga, 'nama_ibu')->textInput(['maxlength' => true]) ?> 

    <?= $form->field($penjaga, 'nama_bapa')->textInput(['maxlength' => true]) ?> 

    <?= $form->field($penjaga, 'gaji_kasar')->textInput() ?>

    <?php 
        if($action != "create") {
             echo $form->field($penjaga, 'id_pelajar')->textInput(); //tak kluar time create
        }
        elseif ($noname == 'createpenjaga' ) {
            echo 100;
        }
        // print_r($create); 
        // die(); 
    ?>
   

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Back', ['index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

