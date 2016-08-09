<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Need */
/* @var $form yii\widgets\ActiveForm */
$type = ['Money', 'Supplies', 'Food', 'Water', 'Clothing', 'Workers', 'Construction'];
$forWhom = ['Individual', 'Church', 'Business', 'General'];
?>

<div class="need-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'disasterID')->textInput() ?>

    <?= $form->field($model, 'forWhom')->dropDownList($forWhom,['prompt' => 'Select a Type']) ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <?= $form->field($model, 'detailedDescriptionOfNeed')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
