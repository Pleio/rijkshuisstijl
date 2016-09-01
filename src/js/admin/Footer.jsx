import React from 'react'
import { Provider } from 'react-redux'
import { createStore, applyMiddleware } from 'redux'
import reducers from './reducers'
import FooterList from './elements/FooterList'
import createLogger from 'redux-logger'

let store;
let loggerMiddleware = createLogger()

if (typeof initialFooterState !== 'undefined') {
    store = createStore(
        reducers,
        {footer: initialFooterState},
        applyMiddleware(loggerMiddleware)
    )
}

export default class Footer extends React.Component {
    render() {
        return (
            <Provider store={store}>
                <div>
                    <p><label>{ elgg.echo("rijkshuisstijl:footer:elements") }</label></p>
                    <FooterList />
                </div>
            </Provider>
        )
    }
}