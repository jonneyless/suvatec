<?php

/* @var $this yii\web\View */
/* @var $model \home\models\Category */

$this->title = $model->name . "- HONGKONG SI-PRESS ELECTRONICS CO.,LIMITED";
?>

<div class="container">
    <div class="product-list">
        <ul>
            <?php foreach ($model->product as $product) { ?>
                <li>
                    <a href="<?= $product->getViewUrl() ?>" class="preview"><img src="<?= $product->getPreview(256, 256, false) ?>"/></a>
                    <h3><?= $product->name ?></h3>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>