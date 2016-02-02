<?php

use app\models\Categoria;
use kartik\widgets\DepDrop;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use kartik\datecontrol\DateControl;
use kartik\money\MaskMoney;

/* @var $this yii\web\View */
/* @var $model app\models\Faer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="faer-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="panel panel-default">
        <div class="panel-body">

    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'categoria')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Categoria::find()->all(), 'id', 'nombre'),
                'options' => ['placeholder' => 'Seleccione una opción'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'subcategoria')->widget(DepDrop::classname(), [
                'type' => DepDrop::TYPE_SELECT2,
                'pluginOptions'=>[
                    'depends' => ['faer-categoria'],
                    'loadingText' => 'Cargando...',
                    'placeholder' => 'Seleccione una opción',
                    'url' => Url::to(['faer/subcategorias'])
                ]
            ]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'convocatoria')->widget(DepDrop::classname(), [
                'type' => DepDrop::TYPE_SELECT2,
                'pluginOptions'=>[
                    'depends' => ['faer-categoria', 'faer-subcategoria'],
                    'loadingText' => 'Cargando...',
                    'placeholder' => 'Seleccione una opción',
                    'url' => Url::to(['faer/convocatorias'])
                ]
            ]) ?>
        </div>
    </div>

        </div>
    </div>


    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'faer_no')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-8">
            <?= $form->field($model, 'radicado')->textInput() ?>
        </div>
    </div>
    <?= $form->field($model, 'proyecto')->textarea(['maxlength' => true]) ?>
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'nit_presento')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\OperadorRed::find()->all(), 'nit', 'razon_social'),
                'options' => ['placeholder' => 'Seleccione una opción'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'nit_ejecuto')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\OperadorRed::find()->all(), 'nit', 'razon_social'),
                'options' => ['placeholder' => 'Seleccione una opción'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>
        </div>
    </div>


    <div class="row">


        <div class="col-lg-4">
            <?= $form->field($model, 'fecha_radicacion')->widget(DateControl::classname(), [
                'type' => DateControl::FORMAT_DATE,
            ]) ?>

        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'fecha_aprobacion')->widget(DateControl::classname(), [
                'type' => DateControl::FORMAT_DATE,
            ]) ?>
        </div>

        <div class="col-lg-4">
            <?= $form->field($model, 'oep')->textInput() ?>
        </div>

    </div>

</div>

<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Guardar y registrar detalles del proyecto') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    <?php echo !$model->isNewRecord ? (Html::a('Actualizar Cobertura', ['detalle-proyecto/create', 'numero' => $model->numero], ['class' => 'btn btn-default'])) : ""; ?>
</div>

<?php ActiveForm::end(); ?>


</div>
