<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

raoul2000\bootswatch\BootswatchAsset::$theme = 'cosmo';
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

    $items = [];

    if(Yii::$app->user->isGuest){
        $items[] = ['label' => 'Ingresar', 'url' => ['/site/login']];
    }else {
        $items[] = ['label' => 'Inicio', 'url' => ['/site/index']];
        if (Yii::$app->user->identity->username == "admin") {
            $items[] =
                [
                    'label' => 'Configuración',
                    'items' => [
                        ['label' => 'Comités', 'url' => ['/comite/index']],
                        '<li class="divider"></li>',
                        ['label' => 'Convocatorias', 'url' => ['/convocatoria/index']],
                        '<li class="divider"></li>',
                        ['label' => 'Operadores de Red', 'url' => ['/operador-red/index']],
                        '<li class="divider"></li>',
                        ['label' => 'División Politica Administrativa', 'url' => ['/divipola/index']],
                        '<li class="divider"></li>',
                        ['label' => 'Categorías', 'url' => ['/categoria/index']],
                        '<li class="divider"></li>',
                        ['label' => 'Subcategorias', 'url' => ['/subcategoria/index']],
                        '<li class="divider"></li>',
                        ['label' => 'Usuarios', 'url' => ['/user/index']],
                        '<li class="divider"></li>',
                        ['label' => 'Metas de cobertura', 'url' => ['/metas-cobertura/index']],
                    ],
                ];
        }

        $items[] = [
                    'label' => 'Proyectos',
                    'items' => [
                        ['label' => 'Registrar proyectos', 'url' => ['/faer/index']],
                    ],
                ];

        $items[]=   [
                    'label' => 'Reportes',
                    'items' => [
                        ['label' => 'Búsqueda / Reporte', 'url' => ['/faer/index']],
                        '<li class="divider"></li>',
                        ['label' => 'Búsqueda proyectos por comité', 'url' => ['/faer/index3']],
                        '<li class="divider"></li>',
                        ['label' => 'Reporte beneficiarios y fondos', 'url' => ['/reportes/beneficiados-por-departamento']],
                        '<li class="divider"></li>',
                        ['label' => 'Reporte metas', 'url' => ['/reportes/canvas-metas']],
                    ],
                ];

        $items[]=   [
                    'label' => 'Salir (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
    }


    NavBar::begin([
        'brandLabel' => 'Sistema de Cobertura',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $items,
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
