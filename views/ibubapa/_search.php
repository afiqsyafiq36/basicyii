<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IbubapaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ibubapa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nama_ibu') ?>

    <?= $form->field($model, 'nama_bapa') ?>

    <?= $form->field($model, 'gaji_kasar') ?>

    <?= $form->field($model, 'id_pelajar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
