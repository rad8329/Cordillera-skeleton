'use strict';

if (typeof jQuery === "undefined") {
    throw new Error("Contacts module needs jQuery");
}

var Contact = function () {
    var attributes = ['id', 'firstname', 'lastname', 'email', 'address', 'phone', 'created_at', 'updated_at'];
    return {
        compile: function (data) {
            if (Object.keys(data.errors).length > 0) {
                jQuery.each(attributes, function (key, value) {
                    if (data.errors[value] != undefined && data.errors[value].length > 0) {
                        jQuery.each(data.errors[value], function (i, error) {
                            jQuery("#field-" + value).addClass("has-error");
                            jQuery("#field-" + value).append(
                                "<div class=\"help-block\"><div class=\"clearfix\">" + error + "</div></div>"
                            );
                        });
                    }
                });
            }
            else {
                jQuery('#add-contact').modal('hide');
            }
        },
        submit: function (element) {

            jQuery('#add-contact-form .has-error').removeClass();
            jQuery("#add-contact-form .help-block").detach();

            var $this = this;
            var url = jQuery(element).attr("action");

            jQuery.ajax({
                    url: url,
                    method: 'POST',
                    data: jQuery(element).serialize(),
                    success: function (data) {
                        $this.compile(data);
                    },
                    error: function (data) {

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
