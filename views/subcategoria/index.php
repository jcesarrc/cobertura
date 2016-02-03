<?php

use app\models\Categoria;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SubcategoriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Subcategorias');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subcategoria-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Crear Subcategoria'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'=>'categoria',
                'value'=>function($model){
                    return Categoria::findOne(['id'=>$model->categoria])->nombre;
                },
                'filter' => Select2::widget([
                    'name' => 'categoria',
                    'attribute' => 'categoria',
                    'model'=>$searchModel,
                    'data' => ArrayHelper::map(Categoria::find()->all(), 'id', 'nombre'),
                    'options' => ['placeholder' => 'Categoría'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]),
            ],
            'nombre',


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
