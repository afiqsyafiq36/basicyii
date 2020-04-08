<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IbubapaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Penjaga';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ibubapa-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Masukkan rekod Penjaga', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Rekod Pelajar', ['student/index'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nama_ibu',
            'nama_bapa',
            'gaji_kasar',
            // 'id_pelajar',
            [
                    'label' => 'Nama Anak',
                    'attribute' => 'nama_p', //atribut baru yg dipaparkan
                    'value' => function ($model) {
                        return $model->pelajar->nama_pelajar;
                    },
            ],
           

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
