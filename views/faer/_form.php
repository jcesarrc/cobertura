<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use kartik\datecontrol\DateControl;
use kartik\money\MaskMoney;

/* @var $this yii\web\View */
/* @var $model app\models\Faer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="faer-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-lg-4">
    <?= $form->field($model, 'faer_no')->textInput(['maxlength' => true]) ?>
        </div> <div class="col-lg-8">
    <?= $form->field($model, 'radicado')->textInput() ?>
            </div>
    </div>
    <?= $form->field($model, 'proyecto')->textarea(['maxlength' => true]) ?>
    <div class="row">
        <div class="col-lg-6">
    <?= $form->field($model, 'nit_presento')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(\app\models\OperadorRed::find()->all(), 'nit', 'razon_social'),
        'options' => ['placeholder' => 'Seleccione una opción'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>
        </div>
        <div class="col-lg-6">
    <?= $form->field($model, 'nit_ejecuto')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(\app\models\OperadorRed::find()->all(), 'nit', 'razon_social'),
        'options' => ['placeholder' => 'Seleccione una opción'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>
            </div>
    </div>
    <div class="row">

        <div class="col-lg-4">
    <?= $form->field($model, 'valor_total')->widget(MaskMoney::classname(), [
        'pluginOptions' => [
            'prefix' => '$ ',
            'suffix' => '',
            'thousands' => '.',
            'decimal' => ',',
            'precision' => 0,
            'allowZero' => true,
            'allowNegative' => false
        ]
    ]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'cofinanciacion')->widget(MaskMoney::classname(), [
                'pluginOptions' => [
                    'prefix' => '$ ',
                    'suffix' => '',
                    'thousands' => '.',
                    'decimal' => ',',
                    'precision' => 0,
                    'allowZero' => true,
                    'allowNegative' => false
                ]
            ])  ?>

        </div>
        <div class="col-lg-4">
    <?= $form->field($model, 'solicitud_faer')->widget(MaskMoney::classname(), [
        'pluginOptions' => [
            'prefix' => '$ ',
            'suffix' => '',
            'thousands' => '.',
            'decimal' => ',',
            'precision' => 0,
            'allowZero' => true,
            'allowNegative' => false
        ]
    ]) ?>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'usuarios_ampliacion')->textInput() ?>
        </div>

        <div class="col-lg-4">
            <?= $form->field($model, 'usuarios_mejoramiento')->textInput() ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'valor_usuario')->widget(MaskMoney::classname(), [
                'pluginOptions' => [
                    'prefix' => '$ ',
                    'suffix' => '',
                    'thousands' => '.',
                    'decimal' => ',',
                    'precision' => 0,
                    'allowZero' => true,
                    'allowNegative' => false
                ]
            ]) ?>

        </div>


    </div>




    <div class="row">

        <div class="col-lg-4">
            <?= $form->field($model, 'departamento')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Divipola::find()->all(), 'id', 'nombre'),
                'options' => ['placeholder' => 'Seleccione una opción'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>

        </div><div class="col-lg-4">
            <?= $form->field($model, 'municipio')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Divipola::find()->all(), 'id', 'nombre'),
                'options' => ['placeholder' => 'Seleccione una opción'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>

        </div><div class="col-lg-2">
            <?= $form->field($model, 'latitud')->textInput() ?>

        </div><div class="col-lg-2">

            <?= $form->field($model, 'longitud')->textInput() ?>
        </div>









    </div>

    <div class="row">


        <div class="col-lg-4">
            <?= $form->field($model, 'fecha_presentacion')->widget(DateControl::classname(), [
                'type'=>DateControl::FORMAT_DATE,
            ]) ?>

        </div> <div class="col-lg-4">
            <?= $form->field($model, 'fecha_aprobacion')->widget(DateControl::classname(), [
                'type'=>DateControl::FORMAT_DATE,
            ]) ?>


        </div> <div class="col-lg-4">
            <?= $form->field($model, 'fecha_ajuste')->widget(DateControl::classname(), [
                'type'=>DateControl::FORMAT_DATE,
            ]) ?>


        </div>

    </div>


    <div class="row">
        <div class="col-md-2">

            <?= $form->field($model, 'cup')->textInput() ?>
        </div><div class="col-md-2">
            <?= $form->field($model, 'cob')->textInput() ?>

        </div><div class="col-md-2">
            <?= $form->field($model, 'nbi')->textInput() ?>

        </div><div class="col-md-2">

            <?= $form->field($model, 'un')->textInput() ?>
        </div><div class="col-md-4">
            <?= $form->field($model, 'oep')->textInput() ?>

        </div>


    </div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
