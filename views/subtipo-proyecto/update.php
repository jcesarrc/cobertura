<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SubtipoProyecto */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Subtipo Proyecto',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Subtipo Proyectos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="subtipo-proyecto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
