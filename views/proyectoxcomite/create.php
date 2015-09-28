<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Proyectoxcomite */

$this->title = Yii::t('app', 'Create Proyectoxcomite');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Proyectoxcomites'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proyectoxcomite-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
