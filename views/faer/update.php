<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Faer */

$this->title = Yii::t('app', 'Actualizar {modelClass}: ', [
    'modelClass' => 'Proyecto',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Faers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->numero, 'url' => ['view', 'id' => $model->numero]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="faer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
