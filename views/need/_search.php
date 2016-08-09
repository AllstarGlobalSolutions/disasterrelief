<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NeedSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="need-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'disasterID') ?>

    <?= $form->field($model, 'typeId') ?>

    <?= $form->field($model, 'forWhom') ?>

    <?= $form->field($model, 'amount') ?>

    <?php // echo $form->field($model, 'detailedDescriptionOfNeed') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
