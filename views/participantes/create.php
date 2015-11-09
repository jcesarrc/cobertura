<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Participantes */

$this->title = Yii::t('app', 'Registrar Participantes');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Participantes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="participantes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
