<?php

namespace home\controllers;

use home\models\Category;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Category controller
 */
class CategoryController extends Controller
{

    public $category_id;

    /**
     * @return string
     */
    public function actionView($slug)
    {
        $model = Category::getCategoryBySlug($slug);

        if (!$model) {
            throw new NotFoundHttpException('分类不存在！');
        }

        $this->category_id = $model->id;

        return $this->render('view', [
            'model' => $model,
        ]);
    }
}
