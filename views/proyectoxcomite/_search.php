<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProyectoxcomiteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proyectoxcomite-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'bpin') ?>

    <?= $form->field($model, 'idComite') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'valor_aprobado') ?>

    <?= $form->field($model, 'acta_aprobacion') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
