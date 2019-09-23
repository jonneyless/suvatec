<?php

namespace home\controllers;

use home\models\Product;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Product controller
 */
class ProductController extends Controller
{

    public $category_id;

    /**
     * @param $slug
     *
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionView($slug)
    {
        $model = Product::getCategoryBySlug($slug);

        if (!$model) {
            throw new NotFoundHttpException('产品不存在！');
        }

        $this->category_id = $model->category_id;

        return $this->render('view', [
            'model' => $model,
        ]);
    }
}
