var $ = require("jquery");

(function () {
    'use strict';

    var $input = $('[data-lang-select]');
    $input.on('change', function(e) {
        elgg.action('rijkshuisstijl/profile/setprofilefield', {
          data: {
            username: gUsername,
            name: 'language',
            value: '"' + $input.val() + '"'
          },
          success: function (wrapper) {
            location.reload();
          }
        });
    });
})();