<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ibubapa */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ibubapas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ibubapa-view">

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
            'nama_ibu',
            'nama_bapa',
            'gaji_kasar',
            [
                'label' => $model->pelajar->getAttributeLabel('Nama Anak'),
                'value' => $model->pelajar->nama_pelajar,
            ],
        ],
    ]) ?>
<?= Html::a('Back', ['index'], ['class' => 'btn btn-default']) ?>
</div>
