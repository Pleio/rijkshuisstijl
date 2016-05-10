var $ = require("jquery");

(function () {
    'use strict';

    var $navTriggerBtn = $("[data-nav-search-trigger]"),
        $navSearchTarget = $("[data-nav-search]"),
        $navSearchInput = $("[data-nav-search-input]"),
        $navSearchClose = $("[data-nav-search-close]"),
        $navSearchResults = $("[data-nav-results]"),
        $navSearchSubmitButton = $("[data-nav-search-form-submit]"),
        $navSearchForm = $("[data-nav-search-form]"),
        $body = $("body"),
        toggleClass = $navSearchTarget.data("nav-search");

    $navTriggerBtn.on("click", function(e){
        e.preventDefault();
        $body.toggleClass(toggleClass);
        $navSearchInput.focus();
        $navSearchResults.addClass(toggleClass);
    });

    $navSearchClose.on("click", function(e){
        e.preventDefault();
        $body.removeClass(toggleClass);
        $navSearchResults.removeClass(toggleClass);
        $navSearchInput.val("");
    });

    $navSearchSubmitButton.on("click", function(e) {
        e.preventDefault();
        $navSearchForm.submit();
    });

    function displaySearchResults(result) {
        console.log(result);
    }

    function initiateSearch(q) {
        elgg.action('rijkshuisstijl/search', {
            data: {
                q
            },
            success: displaySearchResults
        });
    }

    var timeoutId;
    $navSearchInput.on("keyup", function(e) {
        var q = $(this).val();

        clearTimeout(timeoutId);
        timeoutId = setTimeout(function() {
            initiateSearch(q);
        }, 250);
    });

    $(document).mouseup(function (e)
    {
        var container = $navSearchTarget;

        if (!container.is(e.target)
            && container.has(e.target).length === 0 && !$navSearchResults.is(e.target) && $navSearchResults.has(e.target).length === 0 )
        {
            if($body.hasClass(toggleClass)){
                $body.removeClass(toggleClass);
                $navSearchResults.removeClass(toggleClass);
                $navSearchInput.val("");
            }
        }
    });

})();
