'use strict'

import moment from 'moment';
import React from 'react';

export default class SearchResultColumn extends React.Component {
    render() {
        var title = (
            <h4 className="rhs-nav-result-list__title">
                { elgg.echo("item:" + this.props.type) }
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

        var type = this.props.type.split(":");

        return (
            <div className="rhs-nav-result-list rhs-col-sm-6">
                { title }
                { results }
                <a href={ "/search?q=" + this.props.q + "&search_type=entities&entity_type=" + type[0] + "&entity_subtype=" + type[1] } title="Bekijk alle resultaten" className="rhs-main-nav-results__submit">
                    Bekijk alle resultaten
                </a>
            </div>
        )
    }
}