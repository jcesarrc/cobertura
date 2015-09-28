<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AreaCobertura */

$this->title = Yii::t('app', 'Create Area Cobertura');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Area Coberturas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="area-cobertura-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
