<script>
    document.addEventListener("DOMContentLoaded", function () {
        //const baseUrl = "<?php //= base_url() ?>//"; // your project base URL

        const baseUrl = "http://localhost:8080"; // use plain URL locally


        const countrySelect = document.getElementById("country_id");
        const stateSelect = document.getElementById("state_id");
        const citySelect = document.getElementById("city_id");

        // 🔹 1. Load Countries on Page Load
        fetch(`${baseUrl}/api/countriesapi`)
            .then(response => response.json())
            .then(data => {
                countrySelect.innerHTML = '<option selected disabled>Select Country</option>';
                data.forEach(country => {
                    const option = document.createElement("option");
                    option.value = country.id;
                    option.textContent = `${country.name}`;
                    countrySelect.appendChild(option);
                });
            })
            .catch(err => console.error("Error loading countries:", err));

        // 🔹 2. When Country Selected → Load States
        countrySelect.addEventListener("change", function () {
            const countryId = this.value;
            stateSelect.innerHTML = '<option selected disabled>Loading states...</option>';
            citySelect.innerHTML = '<option selected disabled>Select City</option>';

            fetch(`${baseUrl}/api/statesapi/byCountry/${countryId}`)
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
        });

        // 🔹 3. When State Selected → Load Cities
        stateSelect.addEventListener("change", function () {
            const stateId = this.value;
            citySelect.innerHTML = '<option selected disabled>Loading cities...</option>';

            fetch(`${baseUrl}/api/citiesapi/byState/${stateId}`)
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
        });

    });

</script>
<script>
    // Home page search functionality
    document.addEventListener('DOMContentLoaded', function () {
        const searchButton = document.getElementById('homeSearchBtn');

        if (searchButton) {
            searchButton.addEventListener('click', function (e) {
                e.preventDefault();

                const bloodGroup = document.getElementById('blood_group').value;
                const countryId = document.getElementById('country_id').value;
                const stateId = document.getElementById('state_id').value;
                const cityId = document.getElementById('city_id').value;

                // Validate required fields
                if (!bloodGroup || bloodGroup === 'Select Blood Group') {
                    alert('Please select a blood group');
                    return;
                }

                // Build URL parameters
                const params = new URLSearchParams();
                params.append('blood_group', bloodGroup);

                if (countryId && countryId !== 'Select Country') {
                    params.append('country_id', countryId);
                }
                if (stateId && stateId !== 'Select State') {
                    params.append('state_id', stateId);
                }
                if (cityId && cityId !== 'Select City') {
                    params.append('city_id', cityId);
                }

                // Redirect to donors page
                window.location.href = `<?= base_url('/donor') ?>?${params.toString()}`;
            });
        }
    });

    // Clear form when returning to home page
    window.addEventListener('pageshow', function (event) {
        // Check if the page is being loaded from cache (back/forward navigation)
        if (event.persisted || (window.performance && window.performance.navigation.type === 2)) {
            // Clear the form
            document.getElementById('blood_group').selectedIndex = 0;
            document.getElementById('country_id').selectedIndex = 0;
            document.getElementById('state_id').innerHTML = '<option selected disabled>Select State</option>';
            document.getElementById('city_id').innerHTML = '<option selected disabled>Select City</option>';
        }
    });
</script>




<script>
    document.addEventListener("DOMContentLoaded", function() {
        const baseUrl = "http://localhost:8080";
        const gridContainer = document.getElementById("blood_group_grid");

        // Define all 8 blood groups
        const bloodGroups = ["A+", "A-", "B+", "B-", "O+", "O-", "AB+", "AB-"];

        // Create placeholders (so design loads immediately)
        gridContainer.innerHTML = bloodGroups.map(group => `
        <div class="lg:col-span-3 md:col-span-4 sm:col-span-6 col-span-6 p-3">
            <div class="bg-[#17173A] rounded-lg p-6 text-center relative overflow-hidden
                transition-all duration-300 ease-in-out transform hover:-translate-y-2 hover:shadow-lg cursor-pointer"
                data-group="${group}">
                <div class="flex justify-center items-center space-x-2">
                    <i class="fa fa-solid fa-droplet text-red-500 text-[35px]"></i>
                    <span class="text-red-500 text-[35px] font-bold">${group}</span>
                </div>
                <p class="text-white text-[20px] mt-2">(0)</p>
                <div class="absolute bottom-[-15px] right-[-25px] opacity-40">
                    <i class="fa fa-solid fa-droplet text-red-500 text-[5.625rem]"></i>
                </div>
            </div>
        </div>
    `).join("");

        // Fetch all donors from API
        fetch(`${baseUrl}/api/donorapi`)
            .then(res => res.json())
            .then(data => {
                // Count donors by blood group
                const counts = {};
                bloodGroups.forEach(bg => counts[bg] = 0);

                data.forEach(donor => {
                    const bg = donor.blood_group?.trim();
                    // ✅ Count only donors whose status is 'Active' (case-insensitive)
                    if (bg && counts.hasOwnProperty(bg) && donor.status && donor.status.toLowerCase() === 'active') {
                        counts[bg]++;
                    }
                });


                // Update counts dynamically
                document.querySelectorAll("#blood_group_grid [data-group]").forEach(card => {
                    const group = card.dataset.group;
                    const count = counts[group] || 0;
                    card.querySelector("p").textContent = `(${count})`;
                });
            })
            .catch(err => console.error("Error fetching donors:", err));

        // Redirect on click
        gridContainer.addEventListener("click", function(e) {
            const card = e.target.closest("[data-group]");
            if (card) {
                const bloodGroup = card.dataset.group;
                window.location.href = `${baseUrl}/donor?blood_group=${encodeURIComponent(bloodGroup)}`;
            }
        });
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        const baseUrl = "<?= base_url() ?>"; // automatically adjusts for localhost or hosted site
        const apiURL = `${baseUrl}/api/top-donors`;
        const container = $("#topDonorsContainer");

        $.ajax({
            url: apiURL,
            method: "GET",
            dataType: "json",
            success: function (donors) {
                if (!donors.length) {
                    container.html(`<p class="col-span-12 text-gray-600">No top donors available at the moment.</p>`);
                    return;
                }

                donors.forEach(donor => {
                    // ✅ Gender-based image logic
                    const donorImage = donor.gender?.toLowerCase() === "female"
                        ? `${baseUrl}/assets/images/img_5.png`
                        : `${baseUrl}/assets/images/img_6.png`;

                    const card = `
                    <div class="lg:col-span-3 md:col-span-3 sm:col-span-6 col-span-6">
                        <div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col hover:scale-[1.02] transition-transform duration-300">

                            <!-- Image -->
                            <div class="w-full lg:h-60 md:h-60 sm:h-60 h-50">
                                <img src="${donorImage}"
                                     alt="${donor.full_name || 'Donor'}"
                                     class="w-full h-full object-cover">
                            </div>

                            <!-- Content -->
                            <div class="bg-[#17173A] text-center py-3 flex-1">
                                <h3 class="text-white font-bold text-lg">${donor.full_name || 'Unknown Donor'}</h3>
                                <p class="text-sm text-gray-200">
                                    Blood Group: <span class="text-red-500 font-semibold">(${donor.blood_group || 'N/A'})</span>
                                </p>
                                <p class="text-xs text-gray-400">Donation Score: ${donor.donation_score ?? 0}</p>

                                <!-- Social Icons -->
                                <div class="flex justify-center gap-3 pt-2">
                                    <a href="#" class="text-white hover:text-red-500"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#" class="text-white hover:text-red-500"><i class="fab fa-twitter"></i></a>
                                    <a href="#" class="text-white hover:text-red-500"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="#" class="text-white hover:text-red-500"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                `;

                    container.append(card);
                });
            },
            error: function () {
                container.html(`<p class="col-span-12 text-red-600">Failed to load donors. Please try again later.</p>`);
            }
        });
    });
</script>

<script>
    $(document).ready(function () {
        const baseUrl = "<?= base_url() ?>";

        $.ajax({
            url: `${baseUrl}/api/fetch_latest`, // <-- create this route in your controller

            method: "GET",
            dataType: "json",
            success: function (data) {
                const container = $("#latestDonors");
                container.empty();

                if (!data || data.length === 0) {
                    container.html(`<p class="col-span-12 text-center text-gray-500">No recent donors found.</p>`);
                    return;
                }

                data.slice(0, 4).forEach(donor => {
                    const donorImage = donor.gender?.toLowerCase() === "female"
                        ? `${baseUrl}/assets/images/img_5.png`
                        : `${baseUrl}/assets/images/img_6.png`;

                    const card = `
                        <div class="lg:col-span-3 md:col-span-3 sm:col-span-6 col-span-6">
                            <div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col transition hover:-translate-y-1 hover:shadow-xl">
                                <!-- Image -->
                                <div class="w-full lg:h-60 md:h-60 sm:h-60 h-50">
                                    <img src="${donorImage}" alt="Donor"
                                         class="w-full h-full object-cover">
                                </div>

                                <!-- Content -->
                                <div class="bg-[#17173A] text-center py-3 flex-1">
                                    <h3 class="text-white font-bold text-lg pt-3">${donor.full_name || 'Unknown Donor'}</h3>
                                    <p class="text-sm text-red-600 font-bold">
                                       <i class="fa fa-tint font-bold"></i> Blood Group: <span class="text-white font-semibold">(${donor.blood_group || 'N/A'})</span>
                                    </p>
                                    <div class="h-6"></div>
                                </div>
                            </div>
                        </div>`;
                    container.append(card);
                });
            },
            error: function () {
                $("#latestDonors").html(`<p class="col-span-12 text-center text-gray-500">Error loading donors.</p>`);
            }
        });
    });
</script>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        fetchBlogs();
    });

    function fetchBlogs() {
        // 🔗 Change this URL according to your actual API route
        const apiUrl = "<?= site_url('api/blogapi') ?>"; // or absolute path like: "https://yourdomain.com/api/blogapi"

        fetch(apiUrl)
            .then(response => response.json())
            .then(blogs => {
                const container = document.getElementById("blogContainer");
                container.innerHTML = "";

                if (!Array.isArray(blogs) || blogs.length === 0) {
                    container.innerHTML = `<p class='text-center col-span-3 text-gray-500'>No blogs found.</p>`;
                    return;
                }

                blogs.forEach(blog => {
                    const imageUrl = blog.blog_image
                        ? `<?= base_url('uploads/blogs/') ?>${blog.blog_image}`
                        : `<?= base_url('assets/interfaceimages/default-blog.png') ?>`;

                    const formattedDate = new Date(blog.posted_at).toLocaleDateString('en-US', {
                        day: '2-digit',
                        month: 'short',
                        year: 'numeric'
                    });

                    // const blogCard = `
                    //     <a href="blog?id=${blog.id}" class="group bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow block p-3">
                    //         <div class="h-60 w-full overflow-hidden mb-4 rounded-md">
                    //             <img src="${imageUrl}" alt="${blog.blog_title}"
                    //                  class="w-full h-full object-cover shadow-md transform transition-transform duration-500 group-hover:scale-110">
                    //         </div>
                    //         <div>
                    //             <div class="text-sm text-gray-500 mb-2">${formattedDate}</div>
                    //             <h5 class="text-xl font-bold mb-3 transition-colors hover:text-red-500">
                    //                 ${blog.blog_title}
                    //             </h5>
                    //         </div>
                    //     </a>`;
                    // home.php ke blog section mein existing code ko replace karein:
                    const blogCard = `
    <div class="group bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow cursor-pointer p-3" onclick="openBlogFromHome(${blog.id})">
        <div class="h-60 w-full overflow-hidden mb-4 rounded-md">
            <img src="${imageUrl}" alt="${blog.blog_title}" class="w-full h-full object-cover shadow-md transform transition-transform duration-500 group-hover:scale-110">
        </div>
        <div>
            <div class="text-sm text-gray-500 mb-2">${formattedDate}</div>
            <h5 class="text-xl font-bold mb-3 transition-colors hover:text-red-500">
                ${blog.blog_title}
            </h5>
        </div>
    </div>
 `;
                    container.insertAdjacentHTML("beforeend", blogCard);
                });
            })
            .catch(error => {
                console.error("Error fetching blogs:", error);
                document.getElementById("blogContainer").innerHTML =
                    `<p class='text-center col-span-3 text-red-500'>Failed to load blogs.</p>`;
            });
    }

    // Global function for home.php to open blog
    function openBlogFromHome(blogId) {
        // Redirect to blog.php with hash
        window.location.href = `<?= site_url('blog') ?>#blog=${blogId}`;
    }

</script>