<?php

/* @var $this yii\web\View */

use frontend\assets\IndexAsset;

IndexAsset::register($this);
$this->title = '首页-微醺的结果集';

$this->registerCssFile("/css/index-photo.css");
$js = <<<JS
    $('.dowebok').flipTimer();
JS;
$this->registerJs($js);
?>
<div class="right-content">
    <section class="panel b-green" style="background-image: url('images/index-bg.png');">
        <div class="show-box">
            <div class="bg">
                <div class="wrap">
                    <img class="img" src="images/index-images/1.jpg" alt=""/>
                    <img class="img" src="images/index-images/2.jpg" alt=""/>
                    <img class="img" src="images/index-images/3.jpg" alt=""/>
                    <img class="img" src="images/index-images/4.jpg" alt=""/>
                    <img class="img" src="images/index-images/5.jpg" alt=""/>
                    <img class="img" src="images/index-images/6.jpg" alt=""/>
                    <img class="img" src="images/index-images/7.jpg" alt=""/>
                    <img class="img" src="images/index-images/8.jpg" alt=""/>
                    <img class="img" src="images/index-images/9.jpg" alt=""/>
                    <img class="img" src="images/index-images/10.jpg" alt=""/>
                    <img class="img" src="images/index-images/11.jpg" alt=""/>
                    <img class="img" src="images/index-images/5.jpg" alt=""/>
                </div>
            </div>
            <script>
                /*思路分析

                 1.加载后让图片动态排序成3D圆效果
                 安顺序分别调整图片的角度
                 每张图片在Z方向前进一段距离，使得图片围成一个圈
                 页面加载后，使用CSS3的过渡效果，过渡完成时间相同，每张图片的延迟时间按顺序延长，实现一张张跟着分别运动
                 2.鼠标拖拽住图片，图片整体跟着左右上下旋转
                 鼠标点击后
                 鼠标移动
                 鼠标松开
                 松开后清除移动事件
                 3.鼠标松开后，图片有惯性的效果
                 最后一次的坐标差递减，绝对值无限接近0时就停下来
                 使用计时器，当最后一次的坐标差绝对值小于0.1时，清除计时器
                 */

                var img = $('.img');
                var wrap = $('.wrap')[0];
                var bg =  $('.bg')[0];
                var img_num = img.length;
                var deg = 360 / img_num;
                var rotateX = -20, rotateY = 0;//跟CSS样式对应，wrap模块的度数
                var timer = null;
                var resultX;//X坐标差
                var resultY;//Y坐标差

                window.onload = function () {
                    Array.prototype.forEach.call(img, function (item, index) {
                        item.style.cssText = 'transform:rotateY(' + deg * index + 'deg) translateZ(300px);transition: 1s ' + (img_num - index) * .1 + 's';
                    });
                    var text;
                    console.log(text);
                };

                bg.onmousedown = function (ev) {
                    var lastX = ev.clientX;//上一次鼠标的坐标X
                    var lastY = ev.clientY;//上一次鼠标的坐标Y
                    bg.onmousemove = function (ev) {
                        var nowX = ev.clientX;//这次一次鼠标的坐标X
                        var nowY = ev.clientY;//这次一次鼠标的坐标Y
                        resultX = nowX - lastX;
                        resultY = nowY - lastY;
                        rotateX -= resultY * 0.1;
                        rotateY += resultX * 0.1;
                        wrap.style.cssText ="transform:rotateX("+rotateX+"deg) rotateY("+rotateY+"deg)";
                        lastX = nowX;
                        lastY = nowY;
                    }
                    bg.onmouseup = function (ev) {
                        bg.onmousemove = null;
                        if(timer){
                            clearInterval(timer);
                        }

                        timer = setInterval(function(){
                            resultX *= 0.9;//控制横向转圈圈的惯性速度，值越小速度越慢
                            resultY *= 0.5;//控制纵向翻滚的惯性速度，值越小速度越慢
                            rotateX -= resultY;
                            rotateY += resultX;
                            wrap.style.cssText ="transform:rotateX("+rotateX+"deg) rotateY("+rotateY+"deg)";
                            if(Math.abs(resultX) < 0.1 && Math.abs(resultY) < 0.1 ){
                                clearInterval(timer);
                            }
                        },1000 / 60);
                    }
                    return false;//消除默认拖拽效果
                }
                function $(item) {//封装一个简单获取节点的方法
                    var first = item.substring(0, 1);
                    var second = item.substring(1);
                    switch (first) {
                        case '.':
                            return document.getElementsByClassName(second);
                        case '#':
                            return document.getElementById(second);
                        default:
                            console.error('符号识别失败！');
                            return false;
                    }
                }
            </script>
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
