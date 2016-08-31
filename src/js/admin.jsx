'use strict'
import ReactDOM from 'react-dom'
import React from 'react'
import Footer from './admin/Footer'

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
}

elgg.register_hook_handler('init', 'system', elgg.rijkshuisstijlAdmin.init);