<?php

namespace home\controllers;

use home\models\Service;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Service controller
 */
class ServiceController extends Controller
{

    /**
     * @param $slug
     *
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionView($slug)
    {
        $model = Service::getOneBySlug($slug);

        if (!$model) {
            throw new NotFoundHttpException('页面不存在！');
        }

        return $this->render('view', [
            'model' => $model,
        ]);
    }
}
