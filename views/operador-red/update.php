<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OperadorRed */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Operador Red',
]) . ' ' . $model->id_sui;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Operador Reds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_sui, 'url' => ['view', 'id' => $model->id_sui]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="operador-red-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
