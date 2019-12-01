<?php

/* @var $this yii\web\View */
/* @var $data \home\models\Product[] */

$this->title = $model ? $model->name : 'Product';

use home\models\Category;
use yii\widgets\LinkPager; ?>

<div class="container clearfix">
    <div class="sidebar">
        <h1>Product</h1>

        <div class="siderbar-nav">
            <ul class="list-unstyled">
                <li>&nbsp;</li>
                <?php $navs = Category::getNavs() ?>
                <li>
                    <a class="nav-item" href="<?= \yii\helpers\Url::to(['product/index']) ?>">全部<span class="iconfont icon-minus"></span></a>
                    <ul class="list-unstyled">
                        <?php foreach ($navs as $nav) { ?>
                            <li class="<?= $nav['active'] ?>"><a href="<?= $nav['url'] ?>"><?= $nav['name'] ?></a></li>
                        <?php } ?>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <div class="product-list">
        <ul>
            <?php foreach ($data as $datum) { ?>
                <li>
                    <a href="<?= $datum->getViewUrl() ?>" class="preview"><img src="<?= $datum->getPreview(256, 256, false) ?>"/></a>
                    <h3><?= $datum->name ?></h3>
                </li>
            <?php } ?>
        </ul>
    </div>

    <div class="pager">
        <?= LinkPager::widget(['pagination' => $pager]) ?>
    </div>
</div>