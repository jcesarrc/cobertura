<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Faer */

$this->title = "FAER # ".$model->faer_no;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Faers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            'faer_no',
            'radicado',
            'proyecto',
            'nit_presento',
            'nit_ejecuto',
            'valor_total:currency',
            'cofinanciacion:currency',
            'solicitud_faer:currency',

            'departamento',
            'municipio',
            'latitud',
            'longitud',

            'usuarios_ampliacion',
            'usuarios_mejoramiento',
            'valor_usuario:currency',

            'fecha_presentacion:date',
            'fecha_aprobacion:date',
            'fecha_ajuste:date',

            'cup',
            'cob',
            'nbi',
            'un',
            'oep',
        ],
    ]) ?>

    <p class="pull-right">
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->numero], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->numero], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
