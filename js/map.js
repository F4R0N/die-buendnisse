$(document).ready(
        function() {
            $("#map #map_field").bind({
                mouseenter: function(e) {
                    var info = $(this).find(".map_info_hide");
                    info.addClass('map_info_show');
                    info.removeClass('map_info_hide');
                    info.css({"left": e.pageX});
                    info.css({"top": e.pageY});
                },
                mouseout: function(e) {
                    var info = $(this).find(".map_info_show");
                    info.addClass('map_info_hide');
                    info.removeClass('map_info_show');
                }
            })
        });

$(document).ready(
        function() {
            $("body").keypress(function(e) {
                switch (String.fromCharCode(e.charCode)) {
                    case "w":

                        break;
                    case "a":

                        break;
                    case "s":

                        break;
                    case "d":

                        break;
                }
            });
        });