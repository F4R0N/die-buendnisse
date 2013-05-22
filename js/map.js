$(document).ready(
        function() {
            $("#map #map_field").bind({
                mouseover: function(e) {
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
                        var y = $(".row:last-of-type #map_field").data("y");
                        var x = $(".row:last-of-type #map_field").data("x");
                        alert(x + " " + y);
                        $(".row:last-of-type").remove()
                        $(".row:first").before("<div class='row'><div id='map_field'></div><div id='map_field'></div><div id='map_field'></div><div id='map_field'></div><div id='map_field'></div><div id='map_field'></div><div id='map_field'></div></div>");
                        break;
                    case "a":
                        $(".row #map_field:last-child").remove()
                        $(".row #map_field:first-child").before("<div id='map_field'></div>")
                        break;
                    case "s":
                        $(".row:first").remove()
                        $(".row:last-of-type").after("<div class='row'><div id='map_field'></div><div id='map_field'></div><div id='map_field'></div><div id='map_field'></div><div id='map_field'></div><div id='map_field'></div><div id='map_field'></div></div>");
                        break;
                    case "d":
                        $(".row #map_field:first-child").remove()
                        $(".row #map_field:last-child").after("<div id='map_field'></div>")
                        break;
                }
            });
        });