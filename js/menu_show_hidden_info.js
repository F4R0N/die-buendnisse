$(document).ready(function() {
    $("#left ul li").bind({
        mouseenter: function(e) {
            var info = $(this).find(".info_hide");
            info.addClass('info_show');
            info.removeClass('info_hide');
        },
        mouseleave: function(e) {
            var info = $(this).find(".info_show");
            info.addClass('info_hide');
            info.removeClass('info_show');
        }
    })
});