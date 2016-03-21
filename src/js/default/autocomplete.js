(function () {
    'use strict';


    /*!
     *  Autocomplete
     */
    var $input = $('input.rhs-autocomplete-input');

    var $autoComplete = $("[data-autocomplete]");
    var $autoCompleteInput = $("[data-autocomplete-input]");

    // Add typing class when pressing a key inside an input
    $input.on('input', function() {
        $(this).closest('[data-autocomplete]').addClass('typing');
    });

    // Add typing class when pressing a key inside an input
    $autoCompleteInput.on('click', function() {
        var thisVal = $(this).val();
        if(thisVal.length > 0) {
            $('.rhs-autocomplete').addClass('typing open');
            $autoComplete.addClass('open');
            getSearchResults();
        }
    });

    // Do a search every 250ms after the last keystroke
    $input.on("input", debounce(getSearchResults, 250));

    function getSearchResults() {
        var $searchInput = $(this),
            searchInputVal = $searchInput.val(),
            $autocomplete = $searchInput.parent().find('.rhs-autocomplete'),
            $overlayResultsContainer = $("#overlay-search-results"),
            $overlayShowAllButton = $("#overlay-show-all"),
            searchRequestPath = '/index.php/tools/search',
            searchType = 'home',
            maxAutoResults = 4;

        if ($searchInput.attr('id') === "nav-search") {
            searchType = 'nav';
            searchRequestPath = '/index.php/tools/search_nav';
        }

        var searchRequest = $.ajax({ url: searchRequestPath, data: { terms: searchInputVal }});

        searchRequest.done(function (response) {
                var searchResults = '';

                if (searchType === "home") {
                    // Home search box
                    if (response.aangiftehulp && response.aangiftehulp.results) {
                        var resultCount = 1;
                        $.each(response.aangiftehulp.results, function (resultKey, resultData) {
                            if (resultCount <= maxAutoResults) {

                                if (resultData.highlight.title) {
                                    var resultHtml = "<a href='" + resultData.source.path + "' title='" + resultData.highlight.title[0] + "'>" + resultData.highlight.title[0] + "</a>";
                                } else {
                                    var resultHtml = "<a href='" + resultData.source.path + "' title='" + resultData.source.title + "'>" + resultData.source.title + "</a>";
                                }

                                //var resultHtml = "<a href='" + resultData.source.path + "' title='" + resultData.source.title + "'>" + resultData.source.title + "</a>";
                                searchResults += resultHtml;
                            }

                            resultCount++;
                        });

                        $autocomplete.addClass('open');
                        $autocomplete.find('.rhs-autocomplete__results').html(searchResults);
                        $searchInput.closest('[data-autocomplete]').removeClass('typing').addClass("open");
                    } else {
                        $searchInput.closest('[data-autocomplete]').removeClass('typing open');
                        $autocomplete.removeClass('open');
                    }
                } else {
                    // Nav search
                    var totalResults = 0;
                    if (response.aangiftehulp && response.aangiftehulp.results) {
                        $overlayResultsContainer.html(response.aangiftehulp.results);
                        totalResults = response.aangiftehulp.total;
                    }
                    $overlayShowAllButton.html('Bekijk alle resultaten ('+totalResults+')');
                }
            })
            .fail(function () {
                //console.log('Something went wrong');
            })
            .always(function () {
                // Clear running request variable
                searchRequest = null;
            });
    }


    /*!
     *  If clicked outside the autocomplete parent close the overlay and dropdown
     */
    $(document).mouseup(function (e) {
        if (!$autoComplete.is(e.target)
            && $autoComplete.has(e.target).length === 0 ) {
            $('.rhs-autocomplete').removeClass('typing open');
            $autoComplete.removeClass('open');
        }
    });

    /*!
     *  Regular debounce function
     */
    function debounce(func, wait, immediate) {
        var timeout;
        return function() {
            var context = this, args = arguments;
            var later = function() {
                timeout = null;
                if (!immediate) func.apply(context, args);
            };
            var callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) func.apply(context, args);
        };
    }

})();