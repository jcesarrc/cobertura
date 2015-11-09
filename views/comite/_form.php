<?php

use kartik\datecontrol\DateControl;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Comite */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comite-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fecha_inicio')->widget(DateControl::classname(), [
        'type' => DateControl::FORMAT_DATE,
    ]) ?>

    <?= $form->field($model, 'fecha_fin')->widget(DateControl::classname(), [
        'type' => DateControl::FORMAT_DATE,
    ]) ?>

    <?= $form->field($model, 'descripcion')->textInput() ?>

    <?= $form->field($model, 'tipo')->textInput() ?>

    <?= $form->field($model, 'id_convocatoria')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(\app\models\Convocatoria::find()->all(), 'id', 'nombre'),
        'options' => ['placeholder' => 'Seleccione una opción'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'acta')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
