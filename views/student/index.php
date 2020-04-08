<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StudentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Students';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Daftar Pelajar', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('View Country', ['country/index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Daftar Penjaga', ['ibubapa/index'], ['class' => 'btn btn-primary']) ?>
    </p>
    <p>
        <!-- <?= Html::a('<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>', ['country/index'], ['class' => 'btn btn-primary']) ?> -->
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
       <center>
            <?php echo Html::img('@web/images/logo.png') ?>
            <?php echo Html::img('@web/videos/PMT.mp4') ?>
        </center>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'nama_pelajar',
            'umur',
            'alamat',
            // 'country.name',
            [
                'label' => 'Warganegara',
                'attribute' => 'negara',
                // 'value' => 'country.name',
                'value' => function ($model) {

                   return $model->country->name;
                },
            ],
            // [
            //     'label' => 'Populasi',
            //     'attribute' => 'popu', //atribut baru yg dipaparkan
            //     'value' => function ($model) {
            //         return $model->country->population;
            //     },
            // ],
            // [
            //     'label' => 'Kod Negara',
            //     'attribute' => 'kod', //atribut baru yg dipaparkan
            //     'value' => function ($model) {
            //         return $model->country->code;
            //     },
            // ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
