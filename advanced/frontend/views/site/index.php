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
        <!--

        http://ic.snssdk.com/2/article/v25/stream/?count=20&min_behot_time=1504621638&bd_latitude=4.9E-324&bd_longitude=4.9E-324&bd_loc_time=1504622133&loc_mode=5&loc_time=1504564532&latitude=35.00125&longitude=113.56358166666665&city=%E7%84%A6%E4%BD%9C&lac=34197&cid=23201&iid=14534335953&device_id=38818211465&ac=wifi&channel=baidu&aid=13&app_name=news_article&version_code=460&device_platform=android&device_type=SM-E7000&os_api=19&os_version=4.4.2&uuid=357698010742401&openudid=74f06d2f9d8c9664

        -->
        <div>

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
