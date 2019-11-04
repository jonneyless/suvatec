<?php

namespace home\assets;

use yii\web\AssetBundle;

/**
 * Main home application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://cdn.bootcss.com/font-awesome/5.11.2/css/brands.min.css',
        'css/site.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
