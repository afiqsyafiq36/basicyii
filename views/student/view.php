<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Student */

// $this->title = $model->id;
$this->title = 'Maklumat Pelajar';
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
            'id',
            'nama_pelajar',
            'umur',
            'alamat',
            'country.name',
            [
                'label' => 'Kewarganegaraan', //yg ni override
                'attribute' => 'country.name',
            ],
        ],
    ]) ?>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            'ibubapa.nama_bapa',
            'ibubapa.nama_ibu',
            'ibubapa.gaji_kasar',
            
        ],
    ]) ?>

    <div class="form-group">
        <?= Html::a('Back', ['index'], ['class' => 'btn btn-default']) ?>
    </div>

</div>
