import React from "react"
import TinyMCE from "./TinyMCE"
import moment from "moment"
import Votes from "./Votes"

const TINYMCE_CONFIG = {
    menu: {},
    menubar: false,
    plugins: "lists,spellchecker,fullscreen,paste,image,link,placeholder,code,textcolor",
    toolbar: "bold,italic,forecolor,numlist,bullist,link,image",
    relative_urls: false,
    media_strict: false,
    document_base_url: elgg.config.wwwroot,
    content_css: "/css/rijkshuisstijl.css",
    image_advtab: false,
    browser_spellcheck: true
}

export default class Comment extends React.Component {
    constructor(props) {
        super(props)

        this.state = {
            editing: false,
            description: this.props.entity.description || ""
        }

        this.changeDescription = (e) => { this.setState({description: e.target.value}) }
        this.toggleEdit = (e) => {
            e.preventDefault()
            this.setState({editing: !this.state.editing})
        }
    }

    componentWillReceiveProps(nextProps) {
        this.setState({
            description: nextProps.entity.description
        })
    }

    onRemove(e) {
        if (!confirm(elgg.echo("question:areyousure"))) {
            e.preventDefault();
        }
    }

    render() {
        let comment = (
            <div className="comment">
                <Votes entity={this.props.entity} />
                <div className="comment__top">
                    <a href={this.props.entity.owner.url}
                       title="Bekijk profiel"
                       style={{"backgroundImage": "url(" + this.props.entity.owner.icon + ")"}}
                       className="comment__picture">
                    </a>
                    <div className="comment__justify">
                        <a href={this.props.entity.owner.url} title="Bekijk profiel" className="comment__name">
                            {this.props.entity.owner.name}
                        </a>
                        <div className="comment__date">
                            {moment(this.props.entity.timeCreated).format("LLL")}
                        </div>
                        <div className="comment__edit" onClick={this.toggleEdit} style={{cursor:"pointer"}}>
                            Wijzig
                        </div>
                    </div>
                </div>
                <div className="comment__body" dangerouslySetInnerHTML={{__html: this.props.entity.description}}></div>
            </div>
        )

        if (this.state.editing) {
            comment = (
                <div className="comment-edit__wrapper ___is-open" style={{maxHeight:"350px"}}>
                    <form className="comment-edit" method="POST" action={"/" + elgg.security.addToken("action/comment/save")}>
                        <div title="Terug naar forum" className="comment-edit__close" onClick={this.toggleEdit}></div>
                            <h3 className="comment-edit__title">Bewerk antwoord</h3>
                                <div className="comment-edit__top">
                                    <img src={this.props.entity.owner.icon} className="comment-edit__image" />
                                    <div href={this.props.entity.owner.url} title="Bekijk profiel" className="comment-edit__name">
                                        {this.props.entity.owner.name}
                                    </div>
                                </div>
                                <TinyMCE name="generic_comment" config={TINYMCE_CONFIG} className="comment-edit__content" onChange={this.changeDescription} content={this.state.description} />
                                <div className="comment-edit__bottom rhs-form__actions">
                                    <a className="rhs-button__underline" href={"/" + elgg.security.addToken("action/comment/delete?guid=" + this.props.entity.guid)} onClick={this.onRemove}>
                                        Verwijder antwoord
                                    </a>
                                    <button className="rhs-button comment-edit__cancel" onClick={this.toggleEdit}>
                                        Annuleer
                                    </button>
                                <button type="submit" className="rhs-button rhs-button--primary">
                                    Opslaan
                                </button>
                        </div>
                        <input type="hidden" name="comment_guid" value={this.props.entity.guid} />
                    </form>
                </div>
            )
        }

        return (
            <div className="comment-container">
                {comment}
            </div>
        )
    }
}