<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FuentesFinanciacion */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Fuentes Financiacion',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fuentes Financiacions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="fuentes-financiacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
