<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Fuentesxproyecto */

$this->title = $model->bpin;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fuentesxproyectos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fuentesxproyecto-view">

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
            'id_fuente',
            'valor',
            'anio',
            'observacion',
        ],
    ]) ?>

</div>
