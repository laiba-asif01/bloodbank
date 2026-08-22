<?= $this->extend('user_portal/layouts/structure') ?>
<?= $this->section('title') ?>User Portal<?= $this->endSection() ?>

<?= $this->section('content') ?>

    <div class="content-wrapper">
        <!-- Page Header -->

        <!-- Main Content -->
        <section class="content p-3">
            <div class="container-fluid max-w-7xl mx-auto">

                <!-- Quick Stats -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3 id="totalDonors">0</h3>
                                <p>Donors Added</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <a href="#donors-section" class="small-box-footer">
                                View All <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3 id="activeDonors">0</h3>
                                <p>Active Donors</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-heart"></i>
                            </div>
                            <a href="#donors-section" class="small-box-footer">
                                View Details <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3 id="totalPoints">0</h3>
                                <p>Total Points (ML)</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-tint"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3 id="avgScore">0</h3>
                                <p>Avg Donation Score</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                View Details <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Add Donor Card -->
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Add New Blood Donor</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="donorForm">
                            <input type="hidden" name="user_id" value="<?= session()->get('app_user_id') ?>">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="full_name">Full Name  <span class="text-red-600 text-lg">*</span></label>
                                        <input type="text" name="full_name" id="full_name" class="form-control" placeholder="Donor Full Name" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="mobile">Mobile Number <span class="text-red-600 text-lg">*</span></label>
                                        <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile Number (11 digits)" required maxlength="11">
                                        <small class="text-danger" id="mobileError" style="display:none;">Mobile number cannot exceed 11 digits</small>
                                    </div>

                                    <div class="form-group">
                                        <label for="blood_group">Blood Group <span class="text-red-600 text-lg">*</span></label>
                                        <select name="blood_group" id="blood_group" class="form-control" required>
                                            <option value="">Select Blood Group</option>
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="gender">Gender <span class="text-red-600 text-lg">*</span></label>
                                        <select name="gender" id="gender" class="form-control" required>
                                            <option value="">Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="points">Points (ML) <span class="text-red-600 text-lg">*</span></label>
                                        <input type="number" name="points" id="points" class="form-control" placeholder="Points in ML (Max 450)" min="0" max="450" required>
                                        <small class="text-danger" id="pointsError" style="display:none;">Cannot exceed 450 ML</small>
                                    </div>

                                    <div class="form-group">
                                        <label for="dob">Date of Birth <span class="text-red-600 text-lg">*</span></label>
                                        <input type="date" name="dob" id="dob" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="last_donation_date">Last Donation Date <small class="text-muted">( Leave empty if never donated )</small></label>
                                        <input type="date" name="last_donation_date" id="last_donation_date" class="form-control">

                                    </div>

                                    <div class="form-group">
                                        <label for="address">Address <span class="text-red-600 text-lg">*</span></label>
                                        <textarea name="address" id="address" class="form-control" placeholder="Complete Address" rows="2" required></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="country_id">Country <span class="text-red-600 text-lg">*</span></label>
                                        <select name="country_id" id="country_id" class="form-control" required>
                                            <option value="">Select Country</option>
                                            <?php if(isset($countries) && !empty($countries)): ?>
                                                <?php foreach($countries as $c): ?>
                                                    <option value="<?= $c['id'] ?>"><?= $c['name'] ?></option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="state_id">State <span class="text-red-600 text-lg">*</span></label>
                                        <select name="state_id" id="state_id" class="form-control" required>
                                            <option value="">Select State</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="city_id">City <span class="text-red-600 text-lg">*</span></label>
                                        <select name="city_id" id="city_id" class="form-control" required>
                                            <option value="">Select City</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="habits">Habits (Optional)</label>
                                <textarea name="habits" id="habits" class="form-control" placeholder="Any habits or medical conditions" rows="2"></textarea>
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="confirm_info" required>
                                    <label class="custom-control-label" for="confirm_info">
                                        I confirm that the information provided is accurate and the donor has consented to be listed.
                                    </label>
                                </div>
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-danger btn-lg w-full">
                                    <i class="fas fa-plus"></i> Add Donor
                                </button>

                            </div>
                        </form>
                    </div>
                </div>

                <!-- Donors List Section -->
                <div class="card" id="donors-section">
                    <div class="card-header">
                        <h3 class="card-title">My Added Donors</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="donorTable" class="table table-bordered table-hover table-sm" style="width:100%">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Blood Group</th>
                                    <th>Points (ML)</th>
                                    <th>Donation Score</th>
                                    <th>Last Donation</th>
                                    <th>Status</th>
                                    <th>Added Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>

    <!-- View Donor Modal -->
    <div class="modal fade" id="viewDonorModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-white">
                    <h5 class="modal-title">View Blood Donor</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body p-0">
                    <!-- Preloader -->
                    <div id="viewPreloader" class="text-center py-5" style="display:none;">
                        <div class="spinner-grow text-danger" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>

                    <!-- Details Section -->
                    <div id="viewContent" style="display:none;"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Donor Modal (EXACTLY donors.php wala design) -->
    <div class="modal fade" id="editDonorModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="editDonorForm">
                    <div class="modal-header bg-danger ">
                        <h5 class="modal-title">Edit Blood Donor</h5>
                        <button type="button" class="close text-white" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <!-- Preloader -->
                        <div id="editModalPreloader" class="text-center py-5" style="display:none;">
                            <div class="spinner-grow text-primary" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>

                        <div id="editModalForm">
                            <input type="hidden" name="id" id="edit_id">
                            <input type="hidden" name="user_id" value="<?= session()->get('app_user_id') ?>">

                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">Full Name :</label>
                                <input type="text" name="full_name" id="edit_full_name" class="form-control"
                                       placeholder="Donor Full Name" required>
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">Mobile :</label>
                                <input type="text" name="mobile" id="edit_mobile" class="form-control"
                                       placeholder="Mobile Number (11 digits)" required maxlength="11">
                                <small id="edit_mobileError" style="color:red; display:none;">Mobile number cannot exceed 11 digits</small>
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">Blood Group :</label>
                                <select name="blood_group" id="edit_blood_group" class="form-control select2bs4"
                                        style="width: 100%" required>
                                    <option value="">Select Blood Group</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                            </div>

                            <div class="form-group d-flex align-items-center ">
                                <label class="mr-2" style="width:120px;">Points (ML) :</label>
                                <input type="number"
                                       name="points"
                                       id="edit_points"
                                       class="form-control"
                                       placeholder="Enter points in ML (Max 450)"
                                       min="0"
                                       max="450"
                                       step="1"
                                       required>
                                <small id="edit_pointsError" style="color:red; display:none;">
                                    Donor cannot enter points more than 450 ML.
                                </small>
                                <small id="edit_unitError" style="color:red; display:none;">
                                    Only ML unit is allowed. No other unit accepted.
                                </small>
                            </div>

                            <!-- For User Portal, Donor Type is always "Free" and hidden -->
                            <input type="hidden" name="donor_type" value="Free">

                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">Gender :</label>
                                <select name="gender" id="edit_gender" class="form-control select2bs4" style="width: 100%"
                                        required>
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">Date of Birth :</label>
                                <input type="date" name="dob" id="edit_dob" class="form-control" required>
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">Last Donation <small class="text-muted">Leave empty if never donated</small></label>
                                <input type="date" name="last_donation_date" id="edit_last_donation_date"
                                       class="form-control">

                            </div>

                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">Habits :</label>
                                <textarea name="habits" id="edit_habits" class="form-control"
                                          placeholder="Habits"></textarea>
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">Country :</label>
                                <select name="country_id" id="edit_country_id" class="form-control select2bs4"
                                        style="width: 100%" required>
                                    <option value="">Select Country</option>
                                    <?php if(isset($countries) && !empty($countries)): ?>
                                        <?php foreach($countries as $c): ?>
                                            <option value="<?= $c['id'] ?>"><?= $c['name'] ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">State :</label>
                                <select name="state_id" id="edit_state_id" class="form-control select2bs4"
                                        style="width: 100%" required>
                                    <option value="">Select State</option>
                                </select>
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">City :</label>
                                <select name="city_id" id="edit_city_id" class="form-control select2bs4" style="width: 100%"
                                        required>
                                    <option value="">Select City</option>
                                </select>
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">Address :</label>
                                <textarea name="address" id="edit_address" class="form-control"
                                          placeholder="Address" required></textarea>
                            </div>

                            <!-- For User Portal, Status is always "Active" and hidden -->
                            <input type="hidden" name="status" value="Active">
                            <input type="hidden" name="latitude" id="edit_latitude">
                            <input type="hidden" name="longitude" id="edit_longitude">

                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="edit_confirm_info" required>
                                    <label class="custom-control-label" for="edit_confirm_info">
                                        I confirm that the information provided is accurate and the donor has consented to be listed.
                                    </label>
                                </div>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-danger">Update</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteConfirmModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Delete</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this donor? This action cannot be undone.</p>
                    <input type="hidden" id="delete_donor_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Select2 CSS & JS -->


    <script>
        $(document).ready(function() {
            let userId = <?= session()->get('app_user_id') ?>;
            let currentDonorId = null;

            // Toast notification function
            function showToast(message) {
                // Remove existing toast if any
                $('#toast-container').remove();

                // Create toast container
                const toast = $('<div id="toast-container"><div class="toast-message">' + message + '</div></div>');
                $('body').append(toast);

                // Animate toast in
                setTimeout(() => {
                    $('#toast-container').css('right', '20px');
                }, 10);

                // Animate toast out after 3 seconds
                setTimeout(() => {
                    $('#toast-container').css('right', '-400px');
                    // Remove after animation completes
                    setTimeout(() => {
                        $('#toast-container').remove();
                    }, 600);
                }, 3000);
            }

            // Load user stats
            function loadUserStats() {
                $.get("<?= site_url('user-donors/user_stats') ?>/" + userId, function(res) {
                    if(res.status === 'success') {
                        $('#totalDonors').text(res.data.total_donors);
                        $('#activeDonors').text(res.data.active_donors);
                        $('#totalPoints').text(res.data.total_points);
                        $('#avgScore').text(res.data.avg_score.toFixed(1));
                    }
                }, 'json');
            }

            // Initialize DataTable for user's donors
            let donorTable = $('#donorTable').DataTable({
                responsive: false,
                scrollX: false,
                processing: true,
                serverSide: false,
                ajax: {
                    url: "<?= site_url('user-donors/user_donors') ?>/" + userId,
                    type: "GET",
                    dataSrc: "data"
                },
                columns: [
                    {data: "id"},
                    {data: "full_name"},
                    {data: "mobile"},
                    {data: "blood_group"},
                    {data: "points"},
                    {data: "donation_score"},
                    {
                        // data: "last_donation_date",
                        // render: function(data) {
                        //     return data ? new Date(data).toLocaleDateString('en-GB') : '-';
                        // }
                        data: "last_donation_date",
                        render: function(data) {
                            return data ? new Date(data).toLocaleDateString('en-GB') : 'never donated before';
                        }
                    },
                    {
                        data: "status",
                        render: function(data) {
                            return '<span class="badge ' + (data === 'Active' ? 'badge-success' : 'badge-danger') + '">' + data + '</span>';
                        }
                    },
                    {
                        data: "created_at",
                        render: function(data) {
                            return data ? new Date(data).toLocaleDateString('en-GB') : '-';
                        }
                    },
                    {
                        data: null,
                        render: function(data) {
                            return `
                            <div class="btn-group">
                                <button class="btn btn-xs btn-info view-donor" data-id="${data.id}" title="View">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-xs btn-primary edit-donor" data-id="${data.id}" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-xs btn-danger delete-donor" data-id="${data.id}" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        `;
                        }
                    }
                ],
                order: [[0, 'desc']]
            });

            // Load countries for main form
            $.get("<?= site_url('user-donors/getCountries') ?>", function(countries) {
                let html = '<option value="">Select Country</option>';
                if(countries && countries.length > 0){
                    countries.forEach(c => html += `<option value="${c.id}">${c.name}</option>`);
                }
                $('#country_id').html(html);
                $('#edit_country_id').html(html);
            }, 'json').fail(function(){
                $('#country_id').html('<option value="">Select Country</option>');
                $('#edit_country_id').html('<option value="">Select Country</option>');
            });

            // Country change -> load states (main form)
            $('#country_id').change(function(){
                let countryId = $(this).val();
                $('#state_id').html('<option>Loading...</option>');
                $('#city_id').html('<option>Select City</option>');
                if(countryId){
                    $.get("<?= site_url('user-donors/getStates') ?>/"+countryId, function(states){
                        let html = '<option value="">Select State</option>';
                        states.forEach(s => html += `<option value="${s.id}">${s.name}</option>`);
                        $('#state_id').html(html);
                    }, 'json');
                } else {
                    $('#state_id').html('<option value="">Select State</option>');
                }
            });

            // Country change -> load states (edit form)
            $('#edit_country_id').change(function(){
                let countryId = $(this).val();
                $('#edit_state_id').html('<option>Loading...</option>');
                $('#edit_city_id').html('<option>Select City</option>');
                if(countryId){
                    $.get("<?= site_url('user-donors/getStates') ?>/"+countryId, function(states){
                        let html = '<option value="">Select State</option>';
                        states.forEach(s => html += `<option value="${s.id}">${s.name}</option>`);
                        $('#edit_state_id').html(html);
                        // Initialize Select2 after loading states
                        $('#edit_state_id').select2({
                            theme: "bootstrap4",
                            width: '100%'
                        });
                    }, 'json');
                } else {
                    $('#edit_state_id').html('<option value="">Select State</option>');
                }
            });

            // State change -> load cities (main form)
            $('#state_id').change(function(){
                let stateId = $(this).val();
                $('#city_id').html('<option>Loading...</option>');
                if(stateId){
                    $.get("<?= site_url('user-donors/getCities') ?>/"+stateId, function(cities){
                        let html = '<option value="">Select City</option>';
                        cities.forEach(c => html += `<option value="${c.id}">${c.name}</option>`);
                        $('#city_id').html(html);
                    }, 'json');
                } else {
                    $('#city_id').html('<option value="">Select City</option>');
                }
            });

            // State change -> load cities (edit form)
            $('#edit_state_id').change(function(){
                let stateId = $(this).val();
                $('#edit_city_id').html('<option>Loading...</option>');
                if(stateId){
                    $.get("<?= site_url('user-donors/getCities') ?>/"+stateId, function(cities){
                        let html = '<option value="">Select City</option>';
                        cities.forEach(c => html += `<option value="${c.id}">${c.name}</option>`);
                        $('#edit_city_id').html(html);
                        // Initialize Select2 after loading cities
                        $('#edit_city_id').select2({
                            theme: "bootstrap4",
                            width: '100%'
                        });
                    }, 'json');
                } else {
                    $('#edit_city_id').html('<option value="">Select City</option>');
                }
            });

            // Mobile number validation (11 digits max)
            $('#mobile').on('input', function() {
                let value = $(this).val();
                if(value.length > 11) {
                    $('#mobileError').show();
                    $(this).val(value.substring(0, 11));
                } else {
                    $('#mobileError').hide();
                }
            });

            $('#edit_mobile').on('input', function() {
                let value = $(this).val();
                if(value.length > 11) {
                    $('#edit_mobileError').show();
                    $(this).val(value.substring(0, 11));
                } else {
                    $('#edit_mobileError').hide();
                }
            });

            // Points validation (main form)
            $('#points').on('input', function() {
                let value = $(this).val();
                $('#pointsError').hide();

                // Only integers allowed
                if (!/^\d*$/.test(value)) {
                    $(this).val(value.replace(/[^0-9]/g, ""));
                    return;
                }

                value = parseInt(value) || 0;
                if(value > 450) {
                    $('#pointsError').show();
                    $(this).val(450);
                }
            });

            // Points validation (edit form)
            $('#edit_points').on('input', function() {
                let value = $(this).val();
                $('#edit_pointsError').hide();
                $('#edit_unitError').hide();

                // Only integers allowed
                if (!/^\d*$/.test(value)) {
                    $('#edit_unitError').text("Only numbers in ML are allowed.").show();
                    $(this).val(value.replace(/[^0-9]/g, ""));
                    return;
                }

                value = parseInt(value) || 0;
                if(value > 450) {
                    $('#edit_pointsError').show();
                    $(this).val(450);
                }
            });

            // Add donor form submission
            $('#donorForm').submit(function(e) {
                e.preventDefault();

                // Validate mobile number
                if($('#mobile').val().length > 11) {
                    showToast('Mobile number cannot exceed 11 digits');
                    return false;
                }

                // Check last donation eligibility
                let lastDonation = $('#last_donation_date').val();
                if(lastDonation) {
                    let threeMonthsAgo = new Date();
                    threeMonthsAgo.setMonth(threeMonthsAgo.getMonth() - 3);
                    let donationDate = new Date(lastDonation);

                    if(donationDate > threeMonthsAgo) {
                        showToast('Donor not eligible yet. Must wait 3 months since last donation.');
                        return false;
                    }
                }

                // Check points
                if(parseInt($('#points').val()) > 450) {
                    showToast('Points cannot exceed 450 ML');
                    return false;
                }

                $.post("<?= site_url('user-donors/user_store') ?>", $(this).serialize(), function(res) {
                    if(res.status === 'success') {
                        showToast('Donor added successfully!');
                        $('#donorForm')[0].reset();
                        donorTable.ajax.reload(null, false);
                        loadUserStats();

                        // Reset dropdowns
                        $('#country_id').val('');
                        $('#state_id').html('<option value="">Select State</option>');
                        $('#city_id').html('<option value="">Select City</option>');
                    } else {
                        showToast(res.message || 'Error adding donor');
                    }
                }, 'json').fail(function() {
                    showToast('Network error. Please try again.');
                });
            });

            // View donor (donors.php wala design)
            $(document).on('click', '.view-donor', function() {
                let donorId = $(this).data('id');

                // Reset content & show preloader
                $("#viewContent").hide().html("");
                $("#viewPreloader").show();
                $("#viewDonorModal").modal("show");

                $.get("<?= site_url('user-donors/view') ?>/" + donorId, function(data) {
                    setTimeout(function() {
                        // Check if donor belongs to current user
                        if(data.user_id != userId) {
                            showToast('You can only view donors added by you.');
                            $("#viewDonorModal").modal("hide");
                            return;
                        }

                        // Format dates
                        // const lastDonation = data.last_donation_date ? new Date(data.last_donation_date).toLocaleDateString('en-GB') : '-';
                        const lastDonation = data.last_donation_date ? new Date(data.last_donation_date).toLocaleDateString('en-GB') : 'never donated before';
                        const dob = data.dob ? new Date(data.dob).toLocaleDateString('en-GB') : '-';
                        const memberSince = data.created_at ? new Date(data.created_at).toLocaleString('en-GB') : '-';

                        // Build modal content exactly like donors.php
                        let html = `
                            <div class="card border-0 m-3">
                                <div class="card-header text-center text-white pt-5 pb-5 bg-danger">
                                    <h5 class="mb-0">${data.full_name}</h5>
                                    <h6 class="mb-0 font-weight-bold">Region : - ${data.city_name || '-'}, ${data.state_name || '-'}, ${data.country_name || '-'}</h6>
                                    <div class="py-3"></div>
                                    <div class="profile-img-wrapper">
                                        <img src="<?=base_url('assets/images/img_2.png')?>"
                                             class="rounded-circle custom-border"
                                             width="100" height="100" alt="User Avatar">
                                    </div>
                                </div>
                                <div class="card-body" style="background-color: rgba(0, 0, 0, .03)">
                                    <div class="py-3"></div>
                                    <div class="row text-center mb-3 mt-3">
                                        <div class="col">
                                            <small>POINTS</small><br>
                                            <span>${data.points || '-'}</span>
                                        </div>
                                        <div class="col">
                                            <small>Donation Score</small><br>
                                            <span>${data.donation_score || '-'}</span>
                                        </div>
                                        <div class="col">
                                            <small>VIEWS</small><br>
                                            <span>${data.views || '0'}</span>
                                        </div>
                                        <div class="col">
                                            <small>BLOOD GROUP</small><br>
                                            <span>${data.blood_group || '-'}</span>
                                        </div>
                                    </div>

                                    <div class="container-fluid">
                                        <div class="row border-bottom py-1">
                                            <div class="col-4 text-left font-weight-bold">Status:</div>
                                            <div class="col-8 text-right">
                                                <span class="badge badge-${data.status == 'Active' ? 'success' : 'danger'}">
                                                    ${data.status}
                                                </span>
                                            </div>
                                        </div>

                                        <div class="row border-bottom py-1">
                                            <div class="col-4 text-left font-weight-bold">Donor Type:</div>
                                            <div class="col-8 text-right">${data.donor_type || 'Free'}</div>
                                        </div>

                                        <div class="row border-bottom py-1">
                                            <div class="col-4 text-left font-weight-bold">Last Donation:</div>
                                            <div class="col-8 text-right">${lastDonation || 'never donated before'}</div>
                                        </div>

                                        <div class="row border-bottom py-1">
                                            <div class="col-4 text-left font-weight-bold">Date of Birth:</div>
                                            <div class="col-8 text-right">${dob}</div>
                                        </div>

                                        <div class="row border-bottom py-1">
                                            <div class="col-4 text-left font-weight-bold">Contact#:</div>
                                            <div class="col-8 text-right">${data.mobile || '-'}</div>
                                        </div>

                                        <div class="row border-bottom py-1">
                                            <div class="col-4 text-left font-weight-bold">Address:</div>
                                            <div class="col-8 text-right">${data.address || '-'}</div>
                                        </div>



                                        <div class="row border-bottom py-1">
                                            <div class="col-4 text-left font-weight-bold">Habits:</div>
                                            <div class="col-8 text-right">${data.habits || '-'}</div>
                                        </div>

                                        <div class="row border-bottom py-1">
                                            <div class="col-4 text-left font-weight-bold">Gender:</div>
                                            <div class="col-8 text-right">${data.gender || '-'}</div>
                                        </div>

                                        <div class="row border-bottom py-1">
                                            <div class="col-4 text-left font-weight-bold">Member Since:</div>
                                            <div class="col-8 text-right">${memberSince}</div>
                                        </div>

                                        <div class="row border-bottom py-1">
                                            <div class="col-4 text-left font-weight-bold">Added By:</div>
                                            <div class="col-8 text-right">
                                                You
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <style>
                                .custom-border {
                                    border: 4px solid #fff;
                                }
                                .profile-img-wrapper {
                                    position: absolute;
                                    left: 50%;
                                    bottom: -50px;
                                    transform: translateX(-50%);
                                }
                            </style>
                        `;

                        // Hide preloader, show content
                        $("#viewPreloader").hide();
                        $("#viewContent").html(html).fadeIn();
                    }, 500);
                }, "json").fail(function() {
                    $("#viewPreloader").hide();
                    showToast("Error loading donor details.");
                });
            });

            // Edit donor (EXACTLY donors.php wala style)
            $(document).on('click', '.edit-donor', function() {
                currentDonorId = $(this).data('id');

                // Hide form, show preloader
                $("#editModalForm").hide();
                $("#editModalPreloader").show();
                $("#editDonorModal").modal('show');

                $.get("<?= site_url('user-donors/edit') ?>/" + currentDonorId, function(data) {
                    // Check if donor belongs to current user
                    if(data.user_id != userId) {
                        showToast('You can only edit donors added by you.');
                        $("#editDonorModal").modal('hide');
                        return;
                    }

                    // Populate form fields
                    $('#edit_id').val(data.id);
                    $('#edit_full_name').val(data.full_name);
                    $('#edit_mobile').val(data.mobile);
                    $('#edit_points').val(data.points);

                    // Select2 dropdowns
                    $('#edit_blood_group').val(data.blood_group).trigger('change');
                    $('#edit_gender').val(data.gender).trigger('change');

                    $('#edit_dob').val(data.dob);
                    // $('#edit_last_donation_date').val(data.last_donation_date);
                    // In the edit donor function, update this line:
                    $('#edit_last_donation_date').val(data.last_donation_date || ''); // This will set empty string if NULspa class="text-red-600 text-lg" *n
                    $('#edit_habits').val(data.habits);

                    // Load country, state, city
                    $('#edit_country_id').val(data.country_id).trigger('change');

                    setTimeout(function() {
                        if(data.country_id) {
                            $.get("<?= site_url('user-donors/getStates') ?>/"+data.country_id, function(states){
                                let html = '<option value="">Select State</option>';
                                if(states && states.length > 0){
                                    states.forEach(s => html += `<option value="${s.id}" ${s.id == data.state_id ? 'selected' : ''}>${s.name}</option>`);
                                }
                                $('#edit_state_id').html(html);
                                $('#edit_state_id').val(data.state_id).trigger('change');

                                // Initialize Select2
                                $('#edit_state_id').select2({
                                    theme: "bootstrap4",
                                    width: '100%'
                                });

                                // Load cities
                                setTimeout(function() {
                                    if(data.state_id) {
                                        $.get("<?= site_url('user-donors/getCities') ?>/"+data.state_id, function(cities){
                                            let html = '<option value="">Select City</option>';
                                            if(cities && cities.length > 0){
                                                cities.forEach(c => html += `<option value="${c.id}" ${c.id == data.city_id ? 'selected' : ''}>${c.name}</option>`);
                                            }
                                            $('#edit_city_id').html(html);
                                            $('#edit_city_id').val(data.city_id).trigger('change');

                                            // Initialize Select2
                                            $('#edit_city_id').select2({
                                                theme: "bootstrap4",
                                                width: '100%'
                                            });
                                        }, 'json');
                                    }
                                }, 500);
                            }, 'json');
                        }
                    }, 500);

                    $('#edit_address').val(data.address);
                    $('#edit_latitude').val(data.latitude);
                    $('#edit_longitude').val(data.longitude);

                    $("#editModalPreloader").hide();
                    $("#editModalForm").fadeIn();

                    // Initialize Select2 for other dropdowns
                    setTimeout(function() {
                        $('.select2bs4').select2({
                            theme: "bootstrap4",
                            width: '100%'
                        });
                    }, 100);

                }, 'json').fail(function() {
                    $("#editModalPreloader").hide();
                    showToast("Error loading donor data.");
                });
            });

            // Initialize Select2 when edit modal opens
            $('#editDonorModal').on('show.bs.modal', function() {
                // Initialize Select2 for dropdowns
                $('.select2bs4').select2({
                    theme: "bootstrap4",
                    width: '100%'
                });
            });

            // Update donor
            $('#editDonorForm').submit(function(e) {
                e.preventDefault();

                // Validate mobile number
                if($('#edit_mobile').val().length > 11) {
                    showToast('Mobile number cannot exceed 11 digits');
                    return false;
                }

                // Check points
                let points = parseInt($('#edit_points').val());
                if(isNaN(points)) {
                    showToast('Please enter valid points in ML only.');
                    return false;
                }
                if(points > 450) {
                    showToast('Points cannot exceed 450 ML');
                    return false;
                }

                // Check last donation eligibility
                let lastDonation = $('#edit_last_donation_date').val();
                if(lastDonation) {
                    let threeMonthsAgo = new Date();
                    threeMonthsAgo.setMonth(threeMonthsAgo.getMonth() - 3);
                    let donationDate = new Date(lastDonation);

                    if(donationDate > threeMonthsAgo) {
                        showToast('Donor not eligible yet. Must wait 3 months since last donation.');
                        return false;
                    }
                }

                // Show preloader
                $("#editModalForm").hide();
                $("#editModalPreloader").show();

                $.post("<?= site_url('user-donors/user_store') ?>", $(this).serialize(), function(res) {
                    $("#editModalPreloader").hide();
                    $("#editModalForm").show();

                    if(res.status === 'success') {
                        showToast('Donor updated successfully!');
                        $("#editDonorModal").modal('hide');
                        donorTable.ajax.reload(null, false);
                        loadUserStats();
                    } else {
                        showToast(res.message || 'Error updating donor');
                    }
                }, 'json').fail(function() {
                    $("#editModalPreloader").hide();
                    $("#editModalForm").show();
                    showToast("Network error. Please try again.");
                });
            });

            // Delete donor button in edit modal
            $('#deleteDonorBtn').click(function() {
                $('#deleteConfirmModal').modal('show');
                $('#delete_donor_id').val(currentDonorId);
            });

            // Delete donor from table
            $(document).on('click', '.delete-donor', function() {
                let donorId = $(this).data('id');
                currentDonorId = donorId;

                // Check ownership
                $.get("<?= site_url('user-donors/edit') ?>/" + donorId, function(data) {
                    if(data.user_id != userId) {
                        showToast('You can only delete donors added by you.');
                        return;
                    }

                    $('#deleteConfirmModal').modal('show');
                    $('#delete_donor_id').val(donorId);
                }, 'json');
            });

            // Confirm delete
            $('#confirmDeleteBtn').click(function() {
                let donorId = $('#delete_donor_id').val();

                // Use POST method instead of DELETE for user portal
                $.post("<?= site_url('user-donors/delete') ?>/" + donorId, function(res) {
                    if(res.status === 'deleted' || res.status === 'success') {
                        showToast('Donor deleted successfully!');
                        $('#deleteConfirmModal').modal('hide');
                        $('#editDonorModal').modal('hide');
                        donorTable.ajax.reload(null, false);
                        loadUserStats();
                    } else {
                        showToast(res.message || 'Error deleting donor');
                    }
                }, 'json').fail(function() {
                    showToast('Network error. Please try again.');
                });
            });

            // Load initial stats
            loadUserStats();
        });
    </script>

<?= $this->endSection() ?>