<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Sistema de Información de Cobertura';
//$this->params['breadcrumbs'][] = $this->title;

$model->rememberMe = false;
?>


<div class="col-lg-12 col-lg-offset-3">
    <br>
    <br>
    <img src="https://www.minminas.gov.co/documents/10180/509131/logo-ppal.png/82328535-2c6d-45d7-8c24-0ba98877a42d?t=1414611012220">
    <br>
    <br>
    <div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

<br>
<br>

    <div class="col-lg-offset-1">
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'username')->label('Usuario') ?>

        <?= $form->field($model, 'password')->passwordInput()->label('Contraseña') ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ])->label('Recordarme en este equipo') ?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Entrar', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>
    </div>

</div>

    </div>

<div style="background: #C0AF00; min-height: 10px; margin-top: 580px;">


</div>