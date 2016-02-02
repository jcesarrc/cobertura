<h1 style="text-align: center;">Metas de Cobertura</h1>
<br/>
<br/>
<br/>

<?php

use app\models\Reportes;
use miloschuman\highcharts\Highcharts;

$this->title = Yii::t('app', 'Metas de cobertura');
$this->params['breadcrumbs'][] = $this->title;
$categories = [2015, 2016, 2017, 2018, 2019, 2020];
?>
<h2>Proyectos Vía Tarifa</h2>
<div class="row">
    <div class="col-md-9">
    <?php
    echo Highcharts::widget([
        'scripts' => [
            'modules/exporting',
            'themes/sand-signika',
        ],
        'options' => [
            'credits' => ['enabled' => false],
            'lang' => Reportes::translations(),
            'title' => ['text' => 'Beneficiarios por año vs meta'],
            'chart' => ['type' => 'line'],
            'xAxis' => [
                'allowDecimals' => false,
                'categories' => $categories,
                'title' => ['text' => 'Año']
            ],
            'yAxis' => [
                'title' => ['text' => 'Número de Usuarios']
            ],
            'series' => [
                [
                    'name' => 'Meta',
                    'data' => $metas_creg,
                ],
                [
                    'name' => 'Cobertura',
                    'data' => $series_creg,
                ],
            ],
        ]
    ]);
?>
    </div>
    <div class="col-md-3">
        <table class="table table-bordered table-striped">
            <tr>
                <th>Año</th>
                <th>Cobertura</th>
                <th>Meta</th>
            </tr>
            <?php for($i=0,$y=2015; $y<=2020; $y++, $i++):?>
                <tr>
                    <td><?= $y ?></td>
                    <td><?= $series_creg[$i] ?></td>
                    <td><?= \app\models\MetasCobertura::findOne(['categoria'=>1, 'ano'=>$y])->cobertura ?></td>
                </tr>
            <?php endfor ?>
        </table>
    </div>
</div>

<h2>Proyectos FAER</h2>

<div class="row">
    <div class="col-md-9">
        <?php
        echo Highcharts::widget([
            'scripts' => [
                'modules/exporting',
                'themes/grid-light',
            ],
            'options' => [
                'credits' => ['enabled' => false],
                'lang' => Reportes::translations(),
                'title' => ['text' => 'Beneficiarios por año vs meta'],
                'chart' => ['type' => 'line'],
                'xAxis' => [
                    'allowDecimals' => false,
                    'categories' => $categories,
                    'title' => ['text' => 'Año']
                ],
                'yAxis' => [
                    'title' => ['text' => 'Número de Usuarios']
                ],
                'series' => [
                    [
                        'name' => 'Meta',
                        'data' => $metas_faer,
                    ],
                    [
                        'name' => 'Cobertura',
                        'data' => $series_faer,
                    ],
                ],
            ]
        ]);
        ?>
    </div>
    <div class="col-md-3">
        <table class="table table-bordered table-striped">
            <tr>
                <th>Año</th>
                <th>Cobertura</th>
                <th>Meta</th>
            </tr>
            <?php for($i=0,$y=2015; $y<=2020; $y++, $i++):?>
                <tr>
                    <td><?= $y ?></td>
                    <td><?= $series_faer[$i] ?></td>
                    <td><?= \app\models\MetasCobertura::findOne(['categoria'=>2, 'ano'=>$y])->cobertura ?></td>
                </tr>
            <?php endfor ?>
        </table>
    </div>
</div>

<h2>Proyectos FAZNI</h2>

<div class="row">
    <div class="col-md-9">
        <?php
        echo Highcharts::widget([
            'scripts' => [
                'modules/exporting',
                'themes/grid-light',
            ],
            'options' => [
                'credits' => ['enabled' => false],
                'lang' => Reportes::translations(),
                'title' => ['text' => 'Beneficiarios por año vs meta'],
                'chart' => ['type' => 'line'],
                'xAxis' => [
                    'allowDecimals' => false,
                    'categories' => $categories,
                    'title' => ['text' => 'Año']
                ],
                'yAxis' => [
                    'title' => ['text' => 'Número de Usuarios']
                ],
                'series' => [
                    [
                        'name' => 'Meta',
                        'data' => $metas_fazni,
                    ],
                    [
                        'name' => 'Cobertura',
                        'data' => $series_fazni,
                    ],
                ],
            ]
        ]);
        ?>
    </div>
    <div class="col-md-3">
        <table class="table table-bordered table-striped">
            <tr>
                <th>Año</th>
                <th>Cobertura</th>
                <th>Meta</th>
            </tr>
            <?php for($i=0,$y=2015; $y<=2020; $y++, $i++):?>
                <tr>
                    <td><?= $y ?></td>
                    <td><?= $series_fazni[$i] ?></td>
                    <td><?= \app\models\MetasCobertura::findOne(['categoria'=>3, 'ano'=>$y])->cobertura ?></td>
                </tr>
            <?php endfor ?>
        </table>
    </div>
</div>
