<?= $this->extend('interface/layouts/structure') ?>
<?= $this->section('title') ?>
Apply As a Donor
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
            <h1 class="text-center text-white text-4xl font-bold pb-3">Apply as a Donor</h1>
            <!--        <span><i class="fa fa-home text-red-500 text-lg"></i></span>-->
            <!--            <span class="text-white hover:text-red-500 font-medium text-md">Home</span>-->
            <!--            <span class="text-gray-300 text-md">-About Us</span>-->

            <a href="<?= base_url('/home') ?>" class="hover:text-red-500 font-medium text-md">
                <i class="fa fa-home text-red-500  text-lg"></i> Home
            </a>
            <span class="text-gray-300 text-md">-Apply as a Donor</span>

        </div>
    </div>
</section>
<section class="py-16 bg-gray-50">
    <div class="max-w-6xl mx-auto bg-white shadow-lg rounded-md overflow-hidden">

        <form id="donorForm" class="p-8 space-y-12">
            <!--  PERSONAL INFORMATION -->
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-6 border-b pb-2">Personal Information</h3>
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="text-sm font-semibold text-gray-700 mb-2">Name <span class="text-red-600">*</span></label>
                        <input type="text" name="full_name" class="w-full border rounded-sm px-3 py-2 " placeholder="Full Name" required>
                    </div>
                    <div>
                        <label class="text-sm font-semibold text-gray-700 mb-2">Mobile <span class="text-red-600">*</span></label>
                        <input type="text" name="mobile" class="w-full border rounded-sm px-3 py-2 " placeholder="Mobile Number" required>
                    </div>
                    <div>
                        <label class="text-sm font-semibold text-gray-700 mb-2">Date of Birth <span class="text-red-600">*</span></label>
                        <input type="date" name="dob" class="w-full border rounded-sm px-3 py-2 ">
                    </div>
                    <div>
                        <label class="text-sm font-semibold text-gray-700 mb-2">Gender <span class="text-red-600">*</span></label>
                        <select name="gender" class="w-full border rounded-sm px-3 py-2 " required>
                            <option value="">Select</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- 📍 LOCATION INFORMATION -->
            <div>
                <h3 class="text-xl font-semibold text-gray-800 mb-6 border-b pb-2">Location Information</h3>
                <div class="grid md:grid-cols-3 gap-6">
                    <div>
                        <label class="text-sm font-semibold text-gray-700 mb-2">Country <span class="text-red-600">*</span></label>
                        <select name="country_id" id="country_id" class="w-full border rounded-sm px-3 py-2 " required>
                            <option value="">Select Country</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-sm font-semibold text-gray-700 mb-2">State <span class="text-red-600">*</span></label>
                        <select name="state_id" id="state_id" class="w-full border rounded-sm px-3 py-2" required>
                            <option value="">Select State</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-sm font-semibold text-gray-700 mb-2">City <span class="text-red-600">*</span></label>
                        <select name="city_id" id="city_id" class="w-full border rounded-sm px-3 py-2" required>
                            <option value="">Select City</option>
                        </select>
                    </div>
                </div>

                <div class="mt-6">
                    <label class="text-sm font-semibold text-gray-700 mb-2">Address <span class="text-red-600">*</span></label>
                    <textarea name="address" class="w-full border rounded-sm px-3 py-2 " rows="2" placeholder="Your Address"></textarea>
                </div>

                <div class="mt-6">
                    <label class="text-sm font-semibold text-gray-700 mb-2">Select Location on Map</label>
                    <div id="map" class="w-full h-96 rounded-sm border"></div>
                </div>
                <div class="grid md:grid-cols-2 gap-6 mt-6">
                    <div>
                        <label class="text-sm font-semibold text-gray-700 mb-2">Latitude <span class="text-red-600">*</span></label>
                        <input type="text" name="latitude" id="latitude" class="w-full border rounded-sm px-3 py-2" placeholder="Latitude">
                    </div>
                    <div>
                        <label class="text-sm font-semibold text-gray-700 mb-2">Longitude <span class="text-red-600">*</span></label>
                        <input type="text" name="longitude" id="longitude" class="w-full border rounded-sm px-3 py-2" placeholder="Longitude">
                    </div>
                </div>


            </div>

            <!-- ❤️ DONATION & HEALTH INFO -->
            <div>
                <h3 class="text-xl font-semibold text-gray-800 mb-6 border-b pb-2">Donation & Health Info</h3>
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="text-sm font-semibold text-gray-700 mb-2">Last Donation Date <span class="text-red-600">*</span></label>
                        <input type="date" name="last_donation_date" class="w-full border rounded-sm px-3 py-2 ">
                    </div>
                    <div>
                        <label class="text-sm font-semibold text-gray-700 mb-2">Blood Group <span class="text-red-600">*</span></label>
                        <select name="blood_group" class="w-full border rounded-sm px-3 py-2" required>
                            <option value="">Select</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-sm font-semibold text-gray-700 mb-2">Habits <span class="text-red-600">*</span></label>
                        <input type="text" name="habits" class="w-full border rounded-sm px-3 py-2 " placeholder="Habits or any specific health issue">
                    </div>
                    <div>
                        <label class="text-sm font-semibold text-gray-700 mb-2">Donor Type <span class="text-red-600">*</span></label>
                        <select name="donor_type" class="w-full border rounded-sm px-3 py-2 focus:ring-2 " required>
                            <option value="">Select Type</option>
                            <option value="Free">Free</option>
                            <option value="Paid">Paid</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- ⚙️ OTHER DETAILS -->
            <div>
                <h3 class="text-xl font-semibold text-gray-800 mb-6 border-b pb-2">Other Details</h3>
                <div class="grid md:grid-cols-2 gap-6">
<!--                    <div>-->
<!--                        <label class="text-sm font-semibold text-gray-700 mb-2">Bags <span class="text-red-600">*</span></label>-->
<!--                        <input type="number" name="points" class="w-full border rounded-sm px-3 py-2 " placeholder="How many bags you want to donate" min="0">-->
<!--                    </div>-->


                    <div>
                    <label class="text-sm font-semibold text-gray-700 mb-2">Points (ML)<span class="text-red-600">*</span></label>

                        <input type="number"
                               name="points"
                               id="points"
                               class="w-full border rounded-sm px-3 py-2 "
                               placeholder="Enter points in ML (Max 450)"
                               min="0"
                               max="450"
                               step="1"
                               required>

                        <small id="pointsError" style="color:red; display:none;">
                            Donor cannot enter points more than 450 ML.
                        </small>

                        <small id="unitError" style="color:red; display:none;">
                            Only ML unit is allowed. No other unit accepted.
                        </small>
                    </div>


                    <div>
                        <label class="text-sm font-semibold text-gray-700 mb-2">Status <span class="text-red-600">*</span></label>
                        <select name="status" class="w-full border rounded-sm px-3 py-2 ">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- SUBMIT BUTTON -->
            <div class="text-center pb-2">
                <button type="submit" class="bg-red-500 hover:bg-red-500 text-white font-medium w-full py-3 rounded-sm shadow">
                    Submit Donor
                </button>
            </div>
        </form>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function showToast(message) {
        const toast = document.getElementById('toast');
        toast.textContent = message;

        // Reset and show
        // Reset any existing state
        toast.classList.remove('opacity-0', 'translate-x-full', '-translate-x-full');

        // Slide in from the right and fade in
        toast.classList.add('opacity-100', 'translate-x-0');
        // Keep visible for 1 second, then fade out
        setTimeout(() => {
            toast.classList.remove('opacity-100', 'translate-y-0');
            toast.classList.add('opacity-0', 'translate-y-5');
        }, 1000); // visible for 1 second
    }


    $(document).ready(function(){

        // ✅ 1. Load countries on page load
        $.get('/donor/getCountries', function(countries){
            if (Array.isArray(countries)) {
                countries.forEach(function(c){
                    $('#country_id').append(`<option value="${c.id}">${c.name}</option>`);
                });
            }
        });

        // ✅ 2. Country → State
        $('#country_id').change(function(){
            let id = $(this).val();
            $('#state_id').html('<option value="">Loading...</option>');
            $.get('/donor/getStates/' + id, function(states){
                $('#state_id').html('<option value="">Select State</option>');
                states.forEach(function(s){
                    $('#state_id').append(`<option value="${s.id}">${s.name}</option>`);
                });
            });
        });

        // ✅ 3. State → City
        $('#state_id').change(function(){
            let id = $(this).val();
            $('#city_id').html('<option value="">Loading...</option>');
            $.get('/donor/getCities/' + id, function(cities){
                $('#city_id').html('<option value="">Select City</option>');
                cities.forEach(function(city){
                    $('#city_id').append(`<option value="${city.id}">${city.name}</option>`);
                });
            });
        });

        // ✅ Replace alert with animated toast
        $('#donorForm').on('submit', function(e){
            e.preventDefault();

            let points = parseInt($("#points").val());

            $("#pointsError").hide();
            $("#unitError").hide();

            if (points > 450) {
                $("#pointsError").show();
                e.preventDefault();
                return false;
            }

            if (isNaN(points)) {
                $("#unitError").text("Please enter points in ML only.").show();
                e.preventDefault();
                return false;
            }

            $.ajax({
                url: '/donor/store',
                type: 'POST',
                data: $(this).serialize(),
                success: function(res){
                    if(res.status === 'success'){
                        showToast('Donor Saved Successfully!');
                        $('#donorForm')[0].reset();
                    } else {
                        showToast(res.message || 'Error while saving donor');
                    }
                },
                error: function(){
                    showToast('Something went wrong!');
                }
            });
        });

        $("#points").on("input", function () {
            let value = $(this).val();

            $("#pointsError").hide();
            $("#unitError").hide();

            // Only integers allowed
            if (!/^\d*$/.test(value)) {
                $("#unitError").text("Only numbers in ML are allowed.").show();
                $(this).val(value.replace(/[^0-9]/g, ""));
                return;
            }

            value = parseInt(value);

            // Check for max 450
            if (value > 450) {
                $("#pointsError").show();
            }
        });
    });
</script>
<script>
    let map, marker;

    function initMap() {
// Default center (e.g., Pakistan)
        const defaultLocation = {lat: 30.3753, lng: 69.3451};

// Initialize map
        map = new google.maps.Map(document.getElementById("map"), {
            center: defaultLocation,
            zoom: 6,
        });

// Add draggable marker
        marker = new google.maps.Marker({
            position: defaultLocation,
            map: map,
            draggable: true,
        });

// When marker is dragged
        google.maps.event.addListener(marker, 'dragend', function (event) {
            const lat = event.latLng.lat();
            const lng = event.latLng.lng();
            $('#latitude').val(lat);
            $('#longitude').val(lng);
        });

// When user clicks on map
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
<!-- Toast Container -->
<div id="toast"
     class="fixed top-6 right-6 bg-black text-white font-semibold text-md tracking-wide rounded-md shadow-lg px-6 py-3 opacity-0 translate-x-full transition-all duration-500 ease-in-out z-50">
    Donor Saved Successfully!
</div>


<?= $this->endSection() ?>
