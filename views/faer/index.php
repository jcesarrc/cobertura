<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FaerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Faers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php $global_acum = 0; // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Faer'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Subir archivo proyecto(s) FAER'), ['choose'], ['class' => 'btn btn-primary']) ?>

    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'responsive'=>true,
        'resizableColumns'=>true,
        'panel' => [
                'before'=>'',
            ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'faer_no',
            [
                'attribute' => 'nit_ejecuto',
                'value' => function ($data){
                    return $data->nitEjecuto->razon_social;
                }
            ],

            'fecha_radicacion:date',

            'proyecto',

            [
                'attribute' => 'Dpto',
                'value' => function ($data) {
                    if (count($data->detalleProyectos)>0)
                        return app\models\Divipola::findOne(['id_dpto'=>$data->detalleProyectos[0]->id_departamento])->dpto;
                    else return "";
                },
            ],


            [
                'attribute' => 'Total Beneficiarios',
                'contentOptions'=> ['style' => 'text-align: right;'],
                'value' => function ($data, $acum) use (&$global_acum) {
                    if (count($data->detalleProyectos)>0) {
                        foreach($data->detalleProyectos as $d) {
                            $acum += $d->usuarios_nuevos;
                        }
                        $global_acum+=$acum;
                        return $global_acum;
                    }
                    else return $global_acum;
                },
            ],

            [
                'attribute' => 'Total Proyecto',
                'format' => 'Currency',
                'contentOptions'=> ['style' => 'text-align: right;'],
                'value' => function ($data, $acum) {
                    if (count($data->detalleProyectos)>0) {
                        foreach($data->detalleProyectos as $d) {
                            $acum += $d->total;
                        }
                        return $acum;
                    }
                    else return 0;
                },
            ],

            [
                'attribute' => 'Total Acumulado',
                'format' => 'Currency',
                'contentOptions'=> ['style' => 'text-align: right;'],
                'value' => function ($data, $acum) use (&$global_acum) {
                    if (count($data->detalleProyectos)>0) {
                        foreach($data->detalleProyectos as $d) {
                            $acum += $d->total;
                        }
                        $global_acum+=$acum;
                        return $global_acum;
                    }
                    else return $global_acum;
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
