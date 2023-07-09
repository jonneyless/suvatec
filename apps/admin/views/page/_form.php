<?php

use ijony\admin\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model admin\models\Page */
/* @var $form ijony\admin\widgets\ActiveForm */
?>

<div class="ibox">
    <div class="ibox-content">

        <?php $form = ActiveForm::begin([
            'layout' => 'horizontal',
        ]); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'summary')->textarea(['rows' => 6]) ?>
        <?= $form->field($model, 'content')->editor() ?>
        <?= $form->field($model, 'keywords')->textarea() ?>
        <?= $form->field($model, 'description')->textarea() ?>

        <div class="form-group">
            <div class="col-sm-6 col-sm-offset-3">
                <?= Html::submitButton('保存', ['class' => 'btn btn-primary']) ?>
                <?= Html::resetButton('重置', ['class' => 'btn btn-white']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
