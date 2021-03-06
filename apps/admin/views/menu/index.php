<?php

use ijony\admin\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '菜单管理';
$this->params['breadcrumbs'][] = $this->title;
$this->params['buttons'] = [
    ['label' => '新增', 'url' => ['create'], 'options' => ['class' => 'btn btn-success']],
    ['label' => '回收站', 'url' => ['recycle'], 'options' => ['class' => 'btn btn-default']],
];
?>

<div class="ibox">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layoutFix' => true,
        'columns' => [
            [
                'attribute' => 'id',
                'header' => '#',
            ],
            [
                'attribute' => 'parent_id',
                'value' => function ($data) {
                    return $data->parent ? $data->parent->name : '';
                },
            ],
            'name',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($data) {
                    return $data->getStatusLabel();
                },
            ],
            'sort',

            [
                'class' => 'ijony\admin\grid\ActionColumn',
                'headerOptions' => [
                    'class' => 'text-right',
                ],
                'template' => '{view} {update} {remove}',
            ],
        ],
    ]); ?>
</div>

