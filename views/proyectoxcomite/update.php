<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Proyectoxcomite */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Proyectoxcomite',
]) . ' ' . $model->bpin;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Proyectoxcomites'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bpin, 'url' => ['view', 'id' => $model->bpin]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="proyectoxcomite-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
