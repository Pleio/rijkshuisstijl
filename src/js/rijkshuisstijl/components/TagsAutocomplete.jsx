import React from "react"
import { graphql } from "react-apollo"
import gql from "graphql-tag"

class TagsAutoComplete extends React.Component {
    render() {
        const { tagsAutocomplete } = this.props.data


        if (!tagsAutocomplete || tagsAutocomplete.length === 0) {
            return (
                <div className="autosuggest" />
            )
        }

        const suggestions = tagsAutocomplete.map((hit, i) => (
            <li key={i} onClick={() => this.props.addTag(hit)}>{hit}</li>
        ))

        return (
            <div className="autosuggest ___is-visible">
                <ul className="autosuggest__list">
                    {suggestions}
                </ul>
            </div>
        )
    }
}

const Query = gql`
    query tagsField($q: String!) {
        tagsAutocomplete(q: $q)
    }
`

export default graphql(Query)(TagsAutoComplete)