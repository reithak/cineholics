const countryDropDown = document.querySelector('#sign_up_form_country');

if (countryDropDown) {
    countryDropDown.addEventListener('change', function (event) {
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

    countryDropDown.dispatchEvent(new Event("change"));
}