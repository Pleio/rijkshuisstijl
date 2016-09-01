'use strict'

import ReactDOM from 'react-dom'
import React from 'react'
import SearchResults from './SearchResults'

function rijkshuisstijl_init() {
    var navResults = document.getElementById('main-nav-results');

    if (navResults) {
        ReactDOM.render(
          <SearchResults />,
          document.getElementById('main-nav-results')
        );
    }
}

elgg.register_hook_handler("init", "system", rijkshuisstijl_init);