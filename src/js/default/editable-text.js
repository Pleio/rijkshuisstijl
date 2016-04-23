var $ = require("jquery");

$(document).ready(function () {
    'use strict';

    var $editableTextTrigger = $('[data-editable-text]');

    $editableTextTrigger.on("click", function(e){
      var $editableBlock = $(this);

      if ( $editableBlock.hasClass('rhs-editable-text--editing') ) {
        
      } else {
        $editableBlock.addClass('rhs-editable-text--editing');
      }
    });

});
