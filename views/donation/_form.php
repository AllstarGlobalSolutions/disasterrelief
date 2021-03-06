<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Donation */
/* @var $form yii\widgets\ActiveForm */
$type = ['Money', 'Supplies', 'Food', 'Water', 'Labor', 'Construction Labor'];
?>

<div class="donation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'needID')->textInput() ?>

    <?= $form->field($model, 'donorID')->textInput() ?>

    <?= $form->field($model, 'type')->dropDownList($type,['prompt' => 'Select a Type']) ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
