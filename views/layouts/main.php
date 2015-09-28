<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Sistema de Cobertura',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Inicio', 'url' => ['/site/index']],
            [
                'label' => 'Configuración',
                'items' => [
                    ['label' => 'División Politica Administrativa', 'url' => ['/divipola/index']],
                    '<li class="divider"></li>',
                    ['label' => 'Areas cobertura', 'url' => ['/area-cobertura/index']],
                    '<li class="divider"></li>',
                    ['label' => 'Comités', 'url' => ['/comite/index']],
                    '<li class="divider"></li>',
                    ['label' => 'Convocatorias', 'url' => ['/convocatoria/index']],
                    '<li class="divider"></li>',
                    ['label' => 'Fuentes Financiación', 'url' => ['/fuentes-financiacion/index']],
                    '<li class="divider"></li>',
                    ['label' => 'Fuentes por proyecto', 'url' => ['/fuentesxproyecto/index']],
                    '<li class="divider"></li>',
                    ['label' => 'Operadores de Red', 'url' => ['/operador-red/index']],
                    '<li class="divider"></li>',
                    ['label' => 'Participantes', 'url' => ['/participantes/index']],
                    '<li class="divider"></li>',
                    ['label' => 'Proyectos por Comité', 'url' => ['/proyectoxcomite/index']],
                ],
            ],
            [
                'label' => 'Proyectos',
                'items' => [
                    ['label' => 'Tipos de proyecto', 'url' => ['/tipo-proyecto/index']],
                    '<li class="divider"></li>',
                    ['label' => 'Subtipo de proyecto', 'url' => ['/subtipo-proyecto/index']],
                    '<li class="divider"></li>',
                    ['label' => 'Proyectos', 'url' => ['/proyecto/index']],
                ],
            ],


            Yii::$app->user->isGuest ?
                ['label' => 'Ingresar', 'url' => ['/site/login']] :
                [
                    'label' => 'Salir (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ],
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Ministerio de Minas y Energía <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
