<?php

/* @var $this yii\web\View */
/* @var $model admin\models\Service */

$this->title = '编辑服务：' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '服务管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '编辑';
$this->params['buttons'] = [
    ['label' => '管理', 'url' => ['index'], 'options' => ['class' => 'btn btn-info']],
];
?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>