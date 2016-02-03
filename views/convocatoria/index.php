<?php

use app\models\Categoria;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ConvocatoriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Convocatorias');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="convocatoria-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Convocatoria'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nombre',
            'descripcion',
            'fecha_inicio',
            'fecha_fin',
            [
                'attribute' => 'tipo',
                'value' => function($model){
                    return Categoria::findOne(['id'=>$model->tipo])->nombre;
                },
                'filter' => Select2::widget([
                    'name' => 'tipo',
                    'attribute' => 'tipo',
                    'model'=>$searchModel,
                    'data' => ArrayHelper::map(Categoria::find()->all(), 'id', 'nombre'),
                    'options' => ['placeholder' => 'Categoría'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]),
            ],
            // 'activa:boolean',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
