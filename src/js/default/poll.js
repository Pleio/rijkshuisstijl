var $ = require("jquery");

(function () {
    'use strict';

    var $button = $('[data-toggle-poll]');
    $button.on('click', function(e) {
        e.preventDefault();
        var $container = $(this).closest(".rhs-card-poll-container");
        $container.find('[data-poll-results]').toggle()
        $container.find('[data-poll]').toggle()
    });
})();