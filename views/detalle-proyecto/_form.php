<?php

use kartik\money\MaskMoney;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use app\models\Divipola;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\DetalleProyecto */
/* @var $form yii\widgets\ActiveForm */
setlocale(LC_MONETARY, 'es_CO');
?>

<div class="detalle-proyecto-form">

    <?= DetailView::widget([
        'model' => $model_faer,
        'attributes' => [
            'faer_no',
            'radicado',
            'proyecto',
            'nit_presento',
            'nit_ejecuto',
            'fecha_radicacion:date',
            'fecha_aprobacion:date',
            'oep',
        ],
    ]) ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Cobertura</h3>
        </div>
        <div class="panel-body">
            <?php if (count($lista_detalles) > 0): ?>
                <table class="table">
                    <tr>
                        <th>Departamento</th>
                        <th>Municipio</th>
                        <th>Veredas</th>
                        <th>Total</th>
                        <th>Cofinanciamiento</th>
                        <th>Aporte fondo</th>
                        <th>UE</th>
                        <th>UN</th>
                        <th></th>
                    </tr>
                    <?php foreach ($lista_detalles as $item): ?>
                        <tr>
                            <td>
                                <?= Divipola::findOne(['id'=>$item->id_departamento])->nombre ?>
                            </td>
                            <td>
                                <?= Divipola::findOne(['id'=>$item->id_municipio])->nombre ?>
                            </td>
                            <td>
                                <?= $item->descripcion_veredas ?>
                            </td>
                            <td>
                                <?= '$'.money_format('%(#10n',$item->total) ?>
                            </td>
                            <td>
                                <?= '$'.money_format('%(#10n',$item->cofinanciacion) ?>
                            </td>
                            <td>
                                <?= '$'.money_format('%(#10n',$item->aporte_fondo) ?>
                            </td>
                            <td>
                                <?= $item->usuarios_existentes ?>
                            </td>
                            <td>
                                <?= $item->usuarios_nuevos ?>
                            </td>
                            <th>
                                <?= Html::a(' - ', ['delete', 'id' => $item->id], [
                                    'class' => 'btn btn-xs btn-danger',
                                    'data' => [
                                        'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                                        'method' => 'post',
                                    ],
                                ]) ?>
                            </th>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>
        </div>
    </div>


    <?php $form = ActiveForm::begin(); ?>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Registrar cobertura</h3>
        </div>
        <div class="panel-body">
            <div class="row">

                <div class="col-md-3">
                    <?= $form->field($model, 'id_departamento')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(\app\models\Divipola::find()->all(), 'id', 'nombre'),
                        'options' => ['placeholder' => 'Seleccione una opción'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]) ?>

                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'id_municipio')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(\app\models\Divipola::find()->all(), 'id', 'nombre'),
                        'options' => ['placeholder' => 'Seleccione una opción'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'descripcion_veredas')->textarea(['maxlength' => true]) ?>
                </div>
                <div class="col-md-1">
                    <?= $form->field($model, 'latitud')->textInput() ?>
                </div>
                <div class="col-md-1">
                    <?= $form->field($model, 'longitud')->textInput() ?>
                </div>
            </div>

            <div class="row">

                <div class="col-md-2">
                    <?= $form->field($model, 'total')->widget(MaskMoney::classname(), [
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

                <div class="col-md-2">
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
                    ]) ?>

                </div>

                <div class="col-md-2">
                    <?= $form->field($model, 'aporte_fondo')->widget(MaskMoney::classname(), [
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

                <div class="col-md-2">
                    <?= $form->field($model, 'usuarios_existentes')->textInput() ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($model, 'usuarios_nuevos')->textInput() ?>
                </div>

            </div>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Añadir') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success pull-right' : 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
