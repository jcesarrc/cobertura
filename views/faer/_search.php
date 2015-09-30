<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FaerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="faer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'numero') ?>

    <?= $form->field($model, 'nit_presento') ?>

    <?= $form->field($model, 'valor_total') ?>

    <?= $form->field($model, 'solicitud_faer') ?>

    <?= $form->field($model, 'usuarios_ampliacion') ?>

    <?php // echo $form->field($model, 'valor_usuario') ?>

    <?php // echo $form->field($model, 'radicado') ?>

    <?php // echo $form->field($model, 'cup') ?>

    <?php // echo $form->field($model, 'cob') ?>

    <?php // echo $form->field($model, 'nbi') ?>

    <?php // echo $form->field($model, 'un') ?>

    <?php // echo $form->field($model, 'oep') ?>

    <?php // echo $form->field($model, 'faer_no') ?>

    <?php // echo $form->field($model, 'proyecto') ?>

    <?php // echo $form->field($model, 'nit_ejecuto') ?>

    <?php // echo $form->field($model, 'departamento') ?>

    <?php // echo $form->field($model, 'municipio') ?>

    <?php // echo $form->field($model, 'latitud') ?>

    <?php // echo $form->field($model, 'longitud') ?>

    <?php // echo $form->field($model, 'fecha_presentacion') ?>

    <?php // echo $form->field($model, 'fecha_aprobacion') ?>

    <?php // echo $form->field($model, 'fecha_ajuste') ?>

    <?php // echo $form->field($model, 'usuarios_mejoramiento') ?>

    <?php // echo $form->field($model, 'cofinanciacion') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
