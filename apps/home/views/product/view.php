<?php

/* @var $this yii\web\View */
/* @var $model \home\models\Product */

$this->title = $model->name;
?>

<div class="container">
    <div class="product-detail">
        <div class="row">
            <div class="col-lg-7">
                <div class="preview">
                    <a href="<?= $model->getViewUrl() ?>">
                        <img src="<?= $model->getPreview() ?>"/>
                    </a>
                </div>
            </div>

            <div class="col-lg-5">
                <h3><?= $model->name ?></h3>
                <div class="specification"><?= $model->specification ?></div>
            </div>
        </div>

        <div class="row">
            <?= $model->intro ?>
        </div>
    </div>
</div>
