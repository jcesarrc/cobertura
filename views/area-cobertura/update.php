<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AreaCobertura */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Area Cobertura',
]) . ' ' . $model->bpin;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Area Coberturas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bpin, 'url' => ['view', 'bpin' => $model->bpin, 'departamento' => $model->departamento, 'municipio' => $model->municipio, 'localidad' => $model->localidad, 'barrio' => $model->barrio]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="area-cobertura-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
