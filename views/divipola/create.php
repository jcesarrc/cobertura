<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Divipola */

$this->title = Yii::t('app', 'Create Divipola');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Divipolas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="divipola-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
