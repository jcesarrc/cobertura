<?php

use app\models\Categoria;
use app\models\Comite;
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

        <?= Html::beginForm(Url::to(['index3'])) ?>
        <div class="row">
            <div class="col-lg-4">
                <?= Html::dropDownList('comite',null,
                    ArrayHelper::map(Comite::find()->all(), 'id', 'nombre'),
                    ['prompt' => 'Cualquier comité', 'class'=>'form-control']
                ) ?>
            </div>


        <div class="form-group pull-right">
            <?= Html::submitButton(Yii::t('app', 'Buscar'), ['class' => 'btn btn-primary btn-xs']) ?>
            <?= Html::resetButton(Yii::t('app', 'Restablecer'), ['class' => 'btn btn-default btn-xs']) ?>
        </div>

        <?= Html::endForm() ?>

    </div>
</div>