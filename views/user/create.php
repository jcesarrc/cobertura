<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = Yii::t('app', 'Usuarios');
$this->params['breadcrumbs'][] = $this->title;

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
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'placeholder'=>'Ingrese login del LDAP']) ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

</div>
