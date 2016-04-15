var $ = require("jquery");

(function () {
    'use strict';

    var $editableTextTrigger = $('[data-editable-text]');

    $editableTextTrigger.on("click", function(e){
      var $editableBlock = $(this);

      if ( $editableBlock.hasClass('rhs-editable-text--editing') ) {
        // There's no way back: refresh or submit the page
      } else {
        $editableBlock.addClass('rhs-editable-text--editing');
      }
    });

})();
