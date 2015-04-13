'use strict';

if (typeof jQuery === "undefined") {
    throw new Error("Cordillera needs jQuery");
}

var Cordilelra = function () {
    return {
        init: function () {
            jQuery('[data-toggle=confirmation]').confirmation();
        }
    }
}();

Cordilelra.init();