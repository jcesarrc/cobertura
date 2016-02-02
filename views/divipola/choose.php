<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\widgets\FileInput;
use yii\helpers\Url;


$this->title = Yii::t('app', 'Cargar archivo DPA');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="divipola-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-md-6">
            <?php
            echo '<label class="control-label">Subir archivo en formato separado por comas (.csv)</label><br>';
            echo FileInput::widget([
                'name' => 'attachment',
                'options' => [
                    'accept' => 'text/csv',
                    'multiple' => false
                ],
                'pluginOptions' => [
                    'uploadUrl' => Url::to(['divipola/file-upload']),
                ]
            ]);
            ?>
        </div>
        <div class="col-md-6 instructions">
                <h1>Requisitos</h1>
                <ol>
                    <li>Sólo se permite subir archivos en formato CSV (separados por comas)</li>
                    <li>Puede usar el botón seleccionar o arrastrar el archivo al área designada</li>
                    <li>Asegúrese de guardar el archivo como "archivo separado por comas *.csv"</li>
                    <li>Los registros cuyo codigo de Departamento y Municipio existan se omitirán de la carga</li>
                    <li>El archivo a subir debe tener los siguientes campos (columnas) en este estricto orden:</li>
                    <ul>
                        <li>
                            <code>Codigo de Departamento</code>
                        </li>
                        <li>
                            <code>Nombre de Departamento</code>
                        </li>
                        <li>
                            <code>Codigo de municipio</code>
                        </li>
                        <li>
                            <code>Nombre de municipio</code>
                        </li>
                    </ul>

                </ol>
        </div>
    </div>


</div>
