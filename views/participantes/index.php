<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ParticipantesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Participantes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="participantes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Participantes'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'documento',
            'tipo_documento',
            'nombres',
            'apellidos',
            'nombre_entidad',
            // 'nit_entidad',
            // 'cargo',
            // 'telefono',
            // 'correo',
            // 'id_comite',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
