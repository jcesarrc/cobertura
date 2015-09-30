<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\widgets\FileInput;
use yii\helpers\Url;


$this->title = Yii::t('app', 'Faers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faer-index">

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
                    'uploadUrl' => Url::to(['faer/file-upload']),
                ]
            ]);
            ?>
        </div>
        <div class="col-md-6 instructions">
                <h1>Requisitos</h1>
                <ol>
                    <li>Sólo se permite subir archivos en formato CSV (separados por comas)</li>
                    <li>Puede usar el botón seleccionar o arrastrar el archivo al área designada</li>
                    <li>Si suministra un proyecto con un número de FAER ya existente NO se tendrá en cuenta ese registro y se continuará con la carga de los datos siguientes</li>
                    <li>Si no conoce alguno de los datos debe dejar esa columna en blanco</li>
                    <li>Puede descargar la siguiente <?= Html::a('plantilla', 'files/base.xlsx') ?> y basarse en ella para llenar los datos requeridos en cada
                        columna
                    </li>
                    <li>Si utilizó la plantilla anterior, debe asegurarse de guardar el archivo como "archivo separado por comas *.csv"</li>
                    <li>El archivo a subir debe tener los siguientes campos (columnas) en este estricto orden:</li>
                    <ul>
                        <li>
                            <code># FAER</code> Número del proyecto FAER
                        </li>
                        <li>
                            <code>Número de radicado</code>
                        </li>
                        <li>
                            <code>Nombre del proyecto</code>
                        </li>
                        <li>
                            <code>Empresa que presentó</code> NIT de la empresa que presenta el proyecto, sin guión de separación del dígito de seguridad. ej. 888800112
                        </li>
                        <li>
                            <code>Empresa que ejecutó</code> NIT de la empresa que ejecuta el proyecto, sin guión de separación del dígito de seguridad. ej. 888800112
                        </li>
                        <li>
                            <code>Valor Total</code> Valor total del proyecto en Pesos Colombianos, sin signos de separación de miles u otros signos. El dato debe ser un número mayor o igual que cero
                        </li>
                        <li>
                            <code>Valor Cofinanciado</code> Valor cofinanciado  en Pesos Colombianos, sin signos de separación de miles u otros signos. El dato debe ser un número mayor o igual que cero
                        </li>
                        <li>
                            <code>Solicitud presupuestal FAER</code> Valor solicitado al FAER en Pesos Colombianos, sin signos de separación de miles u otros signos. El dato debe ser un número mayor o igual que cero
                        </li>
                        <li>
                            <code>Beneficiarios por ampliación</code> Número de usuarios beneficiado cuando el proyecto tiene como objetivo ampliar la cobertura. El dato debe ser un número entero mayor o igual que cero
                        </li>
                        <li>
                            <code>Beneficiarios por mejoramiento</code> Número de usuarios beneficiado cuando el proyecto tiene como objetivo mejorar la capacidad. El dato debe ser un número entero mayor o igual que cero
                        </li>
                        <li>
                            <code>Valor por usuario</code> Valor del proyecto por usuario beneficiado. Calculado como el cociente de la división entre el <code>Valor Total</code> y el <code>Número de usuarios total</code>
                        </li>
                        <li>
                            <code>Departamento</code> Código del departamento de acuerdo al DANE
                        </li>
                        <li>
                            <code>Municipio</code> Código del municipio de acuerdo al DANE
                        </li>
                        <li>
                            <code>Latitud</code> Latitud ubicación del proyecto
                        </li>
                        <li>
                            <code>Longitud</code> Longitud ubicación del proyecto
                        </li>
                        <li>
                            <code>Fecha de presentación</code> Longitud ubicación del proyecto
                        </li>
                        <li>
                            <code>Fecha de aprobación</code>
                        </li>
                        <li>
                            <code>Fecha de ajuste</code>
                        </li>
                        <li>
                            <code>CUP</code> Índice de cobertura por proyecto, debe ser un valor entre cero y uno
                        </li>
                        <li>
                            <code>COB</code> Índice de cobertura por proyecto, debe ser un valor entre cero y uno
                        </li>
                        <li>
                            <code>NBI</code> Índice ___, debe ser un valor igual a cero ó uno
                        </li>
                        <li>
                            <code>UN</code> Índice ___, debe ser un valor igual a cero ó uno
                        </li>
                        <li>
                            <code>OEP</code> Índice ___, debe ser un valor entre cero y uno
                        </li>

                    </ul>

                </ol>
        </div>
    </div>


</div>
