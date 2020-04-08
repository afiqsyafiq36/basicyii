<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ibubapa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ibubapa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_ibu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_bapa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gaji_kasar')->textInput() ?>

    <?= $form->field($model, 'id_pelajar')->textInput() ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Back', ['index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
