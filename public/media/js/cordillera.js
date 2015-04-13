'use strict';

if (typeof jQuery === "undefined") {
    throw new Error("Cordillera needs jQuery");
}

jQuery(document).ready(function () {
    jQuery('[data-toggle=confirmation]').confirmation();
});
