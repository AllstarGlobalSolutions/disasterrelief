<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Phone */
/* @var $form yii\widgets\ActiveForm */
$type = ['Home','Work'];
?>

<div class="phone-form">

    <?php $form = ActiveForm::begin( [
                'options' => [
                    'id' => 'create-phone-form'
                ]
    ]); ?>

    <?= $form->field($model, 'type')->dropDownList($type,['prompt' => 'Select a Type']) ?>
   
    <?= $form->field($model, 'countryCode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'organizationId')->textInput() ?>

    <?//= $form->field($model, 'personId')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
