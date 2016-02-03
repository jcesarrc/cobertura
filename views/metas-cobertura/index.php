<?php

use app\models\Categoria;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MetasCoberturaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Metas Coberturas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="metas-cobertura-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Registrar Metas Cobertura'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'categoria',
                'value' => function ($model) {
                    return \app\models\Categoria::findOne(['id' => $model->categoria])->nombre;
                },
                'filter' => Select2::widget([
                    'name' => 'id',
                    'attribute' => 'id',
                    'model'=>$searchModel,
                    'data' => ArrayHelper::map(Categoria::find()->all(), 'id', 'nombre'),
                    'options' => ['placeholder' => 'Categoría'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]),
            ],
            [
                'attribute'=>'ano',
                'value'=>'ano',
                'filter'=> Html::activeDropDownList($searchModel,
                    'ano',[
                        2015 => "2015",
                        2016 => "2016",
                        2017 => "2017",
                        2018 => "2018",
                        2019 => "2019",
                        2020 => "2020",
                    ],['class'=>'form-control']
                ),
            ],
            'cobertura:integer',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
