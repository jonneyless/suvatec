<?php

namespace admin\controllers;

use admin\models\Service;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;

/**
 * 服务管理类
 *
 * @auth_key    service
 * @auth_name   服务管理
 */
class ServiceController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => $this->getRules('service'),
            ],
        ];
    }

    /**
     * 服务列表
     *
     * @auth_key    *
     * @auth_parent service
     *
     * @return string
     */
    public function actionIndex()
    {
        $query = Service::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * 添加服务
     *
     * @auth_key    service_create
     * @auth_name   添加服务
     * @auth_parent service
     *
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Service();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * 编辑服务
     *
     * @auth_key    service_update
     * @auth_name   编辑服务
     * @auth_parent service
     *
     * @param $id
     *
     * @return string|\yii\web\Response
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * 获取服务对象
     *
     * @param $id
     *
     * @return \admin\models\Service
     * @throws \yii\web\NotFoundHttpException
     */
    protected function findModel($id)
    {
        if (($model = Service::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested service does not exist.');
        }
    }
}
