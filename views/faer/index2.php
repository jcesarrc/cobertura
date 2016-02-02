<?php

use app\models\Categoria;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProyectosComiteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Proyectos sin aprobar en comités');
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs('$("#btn-aprobar").click(function(){
            var keys = $("#w1").yiiGridView("getSelectedRows");
            if(keys.length>0){
                $("#selection").val(keys);
                $("#myModal").modal()
            }
        });

        $("#btn-aceptar").click(function(){
            $("form").submit();
        });

        ', View::POS_END);


?>
<div class="col-lg-12">
    <?php if(Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?= Yii::$app->session->getFlash('success') ?>
        </div>
    <?php endif; ?>
</div>
<div class="proyectos-comite-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= DetailView::widget([
        'model' => $comite,
        'attributes' => [
            'nombre',
            'fecha_inicio:date',
            'fecha_fin:date',
        ],
    ]) ?>
    <p>
        <?= Html::a(Yii::t('app', 'Aprobar proyectos seleccionados'), null , ['id'=>'btn-aprobar', 'class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn'],

            'proyecto',

        ],
    ]); ?>

   <?php Modal::begin([
       'id'=>'myModal',
       'header'=>'<h4>Aprobación de proyectos en este comité</h4>'
   ]); ?>

    <?= Html::beginForm(Url::to(['aprobar']))?>
    <?= Html::hiddenInput('selection',null,['id'=>'selection']) ?>
    <?= Html::hiddenInput('id',$comite->id,['id'=>'comite']) ?>
    <div class="input-group">
    <?= Html::label('Fecha de aprobación ') ?>
    <?= Html::input('date','fecha',null,['id'=>'fecha']) ?>
    </div>
    <div class="input-group">
    <?= Html::label('Número de acta ') ?>
    <?= Html::textInput('acta',null,['id'=>'acta']) ?>
    </div>
    <div class="input-group">
    <?= Html::button('Aceptar',['id'=>'btn-aceptar','class'=>'btn btn-success btn-sm pull-right']) ?>
    </div>
    <?= Html::endForm() ?>

    <?php Modal::end(); ?>


</div>
