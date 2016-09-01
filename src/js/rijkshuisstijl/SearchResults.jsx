'use strict'

import React from 'react';
import $ from 'jquery';
import SearchResultColumn from './SearchResultColumn';

var timeoutId;

export default class SearchResults extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            q: '',
            results: {
                question: [],
                video: [],
                page: []
            }
        };

        this.onSearchChange = this.onSearchChange.bind(this);
        this.initiateSearch = this.initiateSearch.bind(this);
        this.processSearchResult = this.processSearchResult.bind(this);

        $('#nav-search').on('keyup', this.onSearchChange);
    }

    onSearchChange(e) {
        this.setState({
            q: e.target.value
        });

        clearTimeout(timeoutId);
        timeoutId = setTimeout(function() {
            this.initiateSearch();
        }.bind(this), 100);
    }

    initiateSearch() {
        elgg.action('rijkshuisstijl/search', {
            data: { q: this.state.q },
            success: this.processSearchResult
        });
    }

    processSearchResult(result) {
        this.setState({
            results: result.output
        });
    }

    render() {
        var j = 0;
        var result = Object.keys(this.state.results).map(function(type) {
            if (this.state.results[type].length > 0) {
                return (
                    <SearchResultColumn key={type} q={this.state.q} type={type} results={this.state.results[type]} />
                );
            }
        }.bind(this))

        return ( <div> {result} </div> );
    }
}