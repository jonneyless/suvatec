<?php
namespace home\controllers;

use home\models\Product;
use Yii;
use yii\helpers\Html;
use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $starProducts = Product::getStarProducts();

        return $this->render('index', [
            'starProducts' => $starProducts,
        ]);
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $name = Yii::$app->request->post('name');
        $email = Yii::$app->request->post('email');
        $message = Yii::$app->request->post('message');

        if (!$name) {
            echo 'Type you name, please!';
            die();
        }

        if (!$email) {
            echo 'Type you email, please!';
            die();
        }

        if (!preg_match('/([^@]*)@([^@]*)\.([^@]*)/', $email)) {
            echo 'Type you email, please!';
            die();
        }

        if (!$message) {
            echo 'Type you message, please!';
            die();
        }

        if (strlen($message) < 20) {
            echo 'The message too short!';
            die();
        }

        $cacheKey = md5($email);
        if ($data = Yii::$app->cache->get($cacheKey)) {
            if ($data == $message) {
                echo 'Don\'t click too more!';
                die();
            }
        }

        Yii::$app->cache->set($cacheKey, $message, 1800);

        Yii::$app->mailer->compose(['html' => 'message-html', 'text' => 'message-text'], [
            'name' => $name,
            'message' => $message,
        ])->setFrom($email)
            ->setTo('info@suvatec.com')
            ->setSubject('One Message for Bussiness')
            ->send();

        echo 'Thanks!';
        die();
    }
}
