<?php
$params = array_merge(
    require(__DIR__ . '/../../../common/config/params.php'),
    require(__DIR__ . '/../../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-home',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'home\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-home',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-home', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the home
            'name' => 'advanced-home',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'suffix' => '.html',
            'rules' => [
                '/' => 'site/index',
                '/product/category/<slug:[\w-]+>' => 'product/index',
                '/product/category/<id:\d+>' => 'product/view',
                '/product' => 'product/index',
                '/product/<slug:[\w-]+>' => 'product/view',
                '/product/<id:\d+>' => 'product/view',
                '/page/<slug:[\w-]+>' => 'page/view',
                '/page/<id:\d+>' => 'page/view',
                '/service/<slug:[\w-]+>' => 'service/view',
                '/service/<id:\d+>' => 'service/view',
            ],
        ],
    ],
    'params' => $params,
];
