<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AreaCobertura */

$this->title = $model->bpin;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Area Coberturas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="area-cobertura-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'bpin' => $model->bpin, 'departamento' => $model->departamento, 'municipio' => $model->municipio, 'localidad' => $model->localidad, 'barrio' => $model->barrio], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'bpin' => $model->bpin, 'departamento' => $model->departamento, 'municipio' => $model->municipio, 'localidad' => $model->localidad, 'barrio' => $model->barrio], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'bpin',
            'tipo_servicio',
            'departamento',
            'municipio',
            'localidad',
            'barrio',
            'direccion',
            'longitud',
            'latitud',
            'capacidad_instalada',
            'capacidad_almacenamiento',
        ],
    ]) ?>

</div>
