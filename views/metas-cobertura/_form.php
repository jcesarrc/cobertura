<?php

use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MetasCobertura */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="metas-cobertura-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'categoria')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(\app\models\Categoria::find()->all(), 'id', 'nombre'),
        'options' => ['placeholder' => 'Seleccione una opción'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])  ?>

    <?= $form->field($model, 'ano')->dropDownList([
        2015 => "2015",
        2016 => "2016",
        2017 => "2017",
        2018 => "2018",
        2019 => "2019",
        2020 => "2020",
    ]) ?>

    <?= $form->field($model, 'cobertura')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
