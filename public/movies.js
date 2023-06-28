const fetchButton = document.querySelector('#fetch-movies');
const applyFiltersButton = document.querySelector('#apply-filters');
const deleteMovieButtons = document.querySelectorAll('.delete-movie');
const bookMovieButtons = document.querySelectorAll('.book-movie');

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

if (applyFiltersButton) {
    applyFiltersButton.onclick = function (event) {
        let button = event.target;

        let genreFilter = document.querySelector('[name="genre"]');
        let yearFilter = document.querySelector('[name="year"]');
        let movieNameFilter = document.querySelector('[name="movie-name"]');

        const params = new URLSearchParams({
            genre: genreFilter.value,
            year: yearFilter.value,
            movieName: movieNameFilter.value,
        });

        const regex = /\?.*/i;

        url = window.location.href.replace(regex, '');

        window.location = url + "?" + params.toString();
    }
}

deleteMovieButtons.forEach((deleteMovieButton)=> {
    deleteMovieButton.addEventListener('click', function (event) {
        let button = event.target;

        Swal.fire({
            title: 'Caution!',
            text: 'Are you sure you want to delete this movie?',
            icon: 'warning',
            denyButtonText: 'No go back!',
            confirmButtonText: 'Yes!',
            showDenyButton: true,
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(button.dataset.href, {
                    method: "DELETE"
                })
                .then(res => res.json())
                .then(response => {
                    if (response.errors.length) {
                        response.errors.forEach((error)=> {
                            Swal.fire(
                                'Warning!',
                                error,
                                'warning'
                            )
                        });
                    } else {
                        location.reload();
                    }
                })
                .catch(err => {
                });
            }
        })
    });
});

bookMovieButtons.forEach((bookMovieButton)=> {
    bookMovieButton.addEventListener('click', function (event) {
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
            })
        } else {
            window.location = button.dataset.href;
        }
    });
});
