<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Faer */

$this->title = Yii::t('app', 'Create Faer');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Faers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
