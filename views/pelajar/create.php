<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pelajar */

$this->title = 'Create Pelajar';
$this->params['breadcrumbs'][] = ['label' => 'Pelajars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pelajar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
