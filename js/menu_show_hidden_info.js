$(document).ready(function() {
    $("#left ul li").bind({
        mouseenter: function(e) {
            var info = $(this).find(".info_hide");
            console.log('Show!');
            info.addClass('info_show');
            info.removeClass('info_hide');
        },
        mouseleave: function(e) {
            var info = $(this).find(".info_show");
            console.log('Hide!');
            info.addClass('info_hide');
            info.removeClass('info_show');
        }
    })
});