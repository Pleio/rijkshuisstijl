'use strict'
import ReactDOM from 'react-dom'
import React from 'react'

import SearchResults from './SearchResults'
import CommentList from './components/CommentList'
import ApolloClient, { createNetworkInterface }  from 'apollo-client';
import { ApolloProvider } from 'react-apollo';
import { readCookie } from './lib/cookies';
import moment from "moment";
import fetch from 'isomorphic-fetch'
import { polyfill } from 'es6-promise'

polyfill()

moment.locale(elgg.config.language);

const networkInterface = createNetworkInterface('/graphql', {
    credentials: 'same-origin',
    shouldBatch: true,
    headers: {
        'X-CSRF-Token': readCookie('CSRF_TOKEN')
    }
})

const client = new ApolloClient({
    networkInterface,
    dataIdFromObject: o => {
        if (o.guid) {
            return o.guid
        } else if (o.id) {
            return "access:" + o.id
        } else {
            return null
        }
    }
})

function rijkshuisstijl_init() {
    var navResults = document.getElementById('main-nav-results');
    if (navResults) {
        ReactDOM.render(
          <SearchResults />,
          navResults
        );
    }

    var comments = $("[data-comments]").get(0);
    if (comments) {
        var guid = $(comments).data("guid");

        ReactDOM.render(
            <ApolloProvider client={client}>
                <CommentList guid={guid} />
            </ApolloProvider>,
            comments
        )
    }
}

elgg.register_hook_handler("init", "system", rijkshuisstijl_init);