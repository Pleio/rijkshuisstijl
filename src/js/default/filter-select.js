var $ = require("jquery");

(function () {
    'use strict';

    var $input = $('[data-filter-select]');
    $input.on('change', function() {
        this.form.submit();
    });
})();