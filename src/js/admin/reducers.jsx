import { combineReducers } from 'redux'
import { ADD_CATEGORY, EDIT_CATEGORY, DELETE_CATEGORY, ADD_ITEM, EDIT_ITEM, DELETE_ITEM } from './actions'

function footer(state = [], action) {
    switch (action.type) {
        case ADD_CATEGORY:
            return [
                ...state,
                {
                    title: action.title,
                    items: []
                }
            ]
        case EDIT_CATEGORY:
            return state.map((category, i) => {
                if (action.id == i) {
                    return Object.assign({}, category, {
                        title: action.title
                    })
                }

                return category
            })
        case DELETE_CATEGORY:
            return state.filter((category, i) => {
                if (action.id == i) {
                    return false
                } else {
                    return true
                }
            })
        case ADD_ITEM:
            return state.map((category, i) => {
                if (action.categoryId == i) {
                    return Object.assign({}, category, {
                        items: [
                            ...category.items,
                            {
                                title: action.title,
                                url: action.url
                            }
                        ]
                    })
                }

                return category;
            })
        case EDIT_ITEM:
            return state.map((category, i) => {
                if (action.categoryId == i) {
                    let items = category.items.map((item, j) => {
                        if (action.itemId == j) {
                            return {
                                title: action.title,
                                url: action.url
                            }
                        }

                        return item
                    })

                    return Object.assign({}, category, {
                        items
                    })
                }

                return category
            })
        case DELETE_ITEM:
            return state.map((category, i) => {
                if (action.categoryId == i) {
                    let items = category.items.filter((item, j) => {
                        if (action.itemId == j) {
                            return false
                        } else {
                            return true
                        }
                    })

                    return Object.assign({}, category, {
                        items
                    })
                }

                return category
            })
        default:
            return state
    }
}

export default combineReducers({
    footer
})