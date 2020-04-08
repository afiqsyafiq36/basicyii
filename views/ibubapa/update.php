<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ibubapa */

$this->title = 'Update Ibubapa: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ibubapas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ibubapa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
