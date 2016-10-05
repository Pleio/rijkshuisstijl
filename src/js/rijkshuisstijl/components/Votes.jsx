import React from "react"
import { graphql } from "react-apollo"
import gql from "graphql-tag"

class Votes extends React.Component {

    constructor(props) {
        super(props)

        this.submitVote = this.submitVote.bind(this)
    }

    submitVote(direction) {
        this.props.mutate({
            variables: {
                input: {
                    clientMutationId: 1,
                    guid: this.props.entity.guid,
                    direction
                }
            }
        })
    }

    render() {
        return (
            <div className="comment__vote">
                <div className="comment__vote-up" onClick={() => this.submitVote("up")}>
                    Stem antwoord omhoog
                </div>
                <div className="comment__points">{this.props.entity.votes}</div>
                <div className="comment__vote-down" onClick={() => this.submitVote("down")}>
                    Stem antwoord omlaag
                </div>
            </div>
        )
    }
}

const voteQuery = gql`
    mutation submitVote($input: voteInput!) {
        vote(input: $input) {
            object {
                guid
                votes
            }
        }
    }
`;

const withQuery = graphql(voteQuery)
export default withQuery(Votes)