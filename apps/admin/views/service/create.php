<?php

/* @var $this yii\web\View */
/* @var $model admin\models\Service */

$this->title = '添加服务';
$this->params['breadcrumbs'][] = ['label' => '服务管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['buttons'] = [
    ['label' => '管理', 'url' => ['index'], 'options' => ['class' => 'btn btn-info']],
];
?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>