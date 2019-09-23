<?php

use admin\assets\PageAsset;
use yii\jui\JuiAsset;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use ijony\admin\widgets\ActiveField;

/* @var $this yii\web\View */
/* @var $model admin\models\Product */
/* @var $form yii\bootstrap\ActiveForm */

PageAsset::register($this)->init([
    'js' => [
        'js/laytpl/laytpl.js',
        'js/jquery.uploadifive.js',
    ],
]);

JuiAsset::register($this);
?>

<?php $form = ActiveForm::begin([
    'fieldClass' => ActiveField::className(),
    'layout' => 'horizontal',
    'options' => [
        'enctype' => 'multipart/form-data',
        'class' => 'tabs-container',
    ],
    'fieldConfig' => [
        'inline' => true,
        'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
        'horizontalCssClasses' => [
            'label' => 'col-sm-2',
            'offset' => 'col-sm-offset-2',
            'wrapper' => 'col-sm-10',
            'error' => '',
            'hint' => '',
        ],
    ],
]); ?>

    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#tab-base">基本</a></li>
        <li class=""><a data-toggle="tab" href="#tab-gallery">组图</a></li>
    </ul>

    <div class="tab-content">
        <div id="tab-base" class="tab-pane active">
            <div class="panel-body">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'category_id')->select(['class' => 'admin\\models\\Category']) ?>
                <?= $form->field($model, 'preview')->image() ?>
                <?= $form->field($model, 'specification')->editor() ?>
                <?= $form->field($model, 'keywords')->textarea() ?>
                <?= $form->field($model, 'description')->textarea() ?>
                <?= $form->field($model, 'status')->radioList($model->getStatusSelectData()) ?>

                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-2">
                        <?= Html::resetButton('重置', ['class' => 'btn btn-white']) ?>
                        <?= Html::submitButton('保存', ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>
            </div>
        </div>

        <div id="tab-gallery" class="tab-pane">
            <div class="panel-body">
                <div class="publish-gallery">
                    <ul id="publish-gallery" class="list-unstyled clearfix">
                        <li class="gallery-item">
                            <input id="upload-gallery" name="file_upload" type="file" multiple="multiple"/>
                        </li>
                    </ul>
                </div>

                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-2">
                        <?= Html::resetButton('重置', ['class' => 'btn btn-white']) ?>
                        <?= Html::submitButton('保存', ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php ActiveForm::end(); ?>