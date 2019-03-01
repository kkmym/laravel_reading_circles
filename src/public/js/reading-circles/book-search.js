document.querySelector('input#inputIsbn').addEventListener('change', function(event) {
    searchByIsbn(event.target.value)
})

var searchByIsbn = function(isbn) {
    isbn = normalizeIsbn(isbn)
    if (!isbn) {
        return
    }

    setNormarizedIsbnVal(isbn)

    let searchApiUrl = document.querySelector('input#inputSearchUrl').getAttribute('data-search-url')
    fetch(searchApiUrl + "?isbn=" + isbn)
    .then(function(response) {
        return response.json()
    })
    .then(function(json) {
        if (Object.keys(json).length == 0) {
            return
        } else if (!('title' in json)) {
            return
        }

        document.querySelector('input#inputTitle').value = json.title
    })
};

var normalizeIsbn = function(isbn) {
    let normalized = isbn.replace(/[^0-9]/g, '')
    if (!normalized.match(/^[0-9]{13}$/)) {
        return null
    }

    return normalized
}

var setNormarizedIsbnVal = function(isbn) {
    console.log('here. ' + isbn)
    document.querySelector('input#inputIsbn').value = isbn
}
