<?php

/* @var $this yii\web\View */
/* @var $model \home\models\Product */

$this->title = $model->name;
?>

<div class="container">
    <div class="product-top">
        <div class="pull-left">
            <?= $model->name ?>
        </div>

        <div class="pull-right">
            <a href="">overview</a>
            <a href="">specs</a>
        </div>
    </div>
</div>
