<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DetalleProyecto */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Detalle Proyectos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detalle-proyecto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
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
            'id',
            'id_departamento',
            'id_municipio',
            'descripcion_veredas',
            'latitud',
            'longitud',
            'total',
            'aporte_fondo',
            'cofinanciacion',
            'usuarios_nuevos',
            'usuarios_existentes',
            'numero',
        ],
    ]) ?>

</div>
