<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ibubapa */

$this->title = 'Create Ibubapa';
$this->params['breadcrumbs'][] = ['label' => 'Ibubapas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ibubapa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'penjaga' => $penjaga,
        'model' => $model,
    ]) ?>

</div>
