import React from 'react'
import { connect } from 'react-redux'
import FooterCategory from './FooterCategory'
import { addCategory } from '../actions'

class FooterList extends React.Component {
    constructor(props) {
        super(props)

        this.addItem = this.addItem.bind(this)
    }

    addItem(e) {
        this.props.dispatch(addCategory(elgg.echo("rijkshuisstijl:new:category")))
    }

    render() {
        let categories = this.props.footer.map((category, i) => (
            <FooterCategory id={i} key={i} dispatch={this.props.dispatch} {...category} />
        ))

        return (
            <div>
                <ul>
                    {categories}
                </ul>
                <a onClick={this.addItem} className="elgg-button elgg-button-submit">
                    {elgg.echo("rijkshuisstijl:add:category")}
                </a>
            </div>
        )
    }
}

const mapStateToProps = (state) => {
    return {
        footer: state.footer
    }
}

export default connect(mapStateToProps)(FooterList)