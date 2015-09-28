<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProyectoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proyecto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'bpin') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?= $form->field($model, 'departamento') ?>

    <?= $form->field($model, 'municipio') ?>

    <?php // echo $form->field($model, 'tipo_proyecto') ?>

    <?php // echo $form->field($model, 'corregimiento') ?>

    <?php // echo $form->field($model, 'localidad') ?>

    <?php // echo $form->field($model, 'direccion') ?>

    <?php // echo $form->field($model, 'longitud') ?>

    <?php // echo $form->field($model, 'latitud') ?>

    <?php // echo $form->field($model, 'costo_usuario') ?>

    <?php // echo $form->field($model, 'valor') ?>

    <?php // echo $form->field($model, 'operador_red') ?>

    <?php // echo $form->field($model, 'fecha_asignacion') ?>

    <?php // echo $form->field($model, 'fecha_finalizacion') ?>

    <?php // echo $form->field($model, 'cantidad_usuarios') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
