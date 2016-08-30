import React from 'react'
import { editItem, deleteItem } from '../actions'

export default class FooterItem extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            title: this.props.title,
            url: this.props.url,
            editing: false
        }

        this.changeTitle = this.changeTitle.bind(this)
        this.changeUrl = this.changeUrl.bind(this)
        this.editItem = this.editItem.bind(this)
        this.saveItem = this.saveItem.bind(this)
        this.deleteItem = this.deleteItem.bind(this)
    }

    componentWillReceiveProps(nextProps) {
        this.setState({
            title: nextProps.title,
            url: nextProps.url
        })
    }

    changeTitle(e) {
        this.setState({
            title: e.target.value
        })
    }

    changeUrl(e) {
        this.setState({
            url: e.target.value
        })
    }

    editItem(e) {
        this.setState({
            editing: true
        })
    }

    saveItem(e) {
        e.preventDefault();
        this.props.dispatch(editItem(this.props.categoryId, this.props.id, this.state.title, this.state.url))
        this.setState({
            editing: false
        })
    }

    deleteItem(e) {
        this.props.dispatch(deleteItem(this.props.categoryId, this.props.id))
    }

    render() {
        return (
            <li>
                <div className={!this.state.editing ? "hidden" : ""}>
                    <input name={"params[footer][" + this.props.categoryId + "][items][" + this.props.id + "][title]"} type="text" value={this.state.title} onChange={this.changeTitle}></input>
                    <input name={"params[footer][" + this.props.categoryId + "][items][" + this.props.id + "][url]"} type="text" value={this.state.url} onChange={this.changeUrl}></input>
                    <button onClick={this.saveItem} className="elgg-button elgg-button-action">
                        {elgg.echo("rijkshuisstijl:save")}
                    </button>
                </div>
                <div className={this.state.editing ? "hidden" : ""}>
                    {this.state.title}
                    <a onClick={this.editItem}>
                        <span className="elgg-icon elgg-icon-settings-alt" title={elgg.echo("rijkshuisstijl:edit")}></span>
                    </a>
                    <a onClick={this.deleteItem}>
                        <span className="elgg-icon elgg-icon-delete" title={elgg.echo("rijkshuisstijl:delete")}></span>
                    </a>
                </div>
            </li>
        )
    }
}