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
        
        var url = parser.pathname;
        if (url.substr(0, 1) != "/") {
            url = "/" + url;
        }

        window.location.href = url + "?offset=" + (page - 1) * 10 + "&limit=10";
    })
})();