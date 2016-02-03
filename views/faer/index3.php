<?php

use kartik\daterange\DateRangePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FaerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Faers');
$this->params['breadcrumbs'][] = $this->title;
$global_acum_beneficiarios = 0;
$global_acum = 0;
?>
<div class="faer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search3', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'responsive' => true,
        'resizableColumns' => true,
        'panel' => [
            'before' => '',
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'faer_no',
            [
                'attribute' => 'nit_ejecuto',
                'value' => function ($data) {
                    return $data->nitEjecuto->razon_social;
                },
                'filter' => \kartik\select2\Select2::widget([
                    'name' => 'nit_ejecuto',
                    'data' => ArrayHelper::map(\app\models\OperadorRed::find()->all(), 'nit', 'razon_social'),
                    'options' => ['placeholder' => ''],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])
            ],

            //'fecha_radicacion:date',
            [
                'attribute' => 'fecha_radicacion',
                'value' => function ($data) {
                    return $data->fecha_radicacion;
                },
                'filter' =>
                    DateRangePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'fecha_radicacion',
                        'convertFormat' => true,
                        'pluginOptions' => [
                            'timePicker' => false,
                            'format' => 'Y-m-d'
                        ]
                    ])],

            'proyecto',

            [
                'attribute' => 'Dpto',
                'value' => function ($data) {
                    if (count($data->detalleProyectos) > 0)
                        return app\models\Divipola::findOne(['id_dpto' => $data->detalleProyectos[0]->id_departamento])->dpto;
                    else return "";
                },
                'filter' => \kartik\select2\Select2::widget([
                    'name' => 'dpto',
                    'data' => ArrayHelper::map(\app\models\Divipola::find()->all(), 'id_dpto', 'dpto'),
                    'options' => ['placeholder' => ''],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]),
            ],


            [
                'attribute' => 'Total Beneficiarios',
                'contentOptions' => ['style' => 'text-align: right;'],
                'value' => function ($data, $acum) use (&$global_acum_beneficiarios) {
                    if (count($data->detalleProyectos) > 0) {
                        foreach ($data->detalleProyectos as $d) {
                            $acum += $d->usuarios_nuevos;
                        }
                        $global_acum_beneficiarios += $acum;
                        return $global_acum_beneficiarios;
                    } else return $global_acum_beneficiarios;
                },
            ],

            [
                'attribute' => 'Total Proyecto',
                'format' => 'Currency',
                'contentOptions' => ['style' => 'text-align: right;'],
                'value' => function ($data, $acum) {
                    if (count($data->detalleProyectos) > 0) {
                        foreach ($data->detalleProyectos as $d) {
                            $acum += $d->total;
                        }
                        return $acum;
                    } else return 0;
                },
            ],

            [
                'attribute' => 'Total Acumulado',
                'format' => 'Currency',
                'contentOptions' => ['style' => 'text-align: right;'],
                'value' => function ($data, $acum) use (&$global_acum) {
                    if (count($data->detalleProyectos) > 0) {
                        foreach ($data->detalleProyectos as $d) {
                            $acum += $d->total;
                        }
                        $global_acum += $acum;
                        return $global_acum;
                    } else return $global_acum;
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],

        'toolbar' => [
            [
                'options' => ['class' => 'btn-group-sm']
            ],
            '{export}',
        ],


    ]); ?>

</div>
