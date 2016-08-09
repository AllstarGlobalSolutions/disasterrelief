<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Address */
/* @var $form yii\widgets\ActiveForm */
$type = ['Home','Work'];
$countries = ['USA','China','Canada','Japan']; 
?>

<div class="address-form">

    <?php $form = ActiveForm::begin(
         [
                'options' => [
                    'id' => 'create-address-form'
                ]
    ]
    ); ?>

    <?= $form->field($model, 'type')->dropDownList($type,['prompt' => 'Select a Type']) ?>

    <?= $form->field($model, 'street1')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'street2')->textInput(['maxlength' => true]) ?>
   
    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stateOrProvince')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zipcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country')->dropDownList($countries,['prompt' => 'Select a Country']) ?>

    <?//= $form->field($model, 'organizationId')->textInput() ?>

    <?//= $form->field($model, 'personId')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
