const fetchButton = document.querySelector('#fetch-movies');
const deleteMovieButton = document.querySelector('#delete-movie');
const editMovieButton = document.querySelector('#edit-movie');
const bookMovieButton = document.querySelector('#book-movie');

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

if (bookMovieButton) {
    console.log(bookMovieButton)
    bookMovieButton.onclick = function (event) {
        let button = event.target;
        
        if (button.getAttribute('disabled')) {
            Swal.fire({
                title: 'Hi there!',
                text: 'You must be signed in to book a movie, please sign in first.',
                icon: 'info',
                confirmButtonText: 'Ok'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = button.dataset.redirect_href;
                }
            });
        } else {
            window.location = button.dataset.href;
        }
    }
}