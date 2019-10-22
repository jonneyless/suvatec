<?php

/* @var $this yii\web\View */
/* @var $starProducts \home\models\Product[] */

$this->title = 'Suvatec';
?>

<div class="slide-box">

</div>

<div class="overview" style="display: none;">
    <div class="overview-left">

    </div>

    <div class="overview-right">
        <div class="overview-column">
            <div class="overview-column-1"></div>
            <div class="overview-column-2"></div>
        </div>

        <div class="overview-column">
            <div class="overview-column-2"></div>
            <div class="overview-column-1"></div>
        </div>
    </div>
</div>

<div class="box">
    <div class="box-header">
        Star Product
    </div>

    <div class="box-body">
        <div class="container">
            <div class="column-list">
                <?php foreach ($starProducts as $product) { ?>
                <div class="column-flex-1">
                    <a href="<?= $product->getViewUrl() ?>">
                        <img src="<?= $product->getPreview(368, 368, false) ?>"/>
                    </a>
                    <p><?= $product->name ?></p>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<div class="box">
    <div class="box-header">
        New Product
    </div>

    <div class="box-body">
        <div class="new-product">
            <div class="left-item">
                <div class="intro">
                    <h3>Electric<br>bicycle series</h3>
                    <p>Use top-grade manufacturing materials<br>While enjoying comfort</p>
                    <a href="javascript:;" class="more">LEARN MORE</a>
                </div>
            </div>

            <div class="right-item">

            </div>
        </div>
    </div>
</div>

<div class="box">
    <div class="box-header">
        Our Clients
    </div>

    <div class="box-body">
        <div class="container">
            <div class="our-clients">
                <a href="javascript:;" class="client-item client-item-1"></a>
                <a href="javascript:;" class="client-item client-item-2"></a>
                <a href="javascript:;" class="client-item client-item-3"></a>
                <a href="javascript:;" class="client-item client-item-4"></a>
                <a href="javascript:;" class="client-item client-item-5"></a>
            </div>
        </div>
    </div>
</div>