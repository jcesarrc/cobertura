<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ComiteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Comites');
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

            [
                'attribute'=>'id_convocatoria',
                'value'=>function($data){
                    return app\models\TipoProyecto::findOne(['id'=>$data->id_convocatoria])->nombre;
                }
            ],

            'acta',
            'fecha_inicio',
            'fecha_fin',
            [
                'format' => 'raw',
                'value' => function($data){
                    return Html::a(Html::encode('Registrar participantes'),['participantes/create', 'id_comite'=>$data->id]);
                },
            ],
            [
                'format' => 'raw',
                'value' => function($data){
                    return Html::a(Html::encode('Ver participantes'),['participantes/index', 'id_comite'=>$data->id]);
                },
            ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
