<?php

/* @var $this yii\web\View */
/* @var $model \home\models\Product */

$this->title = $model->name;
?>

<div class="container">
    <div class="product-detail">
        <div class="row">
            <div class="col-lg-6">
                <div class="preview">
                    <a href="<?= $model->getViewUrl() ?>">
                        <img src="<?= $model->getPreview() ?>"/>
                    </a>
                </div>

                <div class="preview-list">
                    <a href="javascript:;" data-preview="<?= $model->getPreview() ?>"><img src="<?= $model->getPreview(100, 100) ?>"/></a>
                    <?php foreach ($model->gallery as $gallery) { ?>
                        <a href="javascript:;" data-preview="<?= $gallery->getPreview() ?>"><img src="<?= $gallery->getPreview(100, 100) ?>"/></a>
                    <?php } ?>
                </div>
            </div>

            <div class="col-lg-5 col-lg-offset-1">
                <h3><?= $model->name ?></h3>
                <div class="specification"><?= $model->specification ?></div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#tab-intro">Description</a></li>
                </ul>

                <div class="tab-content">
                    <div id="tab-intro" class="tab-intro active">
                        <div class="panel-body">
                            <?= $model->intro ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
