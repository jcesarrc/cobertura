<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FaerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Faers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Faer'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Subir archivo proyecto(s) FAER'), ['choose'], ['class' => 'btn btn-primary']) ?>

    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'faer_no',
            //'proyecto',
            'nit_presento',
            'valor_total:currency',
            'solicitud_faer:currency',
            'usuarios_ampliacion',
            'valor_usuario:currency',
            // 'radicado',
            // 'cup',
            // 'cob',
            // 'nbi',
            // 'un',
            // 'oep',
            // 'faer_no',
            // 'nit_ejecuto',
            // 'departamento',
            // 'municipio',
            // 'latitud',
            // 'longitud',
            // 'fecha_presentacion',
            // 'fecha_aprobacion',
            // 'fecha_ajuste',
            // 'usuarios_mejoramiento',
            // 'cofinanciacion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
