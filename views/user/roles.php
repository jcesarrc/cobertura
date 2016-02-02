<?php

use app\models\Rol;
use kartik\checkbox\CheckboxX;
use yii\helpers\Html;

$this->title = Yii::t('app', 'Usuarios');
$this->params['breadcrumbs'][] = $this->title;
$id = Yii::$app->requestedParams[0];
?>

<div class="subcategoria-form">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="col-lg-2">
        <div class="btn-group-vertical" role="group" style="margin-top:20px;">
            <?= Html::a(Yii::t('app', 'Registrar usuarios'), ['create'], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Ver usuarios'), ['index'], ['class' => 'btn btn-primary']) ?>
        </div>
    </div>

    <div class="col-lg-10">

        <?= Html::beginForm(); ?>
        <?= Html::hiddenInput('enviado','true') ?>
        <div class="panel panel-default">
            <div class="panel-heading">

                <h3 class="panel-title"><?= Html::encode("Roles") ?></h3>
            </div>
            <div class="panel-body">
                <?php
                    echo Html::checkboxList("roles",$roles_actuales,$lista_roles,['separator' => Html::tag('br')]);
                ?>
            </div>
            <div class="panel-footer">
                <div class="form-group">
                    <?= Html::submitButton('Actualizar roles', ['class' => 'btn btn-sm btn-success']) ?>
                </div>
            </div>
        </div>
        <?= Html::endForm(); ?>
    </div>

</div>







