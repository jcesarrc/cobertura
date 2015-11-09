<?php

use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Participantes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="participantes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'documento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipo_documento')->widget(Select2::classname(), [
        'data' => ArrayHelper::map([
            ['id'=>1, 'nombre'=>'CC'],
            ['id'=>2, 'nombre'=>'CE'],

        ], 'id', 'nombre'),
        'options' => ['placeholder' => 'Seleccione una opción'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'nombres')->textInput() ?>

    <?= $form->field($model, 'apellidos')->textInput() ?>

    <?= $form->field($model, 'nombre_entidad')->textInput() ?>

    <?= $form->field($model, 'nit_entidad')->textInput() ?>

    <?= $form->field($model, 'cargo')->textInput() ?>

    <?= $form->field($model, 'telefono')->textInput() ?>

    <?= $form->field($model, 'correo')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
