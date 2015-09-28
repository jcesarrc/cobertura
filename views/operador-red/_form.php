<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OperadorRed */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="operador-red-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_sui')->textInput() ?>

    <?= $form->field($model, 'nit')->textInput() ?>

    <?= $form->field($model, 'razon_social')->textInput() ?>

    <?= $form->field($model, 'represetante_legal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'revisor_fiscal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contador')->textInput() ?>

    <?= $form->field($model, 'direccion')->textInput() ?>

    <?= $form->field($model, 'telefono')->textInput() ?>

    <?= $form->field($model, 'celular')->textInput() ?>

    <?= $form->field($model, 'correo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direccion_web')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
