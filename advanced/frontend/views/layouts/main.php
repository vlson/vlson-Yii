<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="<?= Yii::$app->language ?>"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="<?= Yii::$app->language ?>"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="<?= Yii::$app->language ?>"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="<?= Yii::$app->language ?>"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <meta name="keywords" content="微醺,结果集,微醺的结果集">
    <meta name="description" content="微醺,结果集,微醺的结果集">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="baidu-site-verification" content="9f9bf23270ff81d94bc94721f969d365"/>

    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
<div class="content">
    <nav class="nav left-content">
        <div class="burger">
            <div class="burger__patty"></div>
        </div>

        <ul class="nav__list">
            <li class="nav__item">
                <a href="#1" class="nav__link c-blue"><img src="/images/home-icon.png" class="menu-list" alt="主页" title="主页"></a>
                <a href="<?=Url::to(['site/index'])?>" class="nav__link c-blue"><img src="/images/home-icon.png" class="menu-list" alt="主页" title="主页"></a>
            </li>
            <li class="nav__item">
                <a href="#2" class="nav__link c-yellow scrolly"><img src="/images/blog-icons.png" class="menu-list" alt="博客" title="博客"></a>
                <a href="<?=Url::to(['blog/index'])?>" class="nav__link c-yellow scrolly"><img src="/images/blog-icons.png" class="menu-list" alt="博客" title="博客"></a>
            </li>
            <li class="nav__item">
                <a href="javascript:void(0);" class="nav__link c-red"><img src="/images/shop-icon.png" class="menu-list" alt="商城" title="商城"></a>
                <a href="<?=Url::to(['shop/index'])?>" class="nav__link c-red"><img src="/images/shop-icon.png" class="menu-list" alt="商城" title="商城"></a>
            </li>
            <li class="nav__item">
                <a href="javascript:void(0);" class="nav__link c-green"><img src="/images/tools-icon.png" class="menu-list" alt="Little Tool" title="Little Tool"></a>
                <a href="<?=Url::to(['tool/index'])?>" class="nav__link c-green"><img src="/images/tools-icon.png" class="menu-list" alt="Little Tool" title="Little Tool"></a>
            </li>
            <li class="nav__item">
                <a href="javascript:void(0);" class="nav__link c-green"><img src="/images/wan-icon2.png" class="menu-list" alt="矩阵" title="矩阵"></a>
                <a href="<?=Url::to(['matrix/index'])?>" class="nav__link c-green"><img src="/images/wan-icon2.png" class="menu-list" alt="矩阵" title="矩阵"></a>
            </li>
        </ul>
    </nav>

    <?= $content ?>

    <footer class="footer" style="background-color: #74787c">
        <div class="container">
            <p class="pull-left"><?= Html::encode(Yii::$app->name) ?> Copyright &copy;  <?= date('Y') ?></p>

            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>
</div>
<?php $this->endBody() ?>
<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?79dae72c87d807c2e0b32998c0398e03";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
</body>
</html>
<?php $this->endPage() ?>
