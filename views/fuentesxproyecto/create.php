<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Fuentesxproyecto */

$this->title = Yii::t('app', 'Create Fuentesxproyecto');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fuentesxproyectos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fuentesxproyecto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
