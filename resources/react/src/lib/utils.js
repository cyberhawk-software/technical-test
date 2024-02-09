const getFilteredParams = (page, filters, limit, extras) => {
    let params = { page, limit, filters: [] }

    if (filters) {
        Object.assign(params, { filters })
    }

    if (extras) {
        Object.assign(params, extras)
    }

    return params
}

export { getFilteredParams }
