<?php
use yii\helpers\Url;
use frontend\assets\BlogAsset;
use common\service\Func;

$this->title = $article['title']."-微醺的结果集";
$this->registerCssFile('/css/article.css');
BlogAsset::register($this);
?>

<div class="single">
    <div class="fh5co-loader"></div>

    <div id="page">
        <div id="fh5co-aside" style="background-image: url(<?=$article['cover']?>)" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <nav role="navigation">
                <ul>
                    <li><a href="index.html"><i class="icon-home"></i></a></li>
                </ul>
            </nav>
            <div class="page-title">
                <img src="http://vlson.oss-cn-beijing.aliyuncs.com/vland/image/ac1fa5e58b17c591da4ce391bac85dc1.png" alt="Free HTML5 by FreeHTMl5.co">
                <span>
                    <?=date("Y年m月d日 H时",$article['created_at'])?>&nbsp;&nbsp;&nbsp;&nbsp;
                    <span class="fa fa-eye" aria-hidden="true" style="font-size: 13px">&nbsp;&nbsp;<?=$article['read_num']?></span>
                </span>
                <h2><?=$article['title']?></h2>
            </div>
        </div>
        <div id="fh5co-main-content">
            <div class="fh5co-post">
                <div class="fh5co-entry padding">
                    <div class="post">
                        <h1 class="postTitle">
                            <a id="cb_post_title_url" class="postTitle2" href="javascript:void(0);"><?=$article['title']?></a>
                        </h1>
                        <div class="clear"></div>
                        <div class="postBody">
                            <div id="cnblogs_post_body" class="blogpost-body">
                                <div class="content">
                                    <?=$article['content_html']?>
                                </div>
                            </div>
                            <div id="MySignature"></div>
                            <div class="clear"></div>
                            <div id="blog_post_info_block">
                                <div id="BlogPostCategory"></div>
                                <div id="EntryTag">关键词: <?=$article['label']?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--I like it-->
    <div class="like-event">
        <span class="like" art_id="<?=$article['id']?>">
            <i class="fa <?php if(Func::isLike($article['id'])){?>fa-heart<?php }else{?>fa-heart-o<?php }?>" aria-hidden="true"></i>
            <span class="like-num"><?=$article['like_num']?></span>
        </span>
    </div>

    <!--let's do share-->
    <div class="bdsharebuttonbox" data-tag="share_1">
        <!-- 此处添加展示按钮 -->
        <a class="bds_mshare" data-cmd="mshare"></a>
        <a class="bds_tsina" data-cmd="tsina"></a>
        <a class="bds_sqq" data-cmd="sqq"></a>
        <a class="bds_copy" data-cmd="copy"></a>
        <a class="bds_more" data-cmd="more">更多</a>
        <a class="bds_count" data-cmd="count"></a>
    </div>
    <script>
        window._bd_share_config = {
            "common":{
                "bdText":"<?=$article['title']?>",
                "bdDesc" : '<?=$article['abstract']?>',
                "bdUrl" : '',
                "bdPic" : '<?=$article['cover']?>',
                "bdMini":"1",
                "bdMiniList":["tsina","weixin","sqq","youdao","copy"],
                "bdPic":"","bdStyle":"0","bdSize":"16"
            },
            "share" :{
                //此处放置分享按钮设置
                "tag" : "share_1",
                "bdSize" : 32,
            },
            "slide":{
                "type":"slide",
                "bdImg":"5",
                "bdPos":"right",
                "bdTop":"100"
            }
        }

        //以下为js加载部分
        with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?cdnversion='+~(-new Date()/36e5)];
    </script>

    <div class="fh5co-navigation">
        <div class="fh5co-cover prev fh5co-cover-sm" style="background-image: url(<?=$prev_art['cover']?>)">
            <div class="overlay"></div>
            <a class="copy" href="<?=Url::to(['article', 'id'=>$prev_art['id']])?>">
                <div class="display-t">
                    <div class="display-tc">
                        <div>
                            <span>Previous Article</span>
                            <h2><?=$prev_art['title']?></h2>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="fh5co-cover next fh5co-cover-sm" style="background-image: url(<?=$next_art['cover']?>)">
            <div class="overlay"></div>
            <a class="copy" href="<?=Url::to(['article', 'id'=>$next_art['id']])?>">
                <div class="display-t">
                    <div class="display-tc">
                        <div>
                            <span>Next Article</span>
                            <h2><?=$next_art['title']?></h2>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
    </div>
</div>
