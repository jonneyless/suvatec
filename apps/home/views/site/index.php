<?php

/* @var $this yii\web\View */
/* @var $starProducts \home\models\Product[] */

$this->title = 'Suvatec';

use home\models\Page; ?>

<div class="slide-box">

</div>

<div class="about-us box">
    <div class="box-header">
        About Us
    </div>

    <div class="box-body">
        <div class="container">
            <div class="clearfix">
                <div class="left-item">
                    <div class="image"></div>
                </div>

                <div class="right-item">
                    <div class="text">
                        <h3>About Suvatec</h3>
                        <?php $aboutUs = Page::findOne(1); ?>
                        <p><?= $aboutUs->showSummery() ?></p>
                        <a href="<?= $aboutUs->getViewUrl() ?>" class="more">LEARN MORE</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="service box">
    <div class="box-header">
        Sourcing and Supply Chain Management Service
    </div>

    <div class="box-body">
        <div class="container">
            Suvatec team has been in electronic industry since 2008, beginning with PCB manufacturing, assembling, then following the market needs and make the best out of our capability, to electronic turn key projects management.
            With the great advantage of Supply China in China Pearl River Delta(China electronic manufacturing base), we provide professional Sourcing and Supply Chain Management Service. Our experience in the industry, professional skills and great resouces here could be your shortcut to mature technology and product.In the mean time, save your investment and hassle of coordinating among different suppliers.
        </div>
    </div>
</div>

<div class="oem box">
    <div class="box-body">
        <div class="container"></div>
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