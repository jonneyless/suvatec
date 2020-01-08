<?php

/* @var $this yii\web\View */
/* @var $model \home\models\page */

$this->title = $model->name . "- HONGKONG SI-PRESS ELECTRONICS CO.,LIMITED";

$this->registerMetaTag(['name' => 'keywords', 'content' => $model->getKeywords()]);
$this->registerMetaTag(['name' => 'description', 'content' => $model->getDescription()]);
?>

<div class="container">
    <div class="page-content">
        <?= $model->content ?>
    </div>
</div>
