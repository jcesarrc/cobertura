<?php

use app\models\Categoria;
use kartik\daterange\DateRangePicker;
use kartik\widgets\DepDrop;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FaerSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Búsqueda</h3>
    </div>
    <div class="panel-body faer-search">

        <?php $form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
        ]); ?>
        <div class="row">
            <div class="col-lg-4">
                <?= $form->field($model, 'categoria')->dropDownList(

                    ArrayHelper::map(Categoria::find()->all(), 'id', 'nombre'),
                    ['prompt' => 'Cualquier categoria']

                ) ?>
            </div>
            <div class="col-lg-4">

                <?= $form->field($model, 'subcategoria')->widget(DepDrop::classname(), [
                    'pluginOptions' => [
                        'depends' => ['faersearch-categoria'],
                        'loadingText' => 'Cargando...',
                        'placeholder' => 'Todas las subcategorias',
                        'url' => Url::to(['comite/subcategorias'])
                    ]
                ]) ?>
                <?php /* $form->field($model, 'subcategoria')->dropDownList(

        ArrayHelper::map(\app\models\Subcategoria::find()->all(),'id','nombre'),
        ['prompt'=>'Cualquier subcategoria']

    )  */
                ?>
            </div>
            <div class="col-lg-4">
                <?= $form->field($model, 'convocatoria')->widget(DepDrop::classname(), [
                    'pluginOptions' => [
                        'depends' => ['faersearch-categoria', 'faersearch-subcategoria'],
                        'loadingText' => 'Cargando...',
                        'placeholder' => 'Todas las convocatorias',
                        'url' => Url::to(['comite/convocatorias'])
                    ]
                ]) ?>
                <?php /* $form->field($model, 'convocatoria')->dropDownList(

                    ArrayHelper::map(\app\models\Convocatoria::find()->all(), 'id', 'nombre'),
                    ['prompt' => 'Todas las convocatorias']

                ) */ ?>
            </div>
        </div>

        <?php //echo $form->field($model, 'radicado') ?>

        <?php // $form->field($model, 'fecha_radicacion') ?>

        <?php // echo $form->field($model, 'valor_usuario') ?>

        <?php // echo $form->field($model, 'radicado') ?>

        <?php // echo $form->field($model, 'cup') ?>

        <?php // echo $form->field($model, 'cob') ?>

        <?php // echo $form->field($model, 'nbi') ?>

        <?php // echo $form->field($model, 'un') ?>

        <?php // echo $form->field($model, 'oep') ?>

        <?php // echo $form->field($model, 'faer_no') ?>

        <?php // echo $form->field($model, 'proyecto') ?>

        <?php // echo $form->field($model, 'nit_ejecuto') ?>

        <?php // echo $form->field($model, 'departamento') ?>

        <?php // echo $form->field($model, 'municipio') ?>

        <?php // echo $form->field($model, 'latitud') ?>

        <?php // echo $form->field($model, 'longitud') ?>

        <?php // echo $form->field($model, 'fecha_presentacion') ?>

        <?php // echo $form->field($model, 'fecha_aprobacion') ?>

        <?php // echo $form->field($model, 'fecha_ajuste') ?>

        <?php // echo $form->field($model, 'usuarios_mejoramiento') ?>

        <?php // echo $form->field($model, 'cofinanciacion') ?>

        <div class="form-group pull-right">
            <?= Html::submitButton(Yii::t('app', 'Buscar'), ['class' => 'btn btn-primary btn-xs']) ?>
            <?= Html::resetButton(Yii::t('app', 'Restablecer'), ['class' => 'btn btn-default btn-xs']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>