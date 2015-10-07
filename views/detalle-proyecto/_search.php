<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DetalleProyectoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detalle-proyecto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_departamento') ?>

    <?= $form->field($model, 'id_municipio') ?>

    <?= $form->field($model, 'descripcion_veredas') ?>

    <?= $form->field($model, 'latitud') ?>

    <?php // echo $form->field($model, 'longitud') ?>

    <?php // echo $form->field($model, 'total') ?>

    <?php // echo $form->field($model, 'aporte_fondo') ?>

    <?php // echo $form->field($model, 'cofinanciacion') ?>

    <?php // echo $form->field($model, 'usuarios_nuevos') ?>

    <?php // echo $form->field($model, 'usuarios_existentes') ?>

    <?php // echo $form->field($model, 'numero') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
