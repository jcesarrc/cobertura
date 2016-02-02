<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProyectosComite */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proyectos-comite-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'proyecto')->textInput() ?>

    <?= $form->field($model, 'comite')->textInput() ?>

    <?= $form->field($model, 'fecha_aprobacion')->textInput() ?>

    <?= $form->field($model, 'acta_aprobacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usuario_aprobo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
