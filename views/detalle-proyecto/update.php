<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DetalleProyecto */

$this->title = Yii::t('app', 'Actualizar {modelClass}: ', [
    'modelClass' => 'cobertura del proyecto',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Detalle Proyectos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="detalle-proyecto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'lista_detalles' => $lista_detalles
    ]) ?>

</div>
