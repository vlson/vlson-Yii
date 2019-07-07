/**
 * Created by tiany on 2019/07/06/0006.
 */
$(function(){
    //点赞
    $(".like-event").on('click', '.like', function(){
        var _this = $(this);
        if(_this.children('i').hasClass('fa-heart')){
            return;
        }
        var id = _this.attr('art_id');
        var csrfToken = $('meta[name="csrf-token"]').attr("content");

        $.ajax({
            url: '/blog/like',
            type: 'post',
            data: {
                'art_id': id,
                '_csrf-frontend': csrfToken,
            },
            dataType: 'json',
            success: function(data){
                if(data.flag){
                    var num = _this.children('.like-num').html();
                    var new_num = Number(num) +1;
                    _this.children('.like-num').text(new_num);
                    _this.children('i').removeClass('fa-heart-o');
                    _this.children('i').addClass('fa-heart');
                }
            }
        })
    })
})