<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AreaCobertura */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="area-cobertura-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'bpin')->textInput() ?>

    <?= $form->field($model, 'tipo_servicio')->textInput() ?>

    <?= $form->field($model, 'departamento')->textInput() ?>

    <?= $form->field($model, 'municipio')->textInput() ?>

    <?= $form->field($model, 'localidad')->textInput() ?>

    <?= $form->field($model, 'barrio')->textInput() ?>

    <?= $form->field($model, 'direccion')->textInput() ?>

    <?= $form->field($model, 'longitud')->textInput() ?>

    <?= $form->field($model, 'latitud')->textInput() ?>

    <?= $form->field($model, 'capacidad_instalada')->textInput() ?>

    <?= $form->field($model, 'capacidad_almacenamiento')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
