
<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;

$this->title = Yii::t('app', 'Usuarios');
$this->params['breadcrumbs'][] = $this->title;
$this->registerJs('setTimeout(function() {
            $(".alert-dismissible").fadeOut("slow");
            }, 1000);',View::POS_END);
?>
<div class="tipo-proyecto-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="col-lg-12">
        <?php if(Yii::$app->session->hasFlash('danger')): ?>
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?= Yii::$app->session->getFlash('danger') ?>
            </div>
        <?php endif; ?>
        <?php if(Yii::$app->session->hasFlash('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?= Yii::$app->session->getFlash('success') ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="col-lg-2">
        <div class="btn-group-vertical" role="group" style="margin-top:20px;">
            <?= Html::a(Yii::t('app', 'Registrar usuarios'), ['create'], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Ver usuarios'), ['index'], ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
    <div class="col-lg-10">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'username',
            [
                'header' => 'Estado',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a($model->habilitado?'Bloquear':'Desbloquear',['/user/habilitar','id'=>$model->id],['class'=>'btn'. ($model->habilitado? ' btn-danger ':' btn-success ') .'btn-xs','style'=>'border-radius:4px;']);
                },
            ],
            [
                'header' => 'Roles',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->id==1?"":Html::a('Roles',['/user/roles','id'=>$model->id],['class'=>'btn btn-default btn-xs','style'=>'border-radius:4px;']);
                },
            ],

        ],
    ]); ?>
    </div>

</div>
