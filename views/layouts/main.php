<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody()
?>

<header id="header">
   
    <?php 
    
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md fixed-top ']
        
    ]);
   echo Html::img('@web/logo.png', ['alt'=>'', 'class'=>'icon', 'url ' => ['/site/index']]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav d-flex flex-row w-100 navbar-expand-lg navbar-light bg-gradient-warning justify-content-center text-black'],
        'items' => [
            ['label' => 'Inicio','url' => ['/site/index'],'linkOptions' => ['class' => 'py-3 nav-link nav-link-home px-2']],
            ['label'=> 'Productos','url'=> ['#'],'linkOptions' => ['class' =>'py-3 nav-link nav-link-home px-2']],
            ['label' => 'Acerca', 'url' => ['/site/about'],'linkOptions' => ['class' => 'py-3 nav-link nav-link-home px-2']],



            Yii::$app->user->isGuest ? (
            ['label' => 'Cuenta', 'url' => ['/site/login'], 'linkOptions' => ['class' => 'navitem']]) : (
            ['label' => 'Cuenta (' . Yii::$app->user->identity->tbl_register_nombre . ')', 'linkOptions' =>
            ['class' => 'navitem'], 'items' => [
                ['label' => 'Perfil', 'url' => ['/user/profile'], 'linkOptions' => ['class' => '']],
                ['label' => 'Configuración', 'url' => ['/user/settings'], 'linkOptions' => ['class' => '']],
                ['label' => 'Logout', 'url' => ['/site/logout'], 'linkOptions' => [
                    'data-method' => 'post',
                    'class' => '',
                ]],
            ]]
            ),
        ],
    ]);
NavBar::end();
    ?>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer id="footer" class="mt-auto py-3 bg-light">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start">&copy; My Company <?= date('Y') ?></div>
            <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

