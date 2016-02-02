<?php

use app\models\Reportes;
use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;
?>

<?php

if(empty($series)){
    return;
}

echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'themes/grid-light',
    ],
    'options' => [
        'credits' => ['enabled' => false],
        'title' => ['text' => 'Beneficiarios por departamento'],
        'lang' => Reportes::translations(),
        'labels' => [
            'items' => [
                [
                    'html' => '',
                    'style' => [
                        'left' => '50px',
                        'top' => '18px',
                        'color' => new JsExpression('(Highcharts.theme && Highcharts.theme.textColor) || "black"'),
                    ],
                ],
            ],
        ],
        'series' => [
            [
                'type' => 'pie',
                'name' => 'Departamentos',
                'coloyByPoint' => true,
                'data' => $series,
                'showInLegend' => true,
                'dataLabels' => [
                    'enabled' => true,
                ],
            ],
        ],
    ]
]);