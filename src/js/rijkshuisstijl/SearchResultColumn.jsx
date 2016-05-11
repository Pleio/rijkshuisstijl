'use strict'

import moment from 'moment';
import React from 'react';

export default class SearchResultColumn extends React.Component {
    render() {
        var title = (
            <h4 className="rhs-nav-result-list__title">
                { elgg.echo("item:object:" + this.props.subtype) }
            </h4>
        );

        var results = this.props.results.map(function(result) {
            var timeCreated = moment(result.time_created).format("D MMM");
            return (
                <a key={ result.guid } href={ result.url } className="rhs-nav-result-list__item">
                    <span>{ timeCreated } </span>
                    { result.title }
                </a>
            )
        })

        return (
            <div className="rhs-nav-result-list rhs-col-sm-6">
                { title }
                { results }
                <a href={ "/search?q=" + this.props.q + "&search_type=entities&entity_type=object&entity_subtype=" + this.props.subtype } title="Bekijk alle resultaten" className="rhs-main-nav-results__submit">
                    Bekijk alle resultaten
                </a>
            </div>
        )
    }
}