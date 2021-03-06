<?php

use kartik\datecontrol\DateControl;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Convocatoria */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="convocatoria-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_inicio')->widget(DateControl::classname(), [
        'type' => DateControl::FORMAT_DATE,
    ]) ?>

    <?= $form->field($model, 'fecha_fin')->widget(DateControl::classname(), [
        'type' => DateControl::FORMAT_DATE,
    ]) ?>

    <?= $form->field($model, 'tipo')->widget(Select2::classname(), [
        'data' => ArrayHelper::map([['id'=>2, 'nombre'=>'FAER'],['id'=>3, 'nombre'=>'FAZNI']], 'id', 'nombre'),
        'options' => ['placeholder' => 'Seleccione una opción'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])  ?>

    <?= $form->field($model, 'activa')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
