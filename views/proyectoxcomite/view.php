<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Proyectoxcomite */

$this->title = $model->bpin;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Proyectoxcomites'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proyectoxcomite-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->bpin], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->bpin], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'bpin',
            'idComite',
            'fecha',
            'valor_aprobado',
            'acta_aprobacion',
        ],
    ]) ?>

</div>
