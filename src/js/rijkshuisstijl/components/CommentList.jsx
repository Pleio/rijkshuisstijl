import React from "react"
import Comment from "./Comment"
import { graphql } from "react-apollo"
import gql from "graphql-tag"

class CommentList extends React.Component {
    render() {
        let comments
        if (this.props.data.entity) {
            comments = this.props.data.entity.comments.map((comment) => (
                <Comment key={comment.guid} entity={comment} />
            ))
        }

        let loadMore = (
            <div className="button__text article-comments__more">Alle reacties</div>
        )

        return (
            <div className="article-comments">
                {comments}
            </div>
        )
    }
}

const QUERY = gql`
    query CommentList($guid: String!) {
        entity(guid: $guid) {
            ...commentsFragment
        }
    }

    fragment commentsFragment on Object {
        guid
        status
        comments {
            guid
            description
            timeCreated
            votes
            owner {
                name
                icon
                url
            }
        }
    }
`;

export default graphql(QUERY, {
    options: (ownProps) => {
        return {
            variables: {
                guid: ownProps.guid
            }
        }
    }
})(CommentList);