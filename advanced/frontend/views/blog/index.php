<?php
use yii\helpers\Url;
use frontend\assets\BlogAsset;

$this->title = "blog首页-微醺的结果集";
BlogAsset::register($this);
?>
<style>
    .footer{
        margin-left: 38.2%;
    }
</style>
<div id="page">
    <div id="fh5co-aside" style="background-image: url(images/blog/image_1.jpg)">
        <div class="overlay"></div>
        <!--<nav role="navigation">
            <ul>
                <li><a href="index.html"><i class="icon-home"></i></a></li>
            </ul>
        </nav>-->
        <div class="featured">
            <span>Fish</span>
            <h2>I'm Vlson </a></h2>
        </div>
    </div>
    <div id="fh5co-main-content">
        <div class="fh5co-post">
            <?php foreach($blog_list as $blog){?>
                <div class="fh5co-entry padding">
                    <img src="<?=$blog['cover']?>" alt="<?=$blog['title']?>">
                    <div>
                        <span class="fh5co-post-date"><?=date("Y年m月d日 H:i:s", $blog['created_at'])?></span>
                        <h2><a href="<?=Url::to(['article', 'id'=>$blog['id']])?>"><?=$blog['title']?></a></h2>
                        <p class="blog-abstract"><?=$blog['abstract']?></p>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>
</div>

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>
