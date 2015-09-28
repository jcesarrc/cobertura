<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Fuentesxproyecto */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Fuentesxproyecto',
]) . ' ' . $model->bpin;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fuentesxproyectos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bpin, 'url' => ['view', 'id' => $model->bpin]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="fuentesxproyecto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
