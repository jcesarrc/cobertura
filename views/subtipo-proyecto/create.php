<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SubtipoProyecto */

$this->title = Yii::t('app', 'Create Subtipo Proyecto');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Subtipo Proyectos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subtipo-proyecto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
