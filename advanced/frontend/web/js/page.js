/**
 * Created by tiany on 2019/07/07/0007.
 */
var page_size = 0;
$(".morelist ul li").each(function () {
    var class_name = $(this).attr('class');
    if(class_name && class_name != 'active'){
        var index = class_name.indexOf('disabled');
        //无上一页时无需显示首页+上一页，无下一页时无需显示末页+下一页
        if(index != -1){
            $(this).css('display', 'none');
        }
    }else{
        page_size++;
    }
})
if(page_size < 2){//1页或0页无需显示页码
    $(".morelist").hide();
}