<?php 
    /* @var $this \yii\web\View */
    /* @var $content string */

    //call atau define atau import yii function
    use yii\helpers\Html;
    use yii\bootstrap\Nav;
    use yii\bootstrap\NavBar;
    use app\assets\AppAsset;
    

    AppAsset::register($this); //register this page as layout
?>

<?php $this->beginPage() ?> <!-- start page -->

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>"> <!-- guna Yii language setting -->
<head>
    <meta charset="<?= Yii::$app->charset ?>"> <!-- guna Yii punya charset -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= Html::csrfMetaTags() ?> <!-- guna yii Html csrfMetaTags -->
    <title><?= Html::encode($this->title) ?></title> <!-- encode title -->
    <?php $this->head() ?> <!-- bagitau yii disini head -->
</head>
<body>
    <?php $this->beginBody() ?>

        <div class="wrap">
        <?php
        NavBar::begin([
            'brandLabel' => Html::encode($this->title),
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]);

        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                ['label' => 'Home', 'url' => ['/name/index']],
            ],
        ]);

        NavBar::end();
        ?>
            <div class="container">
                <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; MCS Corporation <?= date('d/m/yy') ?></p>
                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>