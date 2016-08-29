var $ = require("jquery");

(function () {
    
    'use strict';

    /**
     * Turns 'select' elements into fancy selectors by looking for [data-selector].
     * It hides 'select' and replaces it with own html that can be styled.
     * On mobile the select 'hovers' transparently above it's replacer to tricker 
     * default behaviour.
     */

    var $dataSelector = $('[data-selector]');

    /**
     * Inits selector. All code lives here, when detected it builds our selector.
     */
    function initSelector() {

        var userAgent = (window.navigator.userAgent||window.navigator.vendor||window.opera),
            isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(userAgent),
            mobileState = isMobile ? ' ___is-mobile' : '',
            isFirefox = /Firefox/i.test(userAgent);
        
        function buildSelector() {
            // Build selector out of each 'select' that is found
            $dataSelector.each(function(index) {
                var selectorClass = '';
                if ( $(this).attr('data-selector') ) {
                    selectorClass = ' ___'+ $(this).attr('data-selector');
                }

                var tabIndex = 0;
                if ( $(this).attr('tabindex') ) {
                    tabIndex = $(this).attr('tabindex');
                }

                $(this).attr('tabindex', -1);
                // Wrap the 'select' element in a new stylable selector
                $(this).wrap('<div class="selector' + mobileState + selectorClass + '"></div>');
                // Fill the selector with a stylable 'select'
                $(this).parent().append('<div class="selector__select" tabindex="'+ tabIndex + '"></div><ul class="selector__options"></ul>');

                var optionSelectedText = '';
                $(this).children('option').each(function() {
                    var optionText = $(this).text(),
                        optionValue = $(this).attr('value'),
                        optionSelected = '';

                    // Check if option is selected
                    if ( $(this).attr('selected') ) {
                        optionSelected = ' ___is-selected';
                        optionSelectedText = optionText;
                    }
                
                    if ( $(this).attr('disabled') ) {
                        optionSelected += ' ___is-disabled';
                        optionValue = '';
                        if (optionSelectedText.length === 0) {
                            optionSelectedText = optionText;
                        }
                    }

                    // Fill the selector with stylable 'options'
                    if ( selectorClass === ' ___reversed' ) {
                        $(this).closest('.selector')
                            .children('.selector__options')
                            .prepend('<li class="selector__option'+ optionSelected +'" data-value="'+ optionValue +'">'+ optionText +'</li>');
                    } else {
                        $(this).closest('.selector')
                            .children('.selector__options')
                            .append('<li class="selector__option'+ optionSelected +'" data-value="'+ optionValue +'">'+ optionText +'</li>');
                    }
                });
                // Set our selector to the disabled ('Make a choice..') or selected text
                $(this).closest('.selector').children('.selector__select').text(optionSelectedText)
            });
        }
        
        buildSelector();
        
        // Original select changes on mobile
        $dataSelector.change(function() {
            $(this).children('option:selected').each(function() {
                $(this).closest('.selector').children('.selector__select').text( $(this).text() );
            });
        });

        // SELECTOR : the "new" select consisting of li's
        var $selector = $('.selector'),
            $selectorSelect = $('.selector__select'),
            $selectorOption = $('.selector__option'),
            openState = '___is-open';


        // Show options
        $selectorSelect.on('click', function(e) {
            e.preventDefault();
            $(this).parent('.selector').addClass(openState);
        });

        // Add and remove a .___has-focus class when selected with keyboard
        $selectorSelect.on('focusin', function(){
            $(this).addClass('___has-focus');
        }).on('focusout', function(){
            $(this).removeClass('___has-focus');
            $(this).parent('.selector').removeClass('___is-open');
        });

        // Remove .___is-open and close our selector when navigating outside of this element
        $(document).mouseup(function(e) {
            // If the target of the click isn't the container nor a descendant of the container
            if ( !$('.selector.___is-open').is(e.target) && $('.selector.___is-open').has(e.target).length === 0 ) {
                $('.selector.___is-open').removeClass(openState);
            }
        });

        // Select option
        $selectorOption.on('click', function(e) {
            e.preventDefault();
            if ( $(this).hasClass('___is-disabled') ) {
                return;
            }
            selectOption(this);
        });
        
        var selectedState = '___is-selected';
        
        /**
         * Actions to perform when selection one of the options with either mouse, keyboard.
         * @param HtmlElement   el      the selected option
         * @param Boolean       close   whether to close after selecting
         */

        function selectOption(el, close) {
            
            var $selectedOption = $(el);
            var selectedOptionText = $selectedOption.text();
            

            console.log($selectedOption);

            // Add selected state
            $selectedOption.siblings().removeClass(selectedState);
            $selectedOption.addClass(selectedState);

            // Update selected value
            $selectedOption.closest('.selector').children('.selector__select').text(selectedOptionText);

            // Select option in the original 'select' element
            var selectedValue = $selectedOption.attr('data-value');
            $selectedOption.closest('.selector').find('select')
                .val(selectedValue)
                .trigger('change');

            // Hide options
            if (close) {
                $selectedOption.closest('.selector').removeClass(openState);
            }

            if ( $(el).attr('data-value').indexOf('.html') > 0 ) {
                var optionLink = $(el).attr('data-value');
                window.location.href = optionLink;
            }
        }
        
        $selector.on('keydown', function(ev) {
            
            if (ev.keyCode === 13) {    // enter key

                var found = $(this).find('.___is-selected');
                selectOption(found, true);
                
            } else if ( ev.keyCode !== 9 && (!ev.metaKey && !ev.altKey && !ev.ctrlKey && !ev.shiftKey) ) {
                
                ev.preventDefault();
                ev.stopPropagation();
                
                var found = $(this).find('.' + selectedState);
                if (found.length ===  0) {
                    found = $(this).find('.selector__option')[0];
                }
                
                if (ev.keyCode === 38) {        // up
                    var prev = $(found).prev('.selector__option:not(.___is-disabled)');
                    if (prev.length) {
                        $(this).find('.selector__option').removeClass(selectedState);
                        $(prev).addClass(selectedState);
                        selectOption(prev);
                    }
                    
                } else if (ev.keyCode === 40) { // down
                    var next = $(found).next('.selector__option:not(.___is-disabled)');
                    if (next.length) {
                        $(this).find('.selector__option').removeClass(selectedState);
                        $(next).addClass(selectedState);
                        selectOption(next);
                    }
                }
            }
            
        });
        
    }
    
    // If selects are found
    if ( $dataSelector.length ) {
        initSelector();
    }
    
})();
