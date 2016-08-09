<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Person */
/* @var $form yii\widgets\ActiveForm */
$type = ['Donor'];
?>

<div class="person-form">

    <?php $form = ActiveForm::begin(
        [
                'options' => [
                    'id' => 'create-phone-form'
                ]
        ]); ?>

    <?= $form->field($model, 'firstName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'position')->dropDownList($type,['prompt' => 'Select a Type']) //not yet update the table?>

    <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'organizationId')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
