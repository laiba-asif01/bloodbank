<script>
    document.addEventListener("DOMContentLoaded", function () {
        const baseUrl = "http://localhost:8080";

        const countrySelect = document.getElementById("country_id");
        const stateSelect = document.getElementById("state_id");
        const citySelect = document.getElementById("city_id");
        const bloodSelect = document.getElementById("blood_group");
        const searchButton = document.getElementById("search_btn");
        const donorContainer = document.getElementById("donor_cards");

        // ✅ Function to get URL parameters
        function getUrlParams() {
            const params = new URLSearchParams(window.location.search);
            return {
                blood_group: params.get('blood_group'),
                country_id: params.get('country_id'),
                state_id: params.get('state_id'),
                city_id: params.get('city_id')
            };
        }

        // ✅ Function to perform search with current filters
        function performSearch() {
            const bloodGroup = bloodSelect.value;
            const countryId = countrySelect.value;
            const stateId = stateSelect.value;
            const cityId = citySelect.value;

            console.log('Searching with:', { bloodGroup, countryId, stateId, cityId });

            // Build query parameters - only include valid values
            const queryParams = {};

            if (bloodGroup && bloodGroup !== 'Select Group' && bloodGroup !== 'Select Blood Group') {
                queryParams.blood_group = bloodGroup;
            }
            if (countryId && countryId !== 'Select Country') {
                queryParams.country_id = countryId;
            }
            if (stateId && stateId !== 'Select State' && stateId !== 'Loading states...') {
                queryParams.state_id = stateId;
            }
            if (cityId && cityId !== 'Select City' && cityId !== 'Loading cities...') {
                queryParams.city_id = cityId;
            }

            // If no filters are selected, load all donors
            if (Object.keys(queryParams).length === 0) {
                fetch(`${baseUrl}/api/donorapi`)
                    .then(res => res.json())
                    .then(data => renderDonors(data))
                    .catch(err => console.error("Error loading all donors:", err));
                return;
            }

            // Convert to URLSearchParams
            const query = new URLSearchParams(queryParams);

            console.log('API Call:', `${baseUrl}/api/donorapi/filter?${query.toString()}`);

            fetch(`${baseUrl}/api/donorapi/filter?${query.toString()}`)
                .then(res => {
                    if (!res.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return res.json();
                })
                .then(data => {
                    console.log('API Response:', data);
                    renderDonors(data);
                })
                .catch(err => {
                    console.error("Error filtering donors:", err);
                    // Fallback to showing all donors if filter fails
                    fetch(`${baseUrl}/api/donorapi`)
                        .then(res => res.json())
                        .then(data => renderDonors(data))
                        .catch(err2 => console.error("Error loading all donors:", err2));
                });
        }

        // ✅ Function to render donor cards
        function renderDonors(data) {
            donorContainer.innerHTML = "";

            if (!data || data.length === 0) {
                donorContainer.innerHTML = `<p class='text-center text-gray-600 col-span-3'>No donors found matching your criteria.</p>`;
                return;
            }

            data.forEach(donor => {
                const donorImage = donor.gender?.toLowerCase() === "female"
                    ? `${baseUrl}/assets/images/img_5.png`
                    : `${baseUrl}/assets/images/img_6.png`;

                const card = `
                <div class="bg-white rounded-md shadow-md p-4 flex gap-4 items-center border hover:-translate-y-1 hover:shadow-xl transition-transform">
                    <img src="${donorImage}" class="w-[126px] h-[118px] mx-auto rounded-md object-cover">
                    <div>
                        <h2 class="font-semibold text-gray-800">${donor.full_name || 'Unknown Donor'}</h2>
                        <p class="text-sm text-gray-500 mt-1"><i class="fas fa-map-marker-alt mr-2"></i>${donor.city_name || 'N/A'}, ${donor.state_name || ''}, ${donor.country_name || ''}</p>
                        <p class="text-sm text-gray-500 mt-1"><i class="fas fa-tint mr-2"></i>Blood Group: <span class="font-semibold">${donor.blood_group || 'N/A'}</span></p>
                        <a href="${baseUrl}/donor_profile?id=${donor.id}"
                           class="text-red-600 text-sm font-semibold underline mt-2 inline-block">
                           View Profile
                        </a>
                    </div>
                </div>
            `;
                donorContainer.insertAdjacentHTML('beforeend', card);
            });
        }

        // ✅ Initialize filters from URL parameters
        function initializeFromURL() {
            const urlParams = getUrlParams();
            console.log('URL Parameters:', urlParams);

            // Set blood group if present
            if (urlParams.blood_group) {
                bloodSelect.value = urlParams.blood_group;
            }

            // Load countries first, then set country if present
            loadCountries().then(() => {
                if (urlParams.country_id) {
                    countrySelect.value = urlParams.country_id;
                    // Load states for this country
                    loadStates(urlParams.country_id).then(() => {
                        if (urlParams.state_id) {
                            stateSelect.value = urlParams.state_id;
                            // Load cities for this state
                            loadCities(urlParams.state_id).then(() => {
                                if (urlParams.city_id) {
                                    citySelect.value = urlParams.city_id;
                                }
                                // Perform search after all filters are set
                                setTimeout(() => performSearch(), 500);
                            });
                        } else {
                            setTimeout(() => performSearch(), 500);
                        }
                    });
                } else {
                    setTimeout(() => performSearch(), 500);
                }
            });
        }

        // ✅ Load countries
        function loadCountries() {
            return fetch(`${baseUrl}/api/countriesapi`)
                .then(response => response.json())
                .then(data => {
                    countrySelect.innerHTML = '<option selected disabled>Select Country</option>';
                    data.forEach(country => {
                        const option = document.createElement("option");
                        option.value = country.id;
                        option.textContent = country.name;
                        countrySelect.appendChild(option);
                    });
                })
                .catch(err => console.error("Error loading countries:", err));
        }

        // ✅ Load states
        function loadStates(countryId) {
            stateSelect.innerHTML = '<option selected disabled>Select State</option>';
            citySelect.innerHTML = '<option selected disabled>Select City</option>';

            return fetch(`${baseUrl}/api/statesapi/byCountry/${countryId}`)
                .then(response => response.json())
                .then(data => {
                    if (!Array.isArray(data)) {
                        stateSelect.innerHTML = '<option disabled>No states found</option>';
                        return;
                    }
                    stateSelect.innerHTML = '<option selected disabled>Select State</option>';
                    data.forEach(state => {
                        const option = document.createElement("option");
                        option.value = state.id;
                        option.textContent = state.name;
                        stateSelect.appendChild(option);
                    });
                })
                .catch(err => console.error("Error loading states:", err));
        }

        // ✅ Load cities
        function loadCities(stateId) {
            citySelect.innerHTML = '<option selected disabled>Select City</option>';

            return fetch(`${baseUrl}/api/citiesapi/byState/${stateId}`)
                .then(response => response.json())
                .then(data => {
                    if (!Array.isArray(data)) {
                        citySelect.innerHTML = '<option disabled>No cities found</option>';
                        return;
                    }
                    citySelect.innerHTML = '<option selected disabled>Select City</option>';
                    data.forEach(city => {
                        const option = document.createElement("option");
                        option.value = city.id;
                        option.textContent = city.name;
                        citySelect.appendChild(option);
                    });
                })
                .catch(err => console.error("Error loading cities:", err));
        }

        // ✅ Event listeners for dropdown changes
        countrySelect.addEventListener("change", function () {
            const countryId = this.value;
            if (countryId && countryId !== 'Select Country') {
                loadStates(countryId);
            } else {
                stateSelect.innerHTML = '<option selected disabled>Select State</option>';
                citySelect.innerHTML = '<option selected disabled>Select City</option>';
            }
        });

        stateSelect.addEventListener("change", function () {
            const stateId = this.value;
            if (stateId && stateId !== 'Select State') {
                loadCities(stateId);
            } else {
                citySelect.innerHTML = '<option selected disabled>Select City</option>';
            }
        });

        // ✅ Handle search button click
        searchButton.addEventListener("click", performSearch);

        // ✅ Initialize the page
        initializeFromURL();
    });
</script>