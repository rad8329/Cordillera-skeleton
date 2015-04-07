'use strict';

if (typeof jQuery === "undefined") {
    throw new Error("Contacts module needs jQuery");
}

jQuery(function () {

    jQuery('[data-toggle="tooltip"]').tooltip();

    jQuery('a[href="#add-contact"]').on('click', function (event) {
        event.preventDefault();
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
});