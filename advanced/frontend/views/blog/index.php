<?php
use yii\helpers\Url;
use frontend\assets\BlogAsset;
use common\service\Func;
use yii\widgets\LinkPager;

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
        <div class="fh5co-post like-event">
            <?php foreach($blog_list as $blog){?>
                <div class="fh5co-entry padding">
                    <span class="like" art_id="<?=$blog['id']?>">
                        <i class="fa <?php if(Func::isLike($blog['id'])){?>fa-heart<?php }else{?>fa-heart-o<?php }?>" aria-hidden="true"></i>
                        <span class="like-num"><?=$blog['like_num']?></span>
                    </span>
                    <img src="<?=$blog['cover']?>" alt="<?=$blog['title']?>">
                    <div>
                        <span class="fh5co-post-date">
                            <?=date("Y年m月d日 H时", $blog['created_at'])?>&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="fa fa-eye" aria-hidden="true" style="font-size: 13px">&nbsp;&nbsp;<?=$blog['read_num']?></span>
                        </span>

                        <h4><a href="<?=Url::to(['article', 'id'=>$blog['id']])?>"><?=$blog['title']?></a></h4>
                        <p class="blog-abstract">简介：<?=$blog['abstract']?></p>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>
</div>
<div class="morelist unselectable">
    <?=
    LinkPager::widget([
        'pagination'    =>  $pagination,
        'nextPageLabel' =>  '下一页',
        'prevPageLabel' =>  '上一页',
        'firstPageLabel'    =>  '首页',
        'lastPageLabel'    =>  '末页',
        'hideOnSinglePage' => false, // 当你数据不足2页时,分页默认不显示,但你可以让他显示出来
        'maxButtonCount' => 5,    // 分页 页码默认显示10页,不过你可以自由设置,比如显示5页
        'options' => ['class' => ''], // 给分页添加class
    ]);
    ?>
</div>

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>
