'use strict';

//Make sure jQuery has been loaded before app.js
if (typeof jQuery === "undefined") {
    throw new Error("Routes module needs jQuery");
}

var Marker = function () {
    var map_context;
    return {
        sourceUrl: '',
        csrf_id: '',
        csrf_value: '',
        draw: function (id) {
            var payload = {id: id};
            payload[this.csrf_id] = this.csrf_value; //CSRF Token if POST method
            jQuery.ajax({
                method: 'GET',
                dataType: 'json',
                contentType: 'application/json',
                //data: JSON.stringify(payload), //CSRF Token if POST method
                url: this.sourceUrl, success: function (result) {
                    if (result.id) {
                        var route = [];

                        jQuery.each(result.geom_route, function (i, e) {
                            route.push(new google.maps.LatLng(e.x, e.y));
                        });

                        var polyline = new google.maps.Polyline({
                            path: route,
                            strokeColor: "#0000FF",
                            strokeOpacity: 0.8,
                            strokeWeight: 2
                        });

                        polyline.setMap(map_context);

                        jQuery("#sidebar").animate({scrollTop: jQuery("#route_" + id).position().top - 150}, '500', 'swing', function () {
                        });
                    }
                }
            });
        },
        init: function (id) {
            jQuery("#link_1").addClass("active"); //Active link

            var map_element = jQuery("#map");
            jQuery(window).on('resize', function () {
                map_element.css("height", jQuery(window).height() + "px");
            });

            map_element.css("height", jQuery(window).height() + "px");

            map_context = new google.maps.Map(document.getElementById("map"), {
                zoom: 13,
                center: new google.maps.LatLng(6.2705300, -75.5721200),
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                mapTypeControl: false,
                disableDoubleClickZoom: false,
                scrollwheel: true,
                streetViewControl: false,
                radius: 500,
                draggable: true
            });

            this.draw(id);
        }
    }
}();
