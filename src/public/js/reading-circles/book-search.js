document.querySelector('input#inputIsbn').addEventListener('change', function(event) {
    searchByIsbn(event.target.value)
})

var searchByIsbn = function(isbn) {
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

        document.querySelector('input#inputTitle').setAttribute('value', json.title)
    })
};
