<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MetasCobertura */

$this->title = Yii::t('app', 'Actualizar {modelClass}: ', [
    'modelClass' => 'Metas Cobertura',
]) . ' ' . $model->ano;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Metas Coberturas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="metas-cobertura-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
