/**
 * Created by Vlson on 2019/1/9.
 */

/*
* 定时切换背景图
* */
function changeBackground(){
    var img_num = Math.ceil(Math.random()*6);
    $('body').css('background', 'url(/images/login/bg-image' + img_num + '.jpg) top center no-repeat');
    $('body').css('background-size', 'cover');
}

$(function(){
    setInterval('changeBackground();', 5000);
})
