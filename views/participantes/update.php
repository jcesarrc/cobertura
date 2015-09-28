<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Participantes */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Participantes',
]) . ' ' . $model->documento;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Participantes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->documento, 'url' => ['view', 'documento' => $model->documento, 'id_comite' => $model->id_comite]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="participantes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
