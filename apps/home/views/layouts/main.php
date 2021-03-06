<?php

/* @var $this \yii\web\View */
/* @var $content string */

use home\models\Category;
use home\models\Page;
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
    $menuItems[] = ['label' => 'Product', 'url' => ['/product/index']];

    $pageIds = [3, 4, 5, 2];

    foreach ($pageIds as $pageId) {
        $page = Page::findOne($pageId);
        if ($page) {
            $menuItems[] = ['label' => $page->name, 'url' => $page->getViewUrl(true), 'active' => $this->context->id == 'page' && Yii::$app->request->get('slug') == $page->slug];
        }
    }

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
                <h3>CONTACT</h3>
            </div>

            <div class="col-lg-1"></div>

            <div class="col-lg-5">
                <br/>
                <?= $page->showSummery() ?>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <p class="pull-left">All Rights Reserved. Copyright &copy; <?= date('Y') ?> suvatec.com</p>
            <p class="pull-right sns">
                <a href="javascript:;"><i class="fa fa-facebook-square"></i></a>
                <a href="javascript:;"><i class="fa fa-twitter-square"></i></a>
            </p>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-154888332-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());
    gtag('config', 'UA-154888332-1');
</script>
</body>
</html>
<?php $this->endPage() ?>
