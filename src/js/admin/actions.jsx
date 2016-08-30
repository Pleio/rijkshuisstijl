export const ADD_CATEGORY = 'ADD_CATEGORY'
export const EDIT_CATEGORY = 'EDIT_CATEGORY'
export const DELETE_CATEGORY = 'DELETE_CATEGORY'

export const ADD_ITEM = 'ADD_ITEM'
export const EDIT_ITEM = 'EDIT_ITEM'
export const DELETE_ITEM = 'DELETE_ITEM'

export function addCategory(title) {
    return {
        type: ADD_CATEGORY,
        title
    }
}

export function editCategory(id, title) {
    return {
        type: EDIT_CATEGORY,
        id,
        title
    }
}

export function deleteCategory(id) {
    return {
        type: DELETE_CATEGORY,
        id
    }
}

export function addItem(categoryId, title, url) {
    return {
        type: ADD_ITEM,
        categoryId,
        title,
        url
    }
}

export function editItem(categoryId, itemId, title, url) {
    return {
        type: EDIT_ITEM,
        categoryId,
        itemId,
        title,
        url
    }
}

export function deleteItem(categoryId, itemId) {
    return {
        type: DELETE_ITEM,
        categoryId,
        itemId
    }
}