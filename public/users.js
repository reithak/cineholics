const deleteButtons = document.querySelectorAll('.delete-user');
const approveButtons = document.querySelectorAll('.approve-user');
const countryDropDown = document.querySelector('#user_country');
const createUserCountryDropDown = document.querySelector('#sign_up_form_country');

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

if (countryDropDown) {
    countryDropDown.addEventListener('change', function (event) {
        let button = event.target;

        let countryContainer = button.closest('#country-container');

        let selectedCountry = button.value;

        let url = countryContainer.dataset.url.replace('country', selectedCountry);

        let citiesDropdown = document.querySelector('#user_city');

        if (citiesDropdown) {
            while (citiesDropdown.options.length > 0) {
                citiesDropdown.remove(0);
            }
        }

        fetch(url, {
            method: "GET"
        })
        .then(res => res.json())
        .then(response => {
            for (let index in response) {
                let newOption = document.createElement('option');

                let optionText = document.createTextNode(response[index]);

                newOption.appendChild(optionText);
                
                newOption.setAttribute('value', index);

                citiesDropdown.appendChild(newOption);
            }

        })
        .catch(err => {
        });
    });

    countryDropDown.dispatchEvent(new Event("change"));
}

if (createUserCountryDropDown) {
    createUserCountryDropDown.addEventListener('change', function (event) {
        let button = event.target;

        let countryContainer = button.closest('#country-container');

        let selectedCountry = button.value;

        let url = countryContainer.dataset.url.replace('country', selectedCountry);

        let citiesDropdown = document.querySelector('#sign_up_form_city');

        if (citiesDropdown) {
            while (citiesDropdown.options.length > 0) {
                citiesDropdown.remove(0);
            }
        }

        fetch(url, {
            method: "GET"
        })
        .then(res => res.json())
        .then(response => {
            for (let index in response) {
                let newOption = document.createElement('option');

                let optionText = document.createTextNode(response[index]);

                newOption.appendChild(optionText);
                
                newOption.setAttribute('value', index);

                citiesDropdown.appendChild(newOption);
            }

        })
        .catch(err => {
        });
    });

    createUserCountryDropDown.dispatchEvent(new Event("change"));
}