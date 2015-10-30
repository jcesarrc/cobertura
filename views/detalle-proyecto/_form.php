<?php

use kartik\money\MaskMoney;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use app\models\Divipola;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;
use kartik\widgets\DepDrop;


/* @var $this yii\web\View */
/* @var $model app\models\DetalleProyecto */
/* @var $form yii\widgets\ActiveForm */
setlocale(LC_MONETARY, 'es_CO');
$formatter = new NumberFormatter('es_CO',  NumberFormatter::CURRENCY);
$total = 0;
$cofinanciacion = 0;
$aporte_fondo = 0;
$ue = 0;
$un = 0;
?>

<div class="detalle-proyecto-form">

    <?= DetailView::widget([
        'model' => $model_faer,
        'attributes' => [
            'faer_no',
            'radicado',
            'proyecto:ntext',
            [
                'attribute'=>'nit_presento',
                'value'=> $model_faer->nitPresento->razon_social,
            ],

            [
                'attribute'=>'nit_ejecuto',
                'value'=> $model_faer->nitEjecuto->razon_social,
            ],

            'fecha_radicacion:date',
            'fecha_aprobacion:date',
            'oep',
        ],
    ]) ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Cobertura guardada</h3>
        </div>
        <div class="panel-body">
            <?php if (count($lista_detalles) > 0): ?>
                <table class="table">
                    <tr>
                        <th>Departamento</th>
                        <th>Municipio</th>
                        <th>Veredas</th>
                        <th style="width:16%; text-align: right;">Total</th>
                        <th style="width:16%; text-align: right;">Cofinanciamiento</th>
                        <th style="width:12%; text-align: right;">Aporte fondo</th>
                        <th>UE</th>
                        <th>UN</th>
                        <th></th>
                    </tr>
                    <?php foreach ($lista_detalles as $item):
                        $total += $item->total;
                        $cofinanciacion += $item->cofinanciacion;
                        $aporte_fondo += $item->aporte_fondo;
                        $ue += $item->usuarios_existentes;
                        $un += $item->usuarios_nuevos;
                        ?>
                        <tr>
                            <td>
                                <?= Divipola::findOne(['id_dpto'=>$item->id_departamento])->dpto ?>
                            </td>
                            <td>
                                <?= Divipola::findOne(['id'=>$item->id_municipio])->mpio ?>
                            </td>
                            <td>
                                <?= $item->descripcion_veredas ?>
                            </td>
                            <td style="text-align: right;">
                                <?= $formatter->formatCurrency($item->total, 'COP') ?>
                            </td>
                            <td style="text-align: right;">
                                <?= $formatter->formatCurrency($item->cofinanciacion, 'COP') ?>
                            </td>
                            <td style="text-align: right;">
                                <?= $formatter->formatCurrency($item->aporte_fondo, 'COP') ?>
                            </td>
                            <td style="text-align: right;">
                                <?= $item->usuarios_existentes ?>
                            </td>
                            <td style="text-align: right;">
                                <?= $item->usuarios_nuevos ?>
                            </td>
                            <th>
                                <?= Html::a(' - ', ['delete', 'id' => $item->id, 'numero'=>$item->numero], [
                                    'class' => 'btn btn-xs btn-danger',
                                    'data' => [
                                        'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                                        'method' => 'post',
                                    ],
                                ]) ?>
                            </th>
                        </tr>
                    <?php endforeach; ?>
                    <tr style="background-color: #CCC;">
                        <td><b>TOTAL</b></td>
                        <td></td>
                        <td></td>
                        <td style="text-align: right;"><?= $formatter->formatCurrency($total, 'COP') ?></td>
                        <td style="text-align: right;"><?= $formatter->formatCurrency($cofinanciacion, 'COP') ?></td>
                        <td style="text-align: right;"><?= $formatter->formatCurrency($aporte_fondo, 'COP') ?></td>
                        <td style="text-align: right;"><?= $ue ?></td>
                        <td style="text-align: right;"><?= $un ?></td>
                    </tr>
                </table>
            <?php endif; ?>
        </div>
    </div>


    <?php $form = ActiveForm::begin(); ?>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Registrar</h3>
        </div>
        <div class="panel-body">
            <div class="row">

                <div class="col-md-3">
                    <?= $form->field($model, 'id_departamento')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(\app\models\Divipola::find()->all(), 'id_dpto', 'dpto'),
                        'options' => ['placeholder' => 'Seleccione una opción'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]) ?>

                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'id_municipio')->widget(DepDrop::classname(), [
                        'type'=>DepDrop::TYPE_SELECT2,
                        'pluginOptions'=>[
                            'depends' => ['detalleproyecto-id_departamento'],
                            'loadingText' => 'Cargando...',
                            'placeholder' => 'Seleccione ciudad',
                            'url' => Url::to(['divipola/ciudades'])
                        ]
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

                <!--<div class="col-md-2">
                    <?php/* echo $form->field($model, 'aporte_fondo')->widget(MaskMoney::classname(), [
                        'pluginOptions' => [
                            'prefix' => '$ ',
                            'suffix' => '',
                            'thousands' => '.',
                            'decimal' => ',',
                            'precision' => 0,
                            'allowZero' => true,
                            'allowNegative' => false,
                        ]
                    ]) */?>

                </div>-->

                <div class="col-md-2">
                    <?= $form->field($model, 'usuarios_existentes')->textInput() ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($model, 'usuarios_nuevos')->textInput() ?>
                </div>

            </div>

            <div class="form-group">
                <?= Html::a('Terminar', ['faer/index'], ['class' => 'btn btn-primary pull-right']); ?>
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Añadir') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success pull-right' : 'btn btn-primary']) ?>

            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
