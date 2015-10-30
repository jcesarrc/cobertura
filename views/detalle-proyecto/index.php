<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DetalleProyectoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cobertura del proyecto');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detalle-proyecto-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Registrar Cobertura del proyecto'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'numero',
            'id_departamento',
            'id_municipio',
            'descripcion_veredas',
            'latitud',
            'longitud',
            'total',
            'aporte_fondo:currency',
            'cofinanciacion:currency',
            'usuarios_nuevos',
            'usuarios_existentes',
            // 'numero',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
