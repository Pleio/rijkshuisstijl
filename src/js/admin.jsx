'use strict'
import 'core-js/fn/object/assign';

import ReactDOM from 'react-dom'
import React from 'react'
import Footer from './admin/Footer'
import Tags from './rijkshuisstijl/components/Tags'

elgg.provide('elgg.rijkshuisstijlAdmin');
elgg.rijkshuisstijlAdmin.init = function() {
    $('[data-colorpicker]').change(function(e) {
        $(this).parent().parent().find("[data-color]").css("background-color", e.target.value);
    });

    let footer = document.getElementById('rijkshuisstijl-footer');
    if (footer) {
        ReactDOM.render(
          <Footer />,
          footer
        );
    }

    let tags = document.getElementById('rijkshuisstijl-tags');
    if (tags) {
        var value = $(tags).data("value").split(",").filter(function(item) {
            return item
        })

        ReactDOM.render(
            <Tags name="params[tags]" autocomplete={false} value={value} />,
            tags
        )
    }
}

elgg.register_hook_handler('init', 'system', elgg.rijkshuisstijlAdmin.init);