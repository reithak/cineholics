const fetchButton = document.querySelector('#fetch-movies');
const deleteMovieButton = document.querySelector('#delete-movie');
const editMovieButton = document.querySelector('#edit-movie');

if (fetchButton) {
    fetchButton.onclick = function (event) {
        let button = event.target;
    
        fetch(button.dataset.url, {
            method: "GET"
        })
        .then(res => res.json())
        .then(response => {
            location.reload();
        })
        .catch(err => {
        });
    }
}

if (deleteMovieButton) {
    deleteMovieButton.onclick = function (event) {
        let button = event.target;
    
        fetch(button.dataset.href, {
            method: "DELETE"
        })
        .then(res => res.json())
        .then(response => {
            location.reload();
        })
        .catch(err => {
        });
    }
}

if (editMovieButton) {
    editMovieButton.onclick = function (event) {
        let button = event.target;
    
        fetch(button.dataset.href, {
            method: "GET"
        })
        .then(res => res.json())
        .then(response => {
            location.reload();
        })
        .catch(err => {
        });
    }
}