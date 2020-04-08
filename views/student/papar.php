<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Student */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="student-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            // 'code',
            // 'name',
            // 'population',
            [
                'label' => $model->country->getAttributeLabel('Kod Negara'),
                'value' => $model->country->code,
            ],
            [
                'label' => $model->country->getAttributeLabel('Negara'),
                'value' => $model->country->name,
            ],
            [
                'label' => $model->country->getAttributeLabel('Populasi Negara'),
                'value' => $model->country->population,
            ],
        ],
    ]) ?>

    <div class="form-group">
        <?= Html::a('Back', ['index'], ['class' => 'btn btn-default']) ?>
    </div>

</div>
