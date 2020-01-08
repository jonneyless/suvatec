<?php
namespace home\controllers;

use home\models\Product;
use Yii;
use yii\web\Controller;
use yii\web\Response;

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
        Yii::$app->response->format = Response::FORMAT_JSON;

        $name = Yii::$app->request->post('name');
        $email = Yii::$app->request->post('email');
        $message = Yii::$app->request->post('message');

        if (!$name) {
            return [
                'error' => 1,
                'msg' => 'Type you name, please!', // 提示输入 Name
            ];
        }

        if (!$email) {
            return [
                'error' => 1,
                'msg' => 'Type you email, please!', // 提示输入 Email
            ];
        }

        if (!preg_match('/([^@]*)@([^@]*)\.([^@]*)/', $email)) {
            return [
                'error' => 1,
                'msg' => 'Type you email, please!', // 提示 Email 错误
            ];
        }

        if (!$message) {
            return [
                'error' => 1,
                'msg' => 'Type you message, please!', // 提示输入 Message
            ];
        }

        if (strlen($message) < 20) {
            return [
                'error' => 1,
                'msg' => 'The message too short!', // 提示 Message 太短
            ];
        }

        $cacheKey = md5($email);
        if ($data = Yii::$app->cache->get($cacheKey)) {
            if ($data == $message) {
                return [
                    'error' => 1,
                    'msg' => 'Don\'t click too more!', // 提示不要重复提交
                ];
            }
        }

        Yii::$app->cache->set($cacheKey, $message, 1800);

        Yii::$app->mailer->compose(['html' => 'message-html', 'text' => 'message-text'], [
            'name' => $name,
            'message' => $message,
        ])->setFrom($email)
            ->setTo('info@suvatec.com')
            ->setCc('Suva.xie@suvatec.com')
            ->setSubject('One Message for Bussiness')
            ->send();

        return [
            'error' => 0,
            'msg' => 'Thanks!', // 提示提交成功
        ];
    }
}
