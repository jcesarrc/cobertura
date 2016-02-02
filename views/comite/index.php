<?php

use app\models\Categoria;
use app\models\Convocatoria;
use app\models\Subcategoria;
use kartik\widgets\Select2;
use yii\grid\ActionColumn;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ComiteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Comités');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comite-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Comite'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nombre',
            'fecha_inicio',

            [
                'attribute' => 'tipo',
                'value' => function($model){
                    return Categoria::findOne(['id'=>$model->tipo])->nombre;
                },
                'filter' => Select2::widget([
                    'name' => 'tipo',
                    'data' => ArrayHelper::map(Categoria::find()->all(), 'id', 'nombre'),
                    'options' => ['placeholder' => 'Categoría'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]),
            ],
            [
                'attribute' => 'subtipo',
                'value' => function($model){
                    return Subcategoria::findOne(['id'=>$model->subtipo])->nombre;
                },
                'filter' => Select2::widget([
                    'name' => 'subtipo',
                    'data' => ArrayHelper::map(Subcategoria::find()->all(), 'id', 'nombre'),
                    'options' => ['placeholder' => 'Subcategoría'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]),
            ],
            [
                'attribute' => 'convocatoria',
                'value' => function($model){
                    if(!empty(Convocatoria::findOne(['id'=>$model->convocatoria])))
                        return Convocatoria::findOne(['id'=>$model->convocatoria])->descripcion;
                    else return "N/A";
                },
                'filter' => Select2::widget([
                    'name' => 'convocatoria',
                    'data' => ArrayHelper::map(Convocatoria::find()->all(), 'id', 'nombre'),
                    'options' => ['placeholder' => 'Convocatoria'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]),
            ],

            'observaciones:ntext',

            [
                'attribute' => '',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a('Proyectos',['/faer/index2','id'=>$model->id],['class'=>'btn btn-success btn-xs','style'=>'border-radius:4px;']);
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
