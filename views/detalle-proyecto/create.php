<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DetalleProyecto */

$this->title = Yii::t('app', 'Registrar Cobertura del proyecto');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cobertura del proyecto'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detalle-proyecto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'model_faer'=>$model_faer,
        'lista_detalles' => $lista_detalles
    ]) ?>

</div>
