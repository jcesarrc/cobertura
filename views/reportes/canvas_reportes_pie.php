<?php
use yii\web\View;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

$this->title = Yii::t('app', 'Reportes');
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs("setTimeout(function(){ if($('#categoria').val().length>0) $('#categoria').trigger('change'); }, 500);", View::POS_READY);

$anos = [2015 => 2015, 2016 => 2016, 2017 => 2017, 2018 => 2018, 2019 => 2019, 2020 => 2020];
$categorias = ArrayHelper::map(\app\models\Categoria::find()->all(), 'id', 'nombre');

?>
<h1><?= Html::encode($this->title) ?></h1>

<div class="canvas-form">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Filtrar</h3>
        </div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin(); ?>

                <div class="row">
                    <div class="col-md-2">
                        <?= Html::label('Año', 'ano') ?>
                        <?= Html::dropDownList('ano', $parametros['ano'], $anos, ['id' => 'ano', 'class' => 'form-control']) ?>
                    </div>
                    <div class="col-md-3">
                        <?= Html::label('Categoria', 'categoria') ?>
                        <?= Html::dropDownList('categoria', $parametros['categoria'], $categorias, ['prompt'=>'Todas', 'id' => 'categoria', 'class' => 'form-control']) ?>
                    </div>
                    <div class="col-md-3">
                        <?= Html::label('Subcategoria', 'subcategoria') ?>
                        <?= \kartik\depdrop\DepDrop::widget([
                            'name' => 'subcategoria',
                            'id' => 'subcategoria',
                            'pluginOptions' => [
                                'depends' => ['categoria'],
                                'loadingText' => 'Cargando...',
                                'placeholder' => 'Todas',
                                'url' => Url::to(['comite/subcategorias', 'selected'=>$parametros['subcategoria']])
                            ]
                        ]) ?>
                    </div>
                    <div class="col-md-3">
                        <?= Html::label('Convocatoria', 'convocatoria') ?>
                        <?= \kartik\depdrop\DepDrop::widget([
                            'name' => 'convocatoria',
                            'id' => 'convocatoria',
                            'pluginOptions' => [
                                'depends' => ['categoria','subcategoria'],
                                'loadingText' => 'Cargando...',
                                'placeholder' => 'Todas',
                                'url' => Url::to(['comite/convocatorias', 'selected'=>$parametros['convocatoria']])
                            ]
                        ]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?= Html::submitButton(Yii::t('app', 'Enviar'), ['class' => 'btn btn-primary pull-right btn-sm', 'style'=>'border-radius: 3px']) ?>
                    </div>
                </div>

            <?php ActiveForm::end(); ?>
        </div>

    </div>

    <?= $this->render('_canvas_beneficiarios', [
        'series' => $series_beneficiarios,
    ]) ?>


    <?= $this->render('_canvas_fondos', [
        'series' => $series_fondos,
    ]) ?>