<?php

use app\models\Divipola;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Faer */

$this->title = "Proyecto  ".$model->faer_no;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Proyectos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

setlocale(LC_MONETARY, 'es_CO');
$formatter = new NumberFormatter('es_CO',  NumberFormatter::CURRENCY);
$total = 0;
$cofinanciacion = 0;
$aporte_fondo = 0;
$ue = 0;
$un = 0;
?>
<div class="faer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            'faer_no',
            'radicado',
            'proyecto',
            'nit_presento',
            'nit_ejecuto',

            'fecha_radicacion:date',
            'fecha_aprobacion:date',

            'oep',
        ],
    ]) ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Cobertura guardada</h3>
        </div>
        <div class="panel-body">
            <?php if (count($lista_detalles) > 0): ?>
                <table class="table">
                    <tr>
                        <th>Departamento</th>
                        <th>Municipio</th>
                        <th>Veredas</th>
                        <th style="width:16%; text-align: right;">Total</th>
                        <th style="width:16%; text-align: right;">Cofinanciamiento</th>
                        <th style="width:12%; text-align: right;">Aporte fondo</th>
                        <th style="text-align: right;">UE</th>
                        <th style="text-align: right;">UN</th>
                        <th></th>
                    </tr>
                    <?php foreach ($lista_detalles as $item):
                        $total += $item->total;
                        $cofinanciacion += $item->cofinanciacion;
                        $delta = $item->total - $item->cofinanciacion;
                        $aporte_fondo += $delta;
                        $ue += $item->usuarios_existentes;
                        $un += $item->usuarios_nuevos;
                        ?>
                        <tr>
                            <td>
                                <?= Divipola::findOne(['id_dpto'=>$item->id_departamento])->dpto ?>
                            </td>
                            <td>
                                <?= Divipola::findOne(['id'=>$item->id_municipio])->mpio ?>
                            </td>
                            <td>
                                <?= $item->descripcion_veredas ?>
                            </td>
                            <td style="text-align: right;">
                                <?= $formatter->formatCurrency($item->total*1000, 'COP') ?>
                            </td>
                            <td style="text-align: right;">
                                <?= $formatter->formatCurrency($item->cofinanciacion*1000, 'COP') ?>
                            </td>
                            <td style="text-align: right;">
                                <?= $formatter->formatCurrency($delta*1000, 'COP') ?>
                            </td>
                            <td style="text-align: right;">
                                <?= $item->usuarios_existentes ?>
                            </td>
                            <td style="text-align: right;">
                                <?= $item->usuarios_nuevos ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr style="background-color: #CCC;">
                        <td><b>TOTAL</b></td>
                        <td></td>
                        <td></td>
                        <td style="text-align: right;"><?= $formatter->formatCurrency($total*1000, 'COP') ?></td>
                        <td style="text-align: right;"><?= $formatter->formatCurrency($cofinanciacion*1000, 'COP') ?></td>
                        <td style="text-align: right;"><?= $formatter->formatCurrency($aporte_fondo*1000, 'COP') ?></td>
                        <td style="text-align: right;"><?= $ue ?></td>
                        <td style="text-align: right;"><?= $un ?></td>
                    </tr>
                </table>
            <?php endif; ?>
        </div>
    </div>

    <p class="pull-right">
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->numero], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->numero], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
