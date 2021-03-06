<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Divipola */

$this->title = Yii::t('app', 'Actualizar {modelClass}: ', [
    'modelClass' => 'Divipola',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Divipolas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="divipola-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
