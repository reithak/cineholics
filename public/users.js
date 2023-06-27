const deleteButtons = document.querySelectorAll('.delete-user');
const approveButtons = document.querySelectorAll('.approve-user');

deleteButtons.forEach((deleteButton)=> {
    deleteButton.addEventListener('click', function (event) {
        let button = event.target;

        Swal.fire({
            title: 'Caution!',
            text: 'Are you sure you want to delete this user?',
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

approveButtons.forEach((deleteButton)=> {
    deleteButton.addEventListener('click', function (event) {
        let button = event.target;

        fetch(button.dataset.href, {
            method: "POST"
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
    });
});