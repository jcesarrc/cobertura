<?php

use kartik\datecontrol\DateControl;
use kartik\widgets\DepDrop;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Comite */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comite-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(\app\models\Categoria::find()->all(), 'id', 'nombre'),
        'options' => ['placeholder' => 'Seleccione una opción'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'subtipo')->widget(DepDrop::classname(), [
        'type' => DepDrop::TYPE_SELECT2,
        'pluginOptions'=>[
            'depends' => ['comite-tipo'],
            'loadingText' => 'Cargando...',
            'placeholder' => 'Seleccione una opción',
            'url' => Url::to(['comite/subcategorias'])
        ]
    ]) ?>

    <?= $form->field($model, 'convocatoria')->widget(DepDrop::classname(), [
        'type' => DepDrop::TYPE_SELECT2,
        'pluginOptions'=>[
            'depends' => ['comite-tipo','comite-subtipo'],
            'loadingText' => 'Cargando...',
            'placeholder' => 'Seleccione una opción',
            'url' => Url::to(['comite/convocatorias'])
        ]
    ]) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput() ?>

    <?= $form->field($model, 'fecha_inicio')->widget(DateControl::classname(), [
        'type' => DateControl::FORMAT_DATE,
    ])  ?>

    <?= $form->field($model, 'fecha_fin')->widget(DateControl::classname(), [
        'type' => DateControl::FORMAT_DATE,
    ])  ?>

    <?= $form->field($model, 'observaciones')->textarea(['rows' => 6]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
