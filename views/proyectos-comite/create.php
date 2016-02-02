<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProyectosComite */

$this->title = Yii::t('app', 'Create Proyectos Comite');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Proyectos Comites'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proyectos-comite-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
