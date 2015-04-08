'use strict';

if (typeof jQuery === "undefined") {
    throw new Error("Contacts module needs jQuery");
}

var Contact = function () {
    return {
        submit: function (element) {

            var url = jQuery(element).attr("action");
            var payload = {};

            jQuery(element).serializeArray().map(function (item) {
                if (payload[item.name]) {
                    if (typeof(payload[item.name]) === "string") {
                        payload[item.name] = [payload[item.name]];
                    }
                    payload[item.name].push(item.value);
                } else {
                    payload[item.name] = item.value;
                }
            });

            jQuery.ajax({
                    url: url,
                    method: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify(payload),
                    success: function (data) {
                        jQuery("#add-contact-body").html(data);
                    },
                    error: function (data) {
                        if (typeof data === 'object') {

                        }
                    }
                }
            );

            return false;
        },
        init: function () {
            jQuery("#link_2").addClass("active"); //Active link

            jQuery('[data-toggle="tooltip"]').tooltip();

            jQuery('a[href="#add-contact"]').on('click', function (event) {
                event.preventDefault();
                //console.log(jQuery(this).data("context-handler"));
                jQuery("#add-contact-body").load(jQuery(this).data("context-handler"));
                jQuery('#add-contact').modal('show');
            });

            jQuery('[data-command="toggle-search"]').on('click', function (event) {
                event.preventDefault();
                jQuery(this).toggleClass('hide-search');

                if (jQuery(this).hasClass('hide-search')) {
                    jQuery('.c-search').closest('.row').slideUp(100);
                } else {
                    jQuery('.c-search').closest('.row').slideDown(100);
                }
            });

            jQuery('#contact-list').searchable({
                searchField: '#contact-list-search',
                selector: 'li',
                childSelector: '.col-xs-12',
                show: function (elem) {
                    elem.slideDown(100);
                },
                hide: function (elem) {
                    elem.slideUp(100);
                }
            });
        }
    }
};
