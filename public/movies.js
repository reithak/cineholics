const fetchButton = document.querySelector('#fetch-movies');
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
