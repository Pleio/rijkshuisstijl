var $ = require("jquery");

(function () {
    'use strict';

    $('[data-datepicker]').on('change', function(e) {
        var fieldName = $(this).data('datepicker');

        var newValue = [];
        $('[data-datepicker="' + fieldName + '"]').each(function() {
             newValue.push($(this).val())
        });

        $('input[name="' + fieldName + '"]').val(newValue.join('-'));
    });

})();