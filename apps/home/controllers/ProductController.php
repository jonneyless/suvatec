<?php

namespace home\controllers;

use home\models\Category;
use home\models\Product;
use home\models\search\Product as ProductSearch;
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
     * @return string
     */
    public function actionIndex($slug = '')
    {
        $model = null;
        if ($slug) {
            $model = Category::getOneBySlug($slug);
        }

        $searchModel = new ProductSearch();
        $searchModel->category_slug = $slug;
        $dataProvider = $searchModel->search();

        $data = $dataProvider->getModels();
        $pager = $dataProvider->getPagination();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'data' => $data,
            'pager' => $pager,
            'model' => $model,
        ]);
    }

    /**
     * @param $slug
     *
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionView($slug)
    {
        $model = Product::getOneBySlug($slug);

        if (!$model) {
            throw new NotFoundHttpException('产品不存在！');
        }

        $this->category_id = $model->category_id;

        return $this->render('view', [
            'model' => $model,
        ]);
    }
}
