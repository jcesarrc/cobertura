<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProyectoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Proyectos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proyecto-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Crear Proyecto'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'bpin',
            'nombre',
            'descripcion',
            'departamento',
            'municipio',
            // 'tipo_proyecto',
            // 'corregimiento',
            // 'localidad',
            // 'direccion',
            // 'longitud',
            // 'latitud',
            // 'costo_usuario',
            // 'valor',
            // 'operador_red',
            // 'fecha_asignacion',
            // 'fecha_finalizacion',
            // 'cantidad_usuarios',
            // 'estado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
