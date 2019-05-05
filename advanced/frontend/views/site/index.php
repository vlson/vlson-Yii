<?php

/* @var $this yii\web\View */

use frontend\assets\IndexAsset;

IndexAsset::register($this);
$this->title = '首页-微醺的结果集';

$js = <<<JS
    $('.dowebok').flipTimer();
JS;
$this->registerJs($js);
?>
<div class="right-content">
    <section class="panel b-green" style="background-image: url('images/index-bg.png');">
        <div class="news-box">
            <!--<iframe src="https://s.weibo.com/top/summary?cate=total&key=person"></iframe>-->
            <ul>
                <?php foreach($news as $new){?>
                    <li>
                        <div class="title"><a href="<?=$new['article_url']?>" target="_blank"><?=$new['title']?></a></div>
                        <div class="abstract"><?=$new['abstract']?></div>
                        <div class="detail"><span class="media">媒体：<?=$new['media_name']?></span> · 阅读数：<?=$new['read_count']?></div>
                    </li>
                <?php }?>
            </ul>
        </div>
        <div class="plugin-box">
            <!--clock-->
            <div class="clock">
                <div class="dowebok">
                    <div class="hours"></div>
                    <div class="minutes"></div>
                    <div class="seconds"></div>
                </div>
            </div>

            <!--weather-->
            <div class="weather">
                <div id="weather-view-he"></div>
                <script>
                    WIDGET = {ID: '4iMPiAbfVY'};
                </script>
                <script type="text/javascript" src="https://apip.weatherdt.com/view/static/js/r.js?v=1111"></script>
            </div>
        </div>

    </section>
</div>
