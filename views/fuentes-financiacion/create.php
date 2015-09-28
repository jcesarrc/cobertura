<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\FuentesFinanciacion */

$this->title = Yii::t('app', 'Create Fuentes Financiacion');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fuentes Financiacions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fuentes-financiacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
