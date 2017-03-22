import React from "react"
import classnames from "classnames"
import { Set } from "immutable"
import TagsAutocomplete from "./TagsAutocomplete"

export default class Tags extends React.Component {
    constructor(props) {
        super(props)

        this.state = {
            value: Set(this.props.value),
            inputValue: ""
        }

        this.onChangeInput = (e) => this.setState({inputValue: e.target.value})
        this.onKeyPress = this.onKeyPress.bind(this)
        this.addTag = this.addTag.bind(this)
        this.removeTag = this.removeTag.bind(this)
    }

    onKeyPress(e) {
        const keyCode = e.keyCode ? e.keyCode : e.which
        if (keyCode !== 13) { // Enter button
            return
        }

        e.preventDefault()
        this.addTag(this.state.inputValue)
    }

    addTag(name) {
        let tagName
        if (name) {
            tagName = name
        } else {
            tagName = this.refs.input.value
        }

        if (!tagName) {
            return
        }

        this.setState({
            value: this.state.value.add(tagName),
            showSuggestions: false,
            inputValue: ""
        })

        if (this.props.onChange) {
            this.props.onChange()
        }

        this.refs.input.focus()
    }

    removeTag(tag) {
        this.setState({
            value: this.state.value.delete(tag)
        })
    }

    render() {
        const showTags = this.state.value.map((tag, i) => (
            <div key={i} className="tag">
                {tag}
                <div className="tag__remove" onClick={() => this.removeTag(tag)} />
            </div>
        ))

        let label
        if (this.props.label) {
            label = (
                <label className="form__label">{this.props.label}</label>
            )
        }

        let autocomplete
        if (this.props.autocomplete !== false) {
            autocomplete = (
                <TagsAutocomplete q={this.state.inputValue} addTag={this.addTag} />
            )
        }

        return (
            <div>
                {label}
                <input
                    ref="input"
                    name="tags-input"
                    type={this.props.type}
                    className="rhs-form__input"
                    placeholder="Voeg tags toe door op enter te drukken"
                    autoComplete="off"
                    onKeyPress={this.onKeyPress}
                    onChange={this.onChangeInput}
                    value={this.state.inputValue}
                />
                {autocomplete}
                <div className="tags">{showTags}</div>
                <input type="hidden" name={this.props.name} value={this.state.value.toJS().join(",")} />
            </div>
        )
    }
}