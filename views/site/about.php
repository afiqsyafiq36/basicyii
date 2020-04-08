<?php

// @var $this yii\web\View

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;



$this->title = 'About'; //page title
$this->params['breadcrumbs'][] = $this->title; //breadcrumbs
$this->registerMetaTag(['name' => 'keyword', 'content' => 'yii, developing, views, meta, tags']);
$this->registerMetaTag(['name' => 'description', 'content' => 'This is description!'], 'description');
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1> 
    <!--encode penting untuk filter data yg dtng (elak XSS attacks) -->

    <p>
        This is the About page. You may modify the following file to customize its content:
    </p>

    

    <p>
        <?= Html::encode("<script> alert('alert!'); </script> <h1>ENCODE EXAMPLE</h1>>") ?>
    </p>

    <p>
        <?= HtmlPurifier::process("<script>alert('alert!');</script> <h1>HtmlPurifier EXAMPLE</h1>") ?>
    </p>

    <?= $this->render('_part1'); ?>
    <?= $this->render('_part2'); ?>

    <p>
        <b>Email :</b> <?= $emails ?>
    </p>
    <p>
        <b>Phone Number : </b> <?= $phones ?>
    </p>
   
</div>
