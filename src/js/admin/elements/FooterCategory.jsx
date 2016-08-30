import React from 'react'
import FooterItem from './FooterItem'
import { addItem, editCategory, deleteCategory } from '../actions'

export default class FooterCategory extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            title: this.props.title,
            editing: false
        }

        this.editCategory = this.editCategory.bind(this)
        this.saveCategory = this.saveCategory.bind(this)
        this.changeTitle = this.changeTitle.bind(this)
        this.addItem = this.addItem.bind(this)
        this.deleteCategory = this.deleteCategory.bind(this)
    }

    componentWillReceiveProps(nextProps) {
        this.setState({
            title: nextProps.title
        })
    }

    addItem(e) {
        this.props.dispatch(addItem(this.props.id, elgg.echo("rijkshuisstijl:new:item"), "http://www.example.com"))
    }

    editCategory(e) {
        this.setState({
            editing: true
        })
    }

    saveCategory(e) {
        e.preventDefault();

        this.props.dispatch(editCategory(this.props.id, this.state.title))
        this.setState({
            editing: false
        })
    }

    changeTitle(e) {
        this.setState({
            title: e.target.value
        })
    }

    deleteCategory(e) {
        this.props.dispatch(deleteCategory(this.props.id))
    }

    render() {
        let items = this.props.items.map((item, i) => (
            <FooterItem key={i} categoryId={this.props.id} id={i} dispatch={this.props.dispatch} {...item} />
        ))

        return (
            <div className="elgg-module elgg-module-inline">
                <div className={this.state.editing ? "elgg-head" : "elgg-head hidden"}>
                    <input name={"params[footer][" + this.props.id + "][title]"} type="text" onChange={this.changeTitle} value={this.state.title}></input>
                    <button onClick={this.saveCategory}>
                        {elgg.echo("rijkshuisstijl:save")}
                    </button>
                </div>
                <div className={!this.state.editing ? "elgg-head" : "elgg-head hidden"}>
                    <div style={{float: "right"}}>
                        <a onClick={this.addItem} className="elgg-button elgg-button-action">
                            {elgg.echo("rijkshuisstijl:add:item")}
                        </a>
                    </div>
                    <h3>
                        {this.state.title}
                        <a onClick={this.editCategory}>
                            <span className="elgg-icon elgg-icon-settings-alt" title={elgg.echo("rijkshuisstijl:edit")}></span>
                        </a>
                        <a onClick={this.deleteCategory}>
                            <span className="elgg-icon elgg-icon-delete" title={elgg.echo("rijkshuisstijl:delete")}></span>
                        </a>

                    </h3>
                </div>
                <div className="elgg-body">
                    <ul>
                        {items}
                    </ul>
                </div>
            </div>
        )
    }
}