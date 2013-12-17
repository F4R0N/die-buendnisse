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

                        var y = $(".row:first #map_field").data("y") + 1;
                        var x = $(".row:first #map_field").data("x");
                        var x_max = $(".row:first #map_field:last-of-type").data("x");

                        $.getJSON("/ajax.php?page=map&getRow=true&x=" + x + "&y=" + y + "&x_max=" + x_max, function(data) {
                            $(".row:last-of-type").remove();
                            $(".row:first").before("<div class='row'></div>");
                            for (var i = x; i <= x_max; i++) {
                                if (data !== null && typeof data[i] != "undefined") {
                                    $(".row:first").append('<div id="map_field"data-x="' + i + '" data-y="' + y + '">\n\
                                                                 <img src="' + data[i][y].image + '">\n\
                                                              </div>');

                                }
                                else {
                                    $(".row:first").append('<div id="map_field" data-x="' + i + '" data-y="' + y + '" >\n\
                                                                    <img src="/images/map/Gras.png">\n\
                                                               </div>');
                                }
                            }

                        });
                        break;
                    case "a":
                        var y = $(".row:first #map_field").data("y");
                        var x = $(".row:first #map_field").data("x");
                        var y_max = $(".row:last #map_field:first").data("y");
                        alert(x + " " + y + " " + y_max);
                        $(".row #map_field:last-child").remove();
                        for (var i = 1; i < 7; i++){
                            $(".row:nth-of-type(" + i + ") #map_field:first-child").before("<div id='map_field'></div>");
                        }
                        break;
                    case "s":
                        var y = $(".row:last-of-type #map_field").data("y") - 1;
                        var x = $(".row:last-of-type #map_field").data("x");
                        var x_max = $(".row:last-of-type #map_field:last-of-type").data("x");
                        $.getJSON("/ajax.php?page=map&getRow=true&x=" + x + "&y=" + y + "&x_max=" + x_max, function(data) {
                            $(".row:first").remove();
                            $(".row:last-of-type").after("<div class='row'></div>");
                            for (var i = x; i <= x_max; i++) {
                                if (data !== null && typeof data[i] != "undefined") {
                                    $(".row:last-of-type").append('<div id="map_field"data-x="' + i + '" data-y="' + y + '">\n\
                                                                 <img src="' + data[i][y].image + '">\n\
                                                              </div>');

                                }
                                else {
                                    $(".row:last-of-type").append('<div id="map_field" data-x="' + i + '" data-y="' + y + '" >\n\
                                                                    <img src="/images/map/Gras.png">\n\
                                                               </div>');
                                }
                            }
                        });
                        break;
                    case "d":
                        var y = $(".row:last-of-type #map_field").data("y");
                        var x = $(".row:first #map_field").data("x");
                        var y_max = $(".row:last #map_field:first").data("y");
                        alert(x + " " + y + " " + y_max);
                        $(".row #map_field:first-child").remove();
                        $(".row #map_field:last-child").after("<div id='map_field'></div>");
                        break;
                }
            });
        });