<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MetasCobertura */

$this->title = Yii::t('app', 'Registrar Metas Cobertura');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Metas Coberturas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="metas-cobertura-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
