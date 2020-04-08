<?php
    use yii\bootstrap\Progress;
    use app\components\FirstWidget;
use app\components\FirsWidget;

?>

<?= Progress::widget(['percent' =>25, 'label' => 'Progress baru 25%']) ?>

<?= FirstWidget::widget() ?>

<?php FirstWidget::begin(); ?>
    First Widget in H1
<?php FirstWidget::end(); ?>