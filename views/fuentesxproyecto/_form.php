<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Fuentesxproyecto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fuentesxproyecto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'bpin')->textInput() ?>

    <?= $form->field($model, 'id_fuente')->textInput() ?>

    <?= $form->field($model, 'valor')->textInput() ?>

    <?= $form->field($model, 'anio')->textInput() ?>

    <?= $form->field($model, 'observacion')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
