var $ = require("jquery");

(function () {
    'use strict';

    $(".rhs-pagination__form").submit(function(e) {
        e.preventDefault();

        var page = parseInt($(".rhs-pagination__input").val())
        if (!page) {
            return
        }

        var parser = document.createElement('a');
        parser.href = window.location.href;

        window.location.href = parser.protocol + "//" + parser.hostname + parser.pathname + "?offset=" + (page - 1) * 10 + "&limit=10";
    })
})();