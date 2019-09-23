<?php

/* @var $this \yii\web\View */
/* @var $content string */

use home\models\Category;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use home\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse',
        ],
    ]);

    $categories = Category::getCatogriesByParentId();
    $menuItems[] = ['label' => 'Home', 'url' => ['/site/index']];

    foreach ($categories as $category) {
        $menuItems[] = ['label' => $category->name, 'url' => ['/category/view', 'slug' => $category->slug], 'active' => isset($this->context->category_id) && $this->context->category_id == $category->id];
    }

    $menuItems[] = ['label' => 'Support', 'url' => ['/page/support']];

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);

    NavBar::end();
    ?>

    <?= $content ?>
</div>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3>ABOUT US</h3>
                Out of many Huntkey product line, Monitor CN under HongKong Si-press Electronics Co.,LTD is aiming to provide all kinds of monitors to our customer such as home monitors, office monitors, gaming monitors and security monitoring.<br>
                We are original OEM/ODM factory for monitors, the factory was founded in 1995 with our own design, R&D and manufacturing team.
            </div>

            <div class="col-lg-1"></div>

            <div class="col-lg-5">
                <h3>CONTACT</h3>
                E-mail: info@monitor-cn.com<br />
                Whatsapp:  + 86 13554941136<br />
                Wechat:  + 86 13554941136<br />
                Phone:  + 86 13554941136<br />
                Address:  A806 Liwan Building Qianhai RD<br />
                Nanshan District of Shenzhen China.  518054
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <p class="pull-left">All Rights Reserved. Copyright &copy; <?= date('Y') ?> suvatec.com</p>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
