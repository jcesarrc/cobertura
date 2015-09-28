<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\OperadorRed */

$this->title = $model->id_sui;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Operador Reds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operador-red-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_sui], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_sui], [
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
            'id_sui',
            'nit',
            'razon_social',
            'represetante_legal',
            'revisor_fiscal',
            'contador',
            'direccion',
            'telefono',
            'celular',
            'correo',
            'direccion_web',
        ],
    ]) ?>

</div>
