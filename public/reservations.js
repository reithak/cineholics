const deleteButtons = document.querySelectorAll('.delete-reservation');
const cancelButtons = document.querySelectorAll('.cancel-reservation');

deleteButtons.forEach((deleteButton)=> {
    deleteButton.addEventListener('click', function (event) {
        let button = event.target;

        Swal.fire({
            title: 'Caution!',
            text: 'Are you sure you want to delete this reservation?',
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

cancelButtons.forEach((cancelButton)=> {
    cancelButton.addEventListener('click', function (event) {
        let button = event.target;

        Swal.fire({
            title: 'Caution!',
            text: 'Are you sure you want to cancel this reservation?',
            icon: 'warning',
            denyButtonText: 'No go back!',
            confirmButtonText: 'Yes!',
            showDenyButton: true,
        }).then((result) => {
            if (result.isConfirmed) {
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
            }
        })
    });
});