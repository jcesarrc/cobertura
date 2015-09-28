<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AreaCoberturaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="area-cobertura-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'bpin') ?>

    <?= $form->field($model, 'tipo_servicio') ?>

    <?= $form->field($model, 'departamento') ?>

    <?= $form->field($model, 'municipio') ?>

    <?= $form->field($model, 'localidad') ?>

    <?php // echo $form->field($model, 'barrio') ?>

    <?php // echo $form->field($model, 'direccion') ?>

    <?php // echo $form->field($model, 'longitud') ?>

    <?php // echo $form->field($model, 'latitud') ?>

    <?php // echo $form->field($model, 'capacidad_instalada') ?>

    <?php // echo $form->field($model, 'capacidad_almacenamiento') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
