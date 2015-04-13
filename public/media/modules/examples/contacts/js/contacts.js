'use strict';

if (typeof jQuery === "undefined") {
    throw new Error("Contacts module needs jQuery");
}

var Contact = function () {
    var attributes = ['id', 'firstname', 'lastname', 'email', 'address', 'phone', 'gender', 'created_at', 'updated_at'];
    return {
        modal: {
            title: '',
            show: function () {
                jQuery('#form-contact').modal('show');
            },
            hide: function () {
                jQuery('#form-contact').modal('hide');
            },
            load: function (url) {
                jQuery("#form-contact-body").load(url);
                jQuery("#modal-label").html(this.title);
                this.show();
            }
        },
        form: {
            action: null,
            submit: function (element) {

                var $this = this;

                jQuery.ajax({
                        url: $this.action,
                        method: 'POST',
                        data: jQuery(element).serialize(),
                        success: function (data) {
                            $this.compile(data);
                        },
                        error: function (data) {
                            throw new Error("Request failed");
                        }
                    }
                );

                return false;
            },
            compile: function (data) {
                jQuery('#context-form-contact .has-error').removeClass();
                jQuery("#context-form-contact .help-block").detach();

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
                    this.parent.modal.hide();
                    location.reload();
                }
            }
        },
        init: function () {

            this.modal.parent = this;
            this.form.parent = this;

            var $this = this;
            jQuery("#link_2").addClass("active"); //Active link

            jQuery('[data-toggle="tooltip"]').tooltip();

            /**
             * Edit contact handler
             */
            jQuery('a.edit-trigger').on('click', function (event) {
                event.preventDefault();
                $this.modal.title = jQuery(this).data("modal-title");
                $this.form.action = jQuery(this).attr("href");
                $this.modal.load(jQuery(this).attr("href"));
            });
            
            /**
             * Add contact handler
             */
            jQuery('a[href="#form-contact"]').on('click', function (event) {
                event.preventDefault();
                $this.modal.title = jQuery(this).data("modal-title");
                $this.form.action = jQuery(this).data("context-handler");
                $this.modal.load(jQuery(this).data("context-handler"));
            });

            /**
             * Toggle search input
             */
            jQuery('[data-command="toggle-search"]').on('click', function (event) {
                event.preventDefault();
                jQuery(this).toggleClass('hide-search');

                if (jQuery(this).hasClass('hide-search')) {
                    jQuery('.c-search').closest('.row').slideUp(100);
                } else {
                    jQuery('.c-search').closest('.row').slideDown(100);
                }
            });

            /**
             * Search handler
             */
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
