<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OperadorRedSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Operador Reds');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operador-red-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Registrar Operador Red'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nit',
            'razon_social',
            //'represetante_legal',
            //'revisor_fiscal',
            // 'contador',
            // 'direccion',
            // 'telefono',
            // 'celular',
            // 'correo',
            // 'direccion_web',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
