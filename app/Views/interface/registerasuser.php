<?= $this->extend('interface/layouts/structure') ?>
<?= $this->section('title') ?>
    Register As User
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="relative">
        <!-- Background Image -->
        <img src="<?= base_url('assets/interfaceimages/img_8.png') ?>"
             class="absolute inset-0 w-full h-full object-cover z-0">

        <!-- Gradient Overlay -->
        <div class="absolute inset-0 bg-[#17173A] opacity-[0.4] z-10 "></div>


        <div class="max-w-6xl mx-auto relative z-20 py-20 px-4 text-white text-center">
            <div class="max-w-2xl mx-auto">
                <h1 class="text-center text-white text-4xl font-bold pb-8">Register as User</h1>

                <a href="<?=base_url('user/login')?>" class="bg-red-500 px-4 py-2 rounded text-white ">User Portal</a>
            </div>
        </div>
    </section>

    <section class="py-16 bg-gray-50">
        <div class="max-w-6xl mx-auto bg-white shadow-lg rounded-md overflow-hidden">
            <form id="userForm" class="p-8 space-y-12">

                <!-- PERSONAL INFORMATION -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-6 border-b pb-2">Personal Information</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="text-sm font-semibold text-gray-700 mb-2">Registration No</label>
                            <input type="text" name="reg_no" id="reg_no"
                                   class="w-full border rounded-sm px-3 py-2 bg-gray-100"
                                   placeholder="Auto-generated" disabled>
                        </div>
                        <div>
                            <label class="text-sm font-semibold text-gray-700 mb-2">Full Name <span
                                        class="text-red-600">*</span></label>
                            <input type="text" name="full_name" id="full_name"
                                   class="w-full border rounded-sm px-3 py-2"
                                   placeholder="Full Name" required>
                        </div>
                        <div>
                            <label class="text-sm font-semibold text-gray-700 mb-2">Mobile <span
                                        class="text-red-600">*</span></label>
                            <input type="text" name="mobile" id="mobile" class="w-full border rounded-sm px-3 py-2"
                                   maxlength="11" placeholder="11 digits only" required>
                        </div>
                        <div>
                            <label class="text-sm font-semibold text-gray-700 mb-2">Password <span class="text-red-600">*</span></label>
                            <div class="input-group flex-grow-1">
                                <input type="password" name="password" id="password"
                                       class="form-control w-full border border-gray-300 rounded-sm px-3 py-2
                                    focus:border-black focus:outline-none focus:ring-0"
                                       placeholder="Password" required>
                                <div class="input-group-append">
                                    <button type="button" class="py-2 btn btn-outline-secondary toggle-password">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label class="text-sm font-semibold text-gray-700 mb-2">Date of Birth</label>
                            <input type="date" name="dob" id="dob" class="w-full border rounded-sm px-3 py-2">
                        </div>
                        <div>
                            <label class="text-sm font-semibold text-gray-700 mb-2">Blood Group</label>
                            <select name="blood_group" id="blood_group" class="w-full border rounded-sm px-3 py-2">
                                <option value="">Select Blood Group</option>
                                <option>A+</option>
                                <option>A-</option>
                                <option>B+</option>
                                <option>B-</option>
                                <option>O+</option>
                                <option>O-</option>
                                <option>AB+</option>
                                <option>AB-</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- LOCATION INFORMATION -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-6 border-b pb-2">Location Information</h3>
                    <div class="grid md:grid-cols-3 gap-6">
                        <div>
                            <label class="text-sm font-semibold text-gray-700 mb-2">Country <span
                                        class="text-red-600">*</span></label>
                            <select name="country_id" id="country_id" class="w-full border rounded-sm px-3 py-2"
                                    required>
                                <option value="">Select Country</option>
                            </select>
                        </div>
                        <div>
                            <label class="text-sm font-semibold text-gray-700 mb-2">State <span
                                        class="text-red-600">*</span></label>
                            <select name="state_id" id="state_id" class="w-full border rounded-sm px-3 py-2" required>
                                <option value="">Select State</option>
                            </select>
                        </div>
                        <div>
                            <label class="text-sm font-semibold text-gray-700 mb-2">City <span
                                        class="text-red-600">*</span></label>
                            <select name="city_id" id="city_id" class="w-full border rounded-sm px-3 py-2" required>
                                <option value="">Select City</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-6">
                        <label class="text-sm font-semibold text-gray-700 mb-2">Address</label>
                        <textarea name="address" id="address" class="w-full border rounded-sm px-3 py-2" rows="2"
                                  placeholder="Address"></textarea>
                    </div>

                    <div class="mt-6">
                        <label class="text-sm font-semibold text-gray-700 mb-2">Search Location</label>
                        <input type="text" id="location_search" class="w-full border rounded-sm px-3 py-2"
                               placeholder="Enter a location">
                    </div>

                    <div class="mt-6">
                        <label class="text-sm font-semibold text-gray-700 mb-2">Or pick from map</label>
                        <div id="map" class="w-full h-96 rounded-sm border"></div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6 mt-6">
                        <div>
                            <label class="text-sm font-semibold text-gray-700 mb-2">Latitude</label>
                            <input type="text" name="latitude" id="latitude" class="w-full border rounded-sm px-3 py-2"
                                   placeholder="0.000000">
                        </div>
                        <div>
                            <label class="text-sm font-semibold text-gray-700 mb-2">Longitude</label>
                            <input type="text" name="longitude" id="longitude"
                                   class="w-full border rounded-sm px-3 py-2" placeholder="0.000000">
                        </div>
                    </div>
                </div>

                <!-- ACCOUNT SETTINGS -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-6 border-b pb-2">Account Settings</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="text-sm font-semibold text-gray-700 mb-2">Status</label>
                            <select name="status" id="status" class="w-full border rounded-sm px-3 py-2">
                                <option>Active</option>
                                <option>Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- SUBMIT BUTTON -->
                <div class="text-center ">
                    <button type="submit"
                            class="bg-red-500 hover:bg-red-600 text-white font-medium w-full px-6 py-3 rounded-sm shadow transition duration-200">
                        Save User
                    </button>
                </div>
            </form>
        </div>
    </section>


    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered " role="document">
            <div class="modal-content rounded-lg overflow-hidden border-0 shadow-xl">
                <div class="modal-header bg-red-500 text-white flex justify-between items-center py-4 px-6">
                    <h5 class="modal-title text-xl font-bold" id="successModalLabel">Registration Successful!</h5>
                    <button type="button" class="close text-white focus:outline-none" data-dismiss="modal" aria-label="Close">
                        <span class="text-2xl" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body border text-center py-6 px-6">
                    <div class="mb-4">
                        <i class="fa fa-check-circle text-red-500 fa-4x mb-3"></i>
                        <h4 class="text-red-600 font-bold text-xl">Welcome to Our Platform!</h4>
                        <h3 class="text-gray-700 text-center pt-3 font-medium">Please save these credentials!</h3>
                    </div>

                    <div class="bg-gray-50 rounded-lg p-6 mb-1">

                        <!-- Centered Grid Wrapper -->
                        <div class="mx-auto w-fit">

                            <!-- Table-like Grid -->
                            <div class="grid grid-cols-2 gap-x-10 gap-y-4 text-left">

                                <!-- Row 1 -->
                                <div class="text-gray-700 font-semibold whitespace-nowrap">
                                    Registration Number:
                                </div>
                                <div class="font-mono text-gray-700 font-bold">
                                    <span id="registrationNumber"></span>
                                </div>

                                <!-- Row 2 -->
                                <div class="text-gray-700 font-semibold whitespace-nowrap">
                                    Password:
                                </div>
                                <div class="font-mono text-gray-700 font-bold">
                                    <span id="userPassword"></span>
                                </div>

                            </div>

                        </div>

                    </div>



                    <p class="text-gray-600">You can now login to your personal portal.</p>
                </div>
                <div class="modal-footer justify-content-center bg-gray-50 py-4 px-6">
                    <button type="button" class="btn bg-gray-500 hover:bg-gray-600 text-white font-medium px-5 py-2 rounded-md transition duration-200 mr-2" data-dismiss="modal">Close</button>
                    <button type="button" class="btn bg-red-500 hover:bg-red-600 text-white font-medium px-5 py-2 rounded-md transition duration-200" id="goToLoginBtn">
                        Login to Portal
                    </button>
                </div>
            </div>
        </div>
    </div>


    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-red-500 text-white flex justify-between items-center py-4 px-6">
                    <h5 class="modal-title text-xl font-bold" id="loginModalLabel">User Login</h5>
                    <button type="button" class="close text-white focus:outline-none" data-dismiss="modal" aria-label="Close">
                        <span class="text-2xl" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="userLoginForm">
                    <div class="modal-body  py-6 px-6">
                        <div class="form-group space-y-2 mb-4">
                            <label class="text-sm font-semibold text-gray-700">Registration Number</label>
                            <input type="text" name="reg_no" class="form-control w-full border border-gray-300 rounded-md  focus:outline-none focus:ring-2  focus:border-transparent transition-all duration-200"
                                   placeholder="Enter your registration number" required>
                        </div>
                        <div class="form-group">
                            <label class="text-sm font-semibold text-gray-700">Password</label>
                            <div class="input-group">
                                <input type="password" name="password" class="form-control w-full border border-gray-300 rounded-md  focus:outline-none focus:ring-2 focus:border-transparent transition-all duration-200 pr-12" placeholder="Enter your password" required>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-secondary toggle-login-password">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </div>
                            </div>

                        </div>
                        <div class="text-right mt-2 mb-3">
                            <a href="<?= base_url('forgot-password') ?>" class="text-sm text-red-500 hover:text-red-600 font-medium transition-colors duration-200">
                                Forgot Password?
                            </a>
                        </div>

                        <div id="loginError" class="bg-red-50 border border-red-200 text-red-700 rounded-md py-2 px-4 hidden mb-4"></div>
                    </div>


                    <div class="modal-footer bg-gray-50 py-2 px-6">
                        <button type="button" class="btn bg-gray-500 hover:bg-gray-600 text-white font-medium px-5 py-2 rounded-md transition duration-200 mr-2" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-red-500 hover:bg-red-600 text-white font-medium px-5 py-2 rounded-md transition duration-200">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="toast"
         class="fixed top-6 right-6 bg-black text-white font-semibold text-md tracking-wide rounded-md shadow-lg px-6 py-3 opacity-0 translate-x-full transition-all duration-500 ease-in-out z-50">
        User Registered Successfully!
    </div>

    <style>
        .input-group .form-control,
        .input-group .btn-outline-secondary {
            border: 1px solid #d1d5db; /* gray-300 */
            box-shadow: none !important;
            background: white !important;
        }

        .input-group .btn-outline-secondary {
            background: #f9fafb !important;
            border-left: none !important;
        }

        .input-group .btn-outline-secondary:hover {
            background: #f9fafb !important;
            border-color: #d1d5db !important;
            color: black !important;
        }

        .input-group:focus-within .form-control,
        .input-group:focus-within .btn-outline-secondary {
            border-color: black !important;
        }

        .form-control:focus,
        .btn-outline-secondary:focus {
            box-shadow: none !important;
            outline: none !important;
        }

        /* Modal styling */
        .modal-backdrop {
            z-index: 1040;
        }
        .modal {
            z-index: 1050;
        }

        /* Login button styling */
        /*#loginBtnTop {*/
        /*    background: none;*/
        /*    border: none;*/
        /*    color: white;*/
        /*    cursor: pointer;*/
        /*    transition: color 0.3s ease;*/
        /*}*/

        /*#loginBtnTop:hover {*/
        /*    color: #ef4444;*/
        /*}*/
    </style>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function showToast(message) {
            const toast = document.getElementById('toast');
            toast.textContent = message;
            toast.classList.remove('opacity-0', 'translate-x-full', '-translate-x-full');
            toast.classList.add('opacity-100', 'translate-x-0');
            setTimeout(() => {
                toast.classList.remove('opacity-100', 'translate-y-0');
                toast.classList.add('opacity-0', 'translate-y-5');
            }, 3000);
        }

        $(document).ready(function () {
            // ✅ Show Login Modal when login button is clicked
            $('#loginBtnTop').on('click', function() {
                $('#loginModal').modal('show');
            });

            // ✅ 1. Load countries on page load
            $.get('/appuser/getCountries', function (countries) {
                if (Array.isArray(countries)) {
                    countries.forEach(function (c) {
                        $('#country_id').append(`<option value="${c.id}">${c.name}</option>`);
                    });
                }
            });

            // ✅ 2. Country → State
            $('#country_id').change(function () {
                let id = $(this).val();
                $('#state_id').html('<option value="">Loading...</option>');
                $.get('/appuser/getStates/' + id, function (states) {
                    $('#state_id').html('<option value="">Select State</option>');
                    if (Array.isArray(states)) {
                        states.forEach(function (s) {
                            $('#state_id').append(`<option value="${s.id}">${s.name}</option>`);
                        });
                    }
                });
            });

            // ✅ 3. State → City
            $('#state_id').change(function () {
                let id = $(this).val();
                $('#city_id').html('<option value="">Loading...</option>');
                $.get('/appuser/getCities/' + id, function (cities) {
                    $('#city_id').html('<option value="">Select City</option>');
                    if (Array.isArray(cities)) {
                        cities.forEach(function (city) {
                            $('#city_id').append(`<option value="${city.id}">${city.name}</option>`);
                        });
                    }
                });
            });

            // ✅ Registration Form Submit
            $('#userForm').on('submit', function (e) {
                e.preventDefault();

                // Basic validation
                const mobile = $('#mobile').val();
                if (!/^\d{11}$/.test(mobile)) {
                    showToast('Mobile must be exactly 11 digits');
                    return false;
                }

                $.ajax({
                    url: '/appuser/store',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function (res) {
                        if (res.status === 'success') {
                            // Show success modal with registration details
                            $('#registrationNumber').text(res.reg_no);
                            $('#userPassword').text(res.password);
                            $('#successModal').modal('show');
                            $('#userForm')[0].reset();
                        } else {
                            showToast(res.message || 'Error while user registration');
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('Error:', error);
                        showToast('Something went wrong! Please try again.');
                    }
                });
            });

            // ✅ Go to Login Button
            $('#goToLoginBtn').on('click', function() {
                $('#successModal').modal('hide');
                setTimeout(function() {
                    $('#loginModal').modal('show');
                }, 300);
            });

            // ✅ User Login Form Handler
            $('#userLoginForm').on('submit', function(e) {
                e.preventDefault();
                $('#loginError').addClass('d-none');

                const formData = $(this).serialize();

                $.ajax({
                    url: '/appuser/login',
                    type: 'POST',
                    data: formData,
                    success: function(res) {
                        if (res.status === 'success') {
                            showToast('Login successful!');
                            $('#loginModal').modal('hide');
                            setTimeout(function() {
                                window.location.href = '/userportal';
                            }, 1000);
                        } else {
                            $('#loginError').text(res.message).removeClass('d-none');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        $('#loginError').text('Something went wrong! Please try again.').removeClass('d-none');
                    }
                });
            });

            // ✅ Password show/hide toggle for registration form
            $(document).on('click', '.toggle-password', function () {
                const input = $(this).closest('.input-group').find('input');
                const icon = $(this).find('i');

                if (input.attr('type') === 'password') {
                    input.attr('type', 'text');
                    icon.removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    input.attr('type', 'password');
                    icon.removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });

            // ✅ Password show/hide toggle for login form
            $(document).on('click', '.toggle-login-password', function () {
                const input = $(this).closest('.input-group').find('input');
                const icon = $(this).find('i');

                if (input.attr('type') === 'password') {
                    input.attr('type', 'text');
                    icon.removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    input.attr('type', 'password');
                    icon.removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });

            // ✅ Auto-fill registration number in login form after success
            $('#successModal').on('hidden.bs.modal', function () {
                const regNo = $('#registrationNumber').text();
                if (regNo) {
                    $('#loginModal input[name="reg_no"]').val(regNo);
                }
            });
        });

        // Google Maps
        let map, marker;
        function initMap() {
            const defaultLocation = {lat: 30.3753, lng: 69.3451};

            map = new google.maps.Map(document.getElementById("map"), {
                center: defaultLocation,
                zoom: 6,
            });

            marker = new google.maps.Marker({
                position: defaultLocation,
                map: map,
                draggable: true,
            });

            google.maps.event.addListener(marker, 'dragend', function (event) {
                const lat = event.latLng.lat();
                const lng = event.latLng.lng();
                $('#latitude').val(lat);
                $('#longitude').val(lng);
            });

            google.maps.event.addListener(map, 'click', function (event) {
                const lat = event.latLng.lat();
                const lng = event.latLng.lng();
                marker.setPosition({lat, lng});
                $('#latitude').val(lat);
                $('#longitude').val(lng);
            });
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsFg6fd2lwqaxzsxN_W04Ox4_xcJfgbX4&libraries=places&callback=initMap"
            async defer></script>

<?= $this->endSection() ?>