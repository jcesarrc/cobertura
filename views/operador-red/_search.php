<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OperadorRedSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="operador-red-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_sui') ?>

    <?= $form->field($model, 'nit') ?>

    <?= $form->field($model, 'razon_social') ?>

    <?= $form->field($model, 'represetante_legal') ?>

    <?= $form->field($model, 'revisor_fiscal') ?>

    <?php // echo $form->field($model, 'contador') ?>

    <?php // echo $form->field($model, 'direccion') ?>

    <?php // echo $form->field($model, 'telefono') ?>

    <?php // echo $form->field($model, 'celular') ?>

    <?php // echo $form->field($model, 'correo') ?>

    <?php // echo $form->field($model, 'direccion_web') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
