<?= $this->extend('adminpannel/layouts/structure') ?>
<?= $this->section('title') ?>Blood Donors<?= $this->endSection() ?>
<?= $this->section('content') ?>

    <div class="content-wrapper">
        <!-- Page Header -->
        <div class="content-header">
            <div class="container-fluid">
                <h1 class="m-0 text-dark">Dashboard <small class="text-muted">Blood Donors</small></h1>
            </div>
        </div>

        <!-- Main Content -->
        <section class="content p-3">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title pt-1">Manage Blood Donors</h3>
                        <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#donorModal"
                                id="addDonorBtn">
                            <i class="fa fa-plus"></i> Add Donor
                        </button>
                        <!--                        <button class="btn btn-info btn-sm float-right mr-1" data-toggle="modal" data-target="#importModal">-->
                        <!--                            <i class="fa fa-file-import"></i> Import From Excel-->
                        <!--                        </button>-->
                        <!-- ✅ YEH NAYA BUTTON ADD KARO -->
                        <button class="btn btn-info btn-sm float-right mr-1" id="updateScoresBtn">
                            <i class="fa fa-calculator"></i> Update All Scores
                        </button>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="donorTable" class="table table-bordered table-sm text-sm" style="width:100%">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Country</th>
                                    <th>BG</th>
                                    <th>Points</th>
                                    <th>Donation Score</th>
                                    <th>Views</th>
                                    <th>Type</th>
                                    <th>Gender</th>
                                    <th>Status</th>
                                    <th>Added By</th> <!-- NEW HEADER -->
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tfoot class="text-sm">
                                <tr>
                                    <th><input type="text" class="form-control form-control-sm border-0"
                                               placeholder="ID"></th>
                                    <th><input type="text" class="form-control form-control-sm border-0"
                                               placeholder="Name"></th>
                                    <th><input type="text" class="form-control form-control-sm border-0"
                                               placeholder="Mobile"></th>
                                    <th><input type="text" class="form-control form-control-sm border-0"
                                               placeholder="City"></th>
                                    <th><input type="text" class="form-control form-control-sm border-0"
                                               placeholder="State"></th>
                                    <th><input type="text" class="form-control form-control-sm border-0"
                                               placeholder="Country"></th>
                                    <th>
                                        <select class="form-control form-control-sm filter-blood select2bs4"
                                                style="width: 100%">
                                            <option value="">All</option>
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                        </select>
                                    </th>
                                    <th><input type="text" class="form-control form-control-sm border-0"
                                               placeholder="Points"></th>
                                    <th><input type="text" class="form-control form-control-sm border-0"
                                               placeholder="Donation Score"></th>
                                    <th><input type="text" class="form-control form-control-sm border-0"
                                               placeholder="Views"></th>
                                    <th>
                                        <select class="form-control form-control-sm filter-type select2bs4"
                                                style="width: 100%">
                                            <option value="">All</option>
                                            <option value="Free">Free</option>
                                            <option value="Paid">Paid</option>
                                        </select>
                                    </th>
                                    <th>
                                        <select class="form-control form-control-sm filter-gender select2bs4"
                                                style="width: 100%">
                                            <option value="">All</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </th>
                                    <th>
                                        <select class="form-control form-control-sm filter-status select2bs4"
                                                style="width: 100%">
                                            <option value="">All</option>
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </th>
                                    <th><input type="text" class="form-control form-control-sm border-0"
                                               placeholder="Added By"></th> <!-- NEW FILTER -->
                                    <th></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="donorModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="donorForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitle">Add Blood Donor</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">

                        <!-- Preloader -->
                        <div id="modalPreloader" class="text-center py-5" style="display:none;">
                            <div class="spinner-grow text-primary" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>

                        <div id="modalForm">
                            <input type="hidden" name="id" id="id">

                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">Full Name :</label>
                                <input type="text" name="full_name" id="full_name" class="form-control"
                                       placeholder="Donor Full Name" required>
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">Mobile :</label>
                                <input type="number" name="mobile" id="mobile" class="form-control"
                                       placeholder="Mobile Number" required>
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">Blood Group :</label>
                                <select name="blood_group" id="blood_group" class="form-control select2bs4"
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

                            <!--                            <div class="form-group d-flex align-items-center">-->
                            <!--                                <label class="mr-2" style="width:120px;">Points :</label>-->
                            <!--                                <input type="number" name="points" id="points" class="form-control"-->
                            <!--                                       placeholder="How many points of blood donated" required>-->
                            <!--                            </div>-->
                            <div class="form-group d-flex align-items-center ">
                                <label class="mr-2" style="width:120px;">Points (ML) :</label>

                                <input type="number"
                                       name="points"
                                       id="points"
                                       class="form-control"
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

                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">Donor Type :</label>
                                <select name="donor_type" id="donor_type" class="form-control select2bs4"
                                        style="width: 100%" required>
                                    <option value="">Select Type</option>
                                    <option value="Free">Free</option>
                                    <option value="Paid">Paid</option>
                                </select>
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">Gender :</label>
                                <select name="gender" id="gender" class="form-control select2bs4" style="width: 100%"
                                        required>
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">Date of Birth :</label>
                                <input type="date" name="dob" id="dob" class="form-control" required>
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">Last Donation :</label>
                                <input type="date" name="last_donation_date" id="last_donation_date"
                                       class="form-control">
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">Habits :</label>
                                <textarea name="habits" id="habits" class="form-control"
                                          placeholder="Habits"></textarea>
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">Country :</label>
                                <select name="country_id" id="country_id" class="form-control select2bs4"
                                        style="width: 100%" required>
                                    <option value="">Select Country</option>
                                    <?php if (isset($countries) && !empty($countries)): ?>
                                        <?php foreach ($countries as $c): ?>
                                            <option value="<?= $c['id'] ?>"><?= $c['name'] ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">State :</label>
                                <select name="state_id" id="state_id" class="form-control select2bs4"
                                        style="width: 100%" required>
                                    <option value="">Select State</option>
                                </select>
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">City :</label>
                                <select name="city_id" id="city_id" class="form-control select2bs4" style="width: 100%"
                                        required>
                                    <option value="">Select City</option>
                                </select>
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">Address :</label>
                                <textarea name="address" id="address" class="form-control"
                                          placeholder="Address" required></textarea>
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">Search Location :</label>
                                <input type="text" id="location_search" class="form-control"
                                       placeholder="Enter a location">
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:100px;">Or pick from map :</label>
                                <div id="map" style="height:250px; flex:1;"></div>
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">Latitude :</label>
                                <input type="text" name="latitude" id="latitude" class="form-control"
                                       placeholder="0.000000">
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">Longitude :</label>
                                <input type="text" name="longitude" id="longitude" class="form-control"
                                       placeholder="0.000000">
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">Status :</label>
                                <select name="status" id="status" class="form-control select2bs4" style="width: 100%"
                                        required>
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- View Modal -->
    <div class="modal fade" id="viewModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header bg-white">
                    <h5 class="modal-title">View Blood Donor</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>

                <div class="modal-body p-0">

                    <!-- Preloader -->
                    <div id="viewPreloader" class="text-center py-5" style="display:none;">
                        <div class="spinner-grow text-primary" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>

                    <!-- Details Section -->
                    <div id="viewContent" style="display:none;"></div>

                </div>
            </div>
        </div>
    </div>

    <!-- jQuery & AJAX -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>

        $(document).ready(function () {
            let table = $("#donorTable").DataTable({
                responsive: false,
                scrollX: false,
                processing: true,
                serverSide: false,
                ajax: {
                    url: "<?= site_url('donors/fetch') ?>",
                    type: "GET",
                    dataSrc: "data"
                },
                columns: [
                    {data: "id"},             // 0
                    {data: "full_name"},      // 1
                    {data: "mobile"},         // 2
                    {data: "city_name"},      // 3
                    {data: "state_name"},     // 4
                    {data: "country_name"},   // 5
                    {data: "blood_group"},    // 6
                    {data: "points"},         // 7
                    {data: "donation_score"}, // 8
                    {data: "views"},          // 9
                    {data: "donor_type"},     // 10
                    {data: "gender"},         // 11
                    {data: "status"},         // 12
                    {data: "added_by_name"},  // 13 - NEW COLUMN
                    {                          // 14 - Action column
                        data: null,
                        render: function (data, type, row) {
                            return `
                <div class="btn-group">
                    <button type="button" class="btn btn-xs btn-info viewBtn" data-id="${row.id}">
                        <i class="fas fa-eye"></i>
                    </button>
                    <button type="button" class="btn btn-xs btn-primary editBtn" data-id="${row.id}">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-xs btn-danger deleteBtn" data-id="${row.id}">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </div>
            `;
                        },
                        orderable: false,
                        searchable: false
                    }
                ],
                order: [[0, 'desc']],
                initComplete: function () {
                    let api = this.api();

                    // Text filters for specific columns (updated for 14 columns)
                    const textFilterColumns = [0, 1, 2, 3, 4, 5, 7, 8, 9, 13]; // Added 13 for "Added By"
                    textFilterColumns.forEach(colIndex => {
                        $('input', api.column(colIndex).footer()).on('keyup change', function () {
                            if (api.column(colIndex).search() !== this.value) {
                                api.column(colIndex).search(this.value).draw();
                            }
                        });
                    });


                    // ✅ CORRECTED: Initialize Select2 for filter dropdowns
                    setTimeout(function () {
                        $('.filter-blood').select2({
                            theme: "bootstrap4",
                            width: '100%',
                            allowClear: false
                        });

                        $('.filter-type').select2({
                            theme: "bootstrap4",
                            width: '100%',
                            allowClear: false
                        });

                        $('.filter-gender').select2({
                            theme: "bootstrap4",
                            width: '100%',
                            allowClear: false
                        });

                        $('.filter-status').select2({
                            theme: "bootstrap4",
                            width: '100%',
                            allowClear: false
                        });

                        // ✅ Force "All" option to be selected by default
                        $('.filter-blood').val('').trigger('change');
                        $('.filter-type').val('').trigger('change');
                        $('.filter-gender').val('').trigger('change');
                        $('.filter-status').val('').trigger('change');
                    }, 100);

                    // Filter change events
                    $('.filter-blood').on('change', function () {
                        let val = $(this).val();
                        api.column(6).search(val ? '^' + $.fn.dataTable.util.escapeRegex(val) + '$' : '', true, false).draw();
                    });

                    $('.filter-type').on('change', function () {
                        let val = $(this).val();
                        api.column(10).search(val ? '^' + val + '$' : '', true, false).draw();
                    });

                    $('.filter-gender').on('change', function () {
                        let val = $(this).val();
                        api.column(11).search(val ? '^' + val + '$' : '', true, false).draw();
                    });

                    $('.filter-status').on('change', function () {
                        let val = $(this).val();
                        api.column(12).search(val ? '^' + val + '$' : '', true, false).draw();
                    });
                }
            });

            // Reset form when Add button is clicked
            $('#addDonorBtn').click(function () {
                $('#modalTitle').text('Add Blood Donor');
                $('#donorForm')[0].reset();
                $('#id').val('');

                $('#blood_group').val('').trigger('change');
                $('#donor_type').val('').trigger('change');
                $('#gender').val('').trigger('change');
                $('#status').val('Active').trigger('change');
                $('#country_id').val('').trigger('change');
                $('#state_id').html('<option value="">Select State</option>');
                $('#city_id').html('<option value="">Select City</option>');
            });

            // Country change -> load states
            $('#country_id').change(function () {
                let countryId = $(this).val();
                $('#state_id').html('<option value="">Loading...</option>');
                $('#city_id').html('<option value="">Select City</option>');
                if (countryId) {
                    $.get("<?= site_url('donors/getStates') ?>/" + countryId, function (states) {
                        let html = '<option value="">Select State</option>';
                        if (states && states.length > 0) {
                            states.forEach(s => html += `<option value="${s.id}">${s.name}</option>`);
                        }
                        $('#state_id').html(html);
                    }, 'json').fail(function () {
                        $('#state_id').html('<option value="">Select State</option>');
                    });
                } else {
                    $('#state_id').html('<option value="">Select State</option>');
                }
            });

            // State change -> load cities
            $('#state_id').change(function () {
                let stateId = $(this).val();
                $('#city_id').html('<option value="">Loading...</option>');
                if (stateId) {
                    $.get("<?= site_url('donors/getCities') ?>/" + stateId, function (cities) {
                        let html = '<option value="">Select City</option>';
                        if (cities && cities.length > 0) {
                            cities.forEach(c => html += `<option value="${c.id}">${c.name}</option>`);
                        }
                        $('#city_id').html(html);
                    }, 'json').fail(function () {
                        $('#city_id').html('<option value="">Select City</option>');
                    });
                } else {
                    $('#city_id').html('<option value="">Select City</option>');
                }
            });

            // Save donor
            $("#donorForm").submit(function (e) {
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

                // Don't show preloader until after eligibility check
                let lastDonation = $('#last_donation_date').val();
                if (lastDonation) {
                    let threeMonthsAgo = new Date();
                    threeMonthsAgo.setMonth(threeMonthsAgo.getMonth() - 3);
                    let donationDate = new Date(lastDonation);

                    if (donationDate > threeMonthsAgo) {
                        alert('Donor not eligible yet. Must wait 3 months.');
                        return false;
                    }
                }

                // Now show preloader and submit
                $("#modalForm").hide();
                $("#modalPreloader").show();

                $.post("<?= site_url('donors/store') ?>", $(this).serialize(), function (res) {
                    $("#modalPreloader").hide();
                    $("#modalForm").show();

                    if (res.status == "success") {
                        $("#donorModal").modal('hide');
                        $("#donorForm")[0].reset();
                        table.ajax.reload(null, false);

                        if ($("#id").val()) {
                            showToast("Data edited successfully!");
                        } else {
                            showToast("Data saved successfully!");
                        }
                    } else if (res.status == "error") {
                        alert(res.message);
                    }
                }, 'json').fail(function () {
                    $("#modalPreloader").hide();
                    $("#modalForm").show();
                    alert("Error saving donor data.");
                });
            });

            // Edit donor
            $("#donorTable").on("click", ".editBtn", function () {
                let id = $(this).data("id");
                $("#modalForm").hide();
                $("#modalPreloader").show();
                $("#modalTitle").text('Edit Blood Donor');
                $("#donorModal").modal('show');

                $.get("<?= site_url('donors/edit') ?>/" + id, function (data) {
                    $("#id").val(data.id);
                    $("#full_name").val(data.full_name);
                    $("#mobile").val(data.mobile);
                    $("#points").val(data.points);

                    // Select2 dropdowns
                    $("#blood_group").val(data.blood_group).trigger('change');
                    $("#donor_type").val(data.donor_type).trigger('change');
                    $("#gender").val(data.gender).trigger('change');
                    $("#status").val(data.status).trigger('change');

                    $("#dob").val(data.dob);
                    $("#last_donation_date").val(data.last_donation_date);
                    $("#habits").val(data.habits);

                    // Load country, state, city
                    $("#country_id").val(data.country_id).trigger('change');

                    setTimeout(function () {
                        if (data.state_id) {
                            $("#state_id").val(data.state_id).trigger('change');
                            setTimeout(function () {
                                if (data.city_id) {
                                    $("#city_id").val(data.city_id).trigger('change');
                                }
                            }, 500);
                        }
                    }, 500);

                    $("#address").val(data.address);
                    $("#latitude").val(data.latitude);
                    $("#longitude").val(data.longitude);

                    $("#modalPreloader").hide();
                    $("#modalForm").fadeIn();
                }, 'json').fail(function () {
                    $("#modalPreloader").hide();
                    alert("Error loading donor data.");
                });
            });

            // Delete donor
            $("#donorTable").on("click", ".deleteBtn", function () {
                let id = $(this).data("id");
                if (confirm("Are you sure you want to delete this donor?")) {
                    $.get("<?= site_url('donors/delete') ?>/" + id, function (res) {
                        if (res.status == "deleted") {
                            table.ajax.reload(null, false);
                            showToast("Data deleted successfully!");
                        }
                    }, 'json').fail(function () {
                        alert("Error deleting donor.");
                        table.ajax.reload(null, false);
                        showToast("Data deleted successfully!");
                    });
                }
            });

            // View donor
            $("#donorTable").on("click", ".viewBtn", function () {
                let id = $(this).data("id");

                // Reset content & show preloader
                $("#viewContent").hide().html("");
                $("#viewPreloader").show();
                $("#viewModal").modal("show");

                // AJAX call
                $.get("<?= site_url('donors/view') ?>/" + id, function (data) {
                    setTimeout(function () {
                        // Format dates
                        const lastDonation = data.last_donation_date ? new Date(data.last_donation_date).toLocaleDateString('en-GB') : '-';
                        const dob = data.dob ? new Date(data.dob).toLocaleDateString('en-GB') : '-';
                        const memberSince = data.created_at ? new Date(data.created_at).toLocaleString('en-GB') : '-';

                        // Build modal content
                        let html = `
                            <div class="card border-0 m-3">
                                <div class="card-header text-center text-white pt-5 pb-5 bg-primary">
                                    <h5 class="mb-0">${data.full_name}</h5>
                                    <h6 class="mb-0 font-weight-bold">Region : - ${data.city_name}, ${data.state_name}, ${data.country_name}</h6>
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
                                            <span>${data.views || '-'}</span>
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
                                                <span class="badge badge-${data.status == 'Active' ? 'primary' : 'danger'}">
                                                    ${data.status}
                                                </span>
                                            </div>
                                        </div>

                                        <div class="row border-bottom py-1">
                                            <div class="col-4 text-left font-weight-bold">Donor Type:</div>
                                            <div class="col-8 text-right">${data.donor_type || '-'}</div>
                                        </div>

                                        <div class="row border-bottom py-1">
                                            <div class="col-4 text-left font-weight-bold">Last Donation:</div>
                                            <div class="col-8 text-right">${lastDonation}</div>
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
                                            <div class="col-4 text-left font-weight-bold">Location:</div>
                                            <div class="col-8 text-right">${data.latitude || '-'}, ${data.longitude || '-'}</div>
                                        </div>

                                        <div class="row border-bottom py-1">
                                            <div class="col-4 text-left font-weight-bold">Habits:</div>
                                            <div class="col-8 text-right">${data.habits || '-'}</div>
                                        </div>

                                        <div class="row border-bottom py-1">
                                            <div class="col-4 text-left font-weight-bold">Added by:</div>
                                            <div class="col-8 text-right">645</div>
                                        </div>

                                        <div class="row py-1">
                                            <div class="col-4 text-left font-weight-bold">Member Since:</div>
                                            <div class="col-8 text-right">${memberSince}</div>
                                        </div>

                                        <div class="row border-bottom py-1">
                                             <div class="col-4 text-left font-weight-bold">Added By:</div>
                                             <div class="col-8 text-right">
                                               ${data.added_by_name ? data.added_by_name + ' (' + data.added_by_reg_no + ')' : 'Admin'}
                                             </div>
                                        </div>

                                        <div class="row border-bottom py-1">
                                            <div class="col-4 text-left font-weight-bold">Added By Contact:</div>
                                            <div class="col-8 text-right">${data.added_by_mobile || '-'}</div>
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
                }, "json").fail(function () {
                    $("#viewPreloader").hide();
                    alert("Error loading donor details.");
                });
            });

            // Initialize Select2 when modal opens
            $('#donorModal').on('show.bs.modal', function () {
                $('.select2bs4').select2({
                    theme: "bootstrap4",
                    width: '100%'
                });
            });

            $('#updateScoresBtn').click(function () {
                // Show loading
                var $btn = $(this);
                $.get("<?= site_url('donors/update-all-scores') ?>", function (res) {
                    // Reset button
                    $btn.html('<i class="fa fa-calculator"></i> Update All Scores').prop('disabled', false);

                    //  Direct toast message - exactly like  existing toasts
                    showToast("Scores updated successfully!");

                    // Refresh table to show updated scores
                    table.ajax.reload(null, false);

                }).fail(function () {
                    // Reset button on error
                    $btn.html('<i class="fa fa-calculator"></i> Update All Scores').prop('disabled', false);
                    showToast("Error updating scores!");

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

        // Initialize Google Map
        let map, marker, searchBox;

        function initMap() {
            const defaultLatLng = {lat: 24.8607, lng: 67.0011};
            map = new google.maps.Map(document.getElementById("map"), {
                zoom: 12,
                center: defaultLatLng
            });

            marker = new google.maps.Marker({
                position: defaultLatLng,
                map: map,
                draggable: true
            });

            // Create search box
            const input = document.getElementById('location_search');
            searchBox = new google.maps.places.SearchBox(input);

            // Update inputs when marker is dragged
            marker.addListener('dragend', function () {
                $('#latitude').val(marker.getPosition().lat());
                $('#longitude').val(marker.getPosition().lng());
            });

            // Update marker when place is selected
            searchBox.addListener('places_changed', function () {
                const places = searchBox.getPlaces();
                if (places.length === 0) return;
                const place = places[0];
                map.setCenter(place.geometry.location);
                marker.setPosition(place.geometry.location);
                $('#latitude').val(place.geometry.location.lat());
                $('#longitude').val(place.geometry.location.lng());
            });

            // Click on map to set marker
            map.addListener('click', function (event) {
                marker.setPosition(event.latLng);
                $('#latitude').val(event.latLng.lat());
                $('#longitude').val(event.latLng.lng());
            });
        }

        // Toast function (if not defined)
        function showToast(message) {
            // Simple toast implementation - you can replace with your preferred toast library
            alert(message);
        }
    </script>
<?php $googleMapsKey = getenv('GOOGLE_MAPS_API_KEY'); ?>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=<?= $googleMapsKey ?>&callback=initMap"></script>


<?= $this->endSection() ?>