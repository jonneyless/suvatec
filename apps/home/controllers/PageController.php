<?php

namespace home\controllers;

use home\models\Page;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Page controller
 */
class PageController extends Controller
{

    /**
     * @param $slug
     *
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionView($slug)
    {
        $model = Page::getOneBySlug($slug);

        if (!$model) {
            throw new NotFoundHttpException('页面不存在！');
        }

        return $this->render('view', [
            'model' => $model,
        ]);
    }
}
