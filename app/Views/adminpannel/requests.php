<?= $this->extend('adminpannel/layouts/structure') ?>
<?= $this->section('title') ?>Blood Requests<?= $this->endSection() ?>
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
                        <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#donorModal" id="addDonorBtn">
                            <i class="fa fa-plus"></i> Add Request
                        </button>
                        <button class="btn btn-info btn-sm float-right mr-1" data-toggle="modal" data-target="#importModal">
                            <i class="fa fa-file-import"></i> Import From Excel
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
                                    <th>Bags</th>
                                    <th>hospital</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody></tbody>
                                <tfoot class="text-sm">
                                <tr>
                                    <th><input type="text" class="form-control form-control-sm border-0" placeholder="ID"></th>
                                    <th><input type="text" class="form-control form-control-sm border-0" placeholder="Name"></th>
                                    <th><input type="text" class="form-control form-control-sm border-0" placeholder="Mobile"></th>
                                    <th><input type="text" class="form-control form-control-sm border-0" placeholder="City"></th>
                                    <th><input type="text" class="form-control form-control-sm border-0" placeholder="State"></th>
                                    <th><input type="text" class="form-control form-control-sm border-0" placeholder="Country"></th>
                                    <th><input type="text" class="form-control form-control-sm border-0" placeholder="Blood Group"></th>
                                    <th><input type="text" class="form-control form-control-sm border-0" placeholder="Bags"></th>
                                    <th><input type="text" class="form-control form-control-sm border-0" placeholder="Hospital"></th>

                                    <th>
                                        <select class="form-control form-control-sm filter-state select2bs4 " style="width: 100%">
                                            <option value="">All</option>
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </th>
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
                        <h5 class="modal-title" id="modalTitle">Add Blood Request</h5>
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
                                <input type="text" name="mobile" id="mobile" class="form-control"
                                       placeholder="Mobile Number" required>
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">Blood Group :</label>
                                <select name="blood_group" id="blood_group" class="form-control select2bs4" style="width: 100%" required>
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


                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">Message :</label>
                                <textarea name="message" id="message" class="form-control" placeholder="Enter a Message"></textarea>
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">No of bags :</label>
                                <input type="text" name="bags" id="bags" class="form-control"
                                       placeholder="no of bags" required>
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
                                <select name="city_id" id="city_id" class="form-control select2bs4" style="width: 100%" required>
                                    <option value="">Select City</option>
                                </select>
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">Hospital :</label>
                                <textarea name="hospital" id="hospital" class="form-control "
                                          placeholder="Hospital Address" required></textarea>
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
                                <select name="status" id="status" class="form-control select2bs4" style="width: 100%" required>
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
                responsive: false,   // responsive: false rakhna warna wo columns ko hide kar dega
                scrollX: false,
                ajax: "<?= site_url('requests/fetch') ?>",
                columns: [
                    {data: "id"},
                    {data: "full_name"},
                    {data: "mobile"},
                    {data: "city_name"},
                    {data: "state_name"},
                    {data: "country_name"},
                    {data: "blood_group"},
                    {data: "bags"},
                    {data: "hospital"},
                    {data: "status"},
                    {
                        data: null, render: function (data, type, row) {
                            return `
                                <div class="btn-group">
                                    <button type="button" class="btn btn-xs btn-info viewBtn" data-id="${row.id}"><i class="fas fa-eye fa-align-left"></i></button>
                                    <button type="button" class="btn btn-xs btn-primary editBtn" data-id="${row.id}"><i class="fas fa-edit fa-align-center"></i></button>
                                    <button type="button" class="btn btn-xs btn-danger deleteBtn" data-id="${row.id}"><i class="fas fa-trash-alt fa-align-right"></i></button>
                                </div>
                            `;
                        }
                    }
                ],
                initComplete: function () {
                    let api = this.api();

                    // Text filters
                    api.columns([0,1,2,3,4,5,7,8]).every(function () {
                        let that = this;
                        $('input', this.footer()).on('keyup change clear', function () {
                            if (that.search() !== this.value) {
                                that.search(this.value).draw();
                            }
                        });
                    });

                    // Dropdown filters
                    // const dropdownFilters = [
                    //     {column: 6, selector: 'select:eq(0)'}, // Blood Group
                    //     {column: 9, selector: 'select:eq(1)'}, // Donor Type
                    //     {column: 10, selector: 'select:eq(2)'}, // Gender
                    //     {column: 11, selector: 'select:eq(3)'} // Status
                    // ];
                    // api.column(6).every(function () {
                    //     let column = this;
                    //     $('.filter-blood').on('change', function () {
                    //         let val = $(this).val();
                    //         column.search(val ? '^' + val + '$' : '', true, false).draw();
                    //     });
                    // });
                    // api.column(10).every(function () {
                    //     let column = this;
                    //     $('.filter-gender').on('change', function () {
                    //         let val = $(this).val();
                    //         column.search(val ? '^' + val + '$' : '', true, false).draw();
                    //     });
                    // });
                    // api.column(9).every(function () {
                    //     let column = this;
                    //     $('.filter-type').on('change', function () {
                    //         let val = $(this).val();
                    //         column.search(val ? '^' + val + '$' : '', true, false).draw();
                    //     });
                    // });
                    api.column(9).every(function () {
                        let column = this;
                        $('.filter-state').on('change', function () {
                            let val = $(this).val();
                            column.search(val ? '^' + val + '$' : '', true, false).draw();
                        });
                    });



                    dropdownFilters.forEach(filter => {
                        let dropdown = $(filter.selector, api.table().footer());

                        // Force destroy old select2 if exists
                        if (dropdown.data('select2')) {
                            dropdown.select2('destroy');
                        }

                        // Re-initialize
                        dropdown.select2({
                            theme: "bootstrap4",
                            width: '100%',
                            placeholder: "All",
                            allowClear: true
                        });

                        // Event binding
                        dropdown.on('change', function () {
                            let val = $(this).val();
                            if (val) {
                                api.column(filter.column).search('^' + val + '$', true, false).draw();
                            } else {
                                api.column(filter.column).search('').draw();
                            }
                        });
                    });
                }
            });

            // Reset form when Add button is clicked
            $('#addDonorBtn').click(function() {
                $('#modalTitle').text('Add Blood Request');
                $('#donorForm')[0].reset();
                $('#id').val('');
                $("#blood_group").val("").trigger("change");
                $("#status").val("Active").trigger("change");
                $('#country_id').val('').trigger('change');
                $('#state_id').val('').trigger('change');
                $('#city_id').val('').trigger('change');
            });

            // Country change -> load states
            $('#country_id').change(function () {
                let countryId = $(this).val();
                $('#state_id').html('<option>Loading...</option>');
                $('#city_id').html('<option>Select City</option>');
                if (countryId) {
                    $.get("<?= site_url('requests/getStates') ?>/" + countryId, function (states) {
                        let html = '<option value="">Select State</option>';
                        states.forEach(s => html += `<option value="${s.id}">${s.name}</option>`);
                        $('#state_id').html(html);
                    }, 'json');
                } else {
                    $('#state_id').html('<option value="">Select State</option>');
                }
            });

            // State change -> load cities
            $('#state_id').change(function () {
                let stateId = $(this).val();
                $('#city_id').html('<option>Loading...</option>');
                if (stateId) {
                    $.get("<?= site_url('requests/getCities') ?>/" + stateId, function (cities) {
                        let html = '<option value="">Select City</option>';
                        cities.forEach(c => html += `<option value="${c.id}">${c.name}</option>`);
                        $('#city_id').html(html);
                    }, 'json');
                } else {
                    $('#city_id').html('<option value="">Select City</option>');
                }
            });

            // Save donor
            $("#donorForm").submit(function (e) {
                e.preventDefault();


                // Now show preloader and submit
                $("#modalForm").hide();
                $("#modalPreloader").show();

                $.post("<?= site_url('requests/store') ?>", $(this).serialize(), function (res) {
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
                }, 'json');
            });




// Edit donor
            $("#donorTable").on("click", ".editBtn", function () {
                let id = $(this).data("id");

                $.get("<?= site_url('requests/edit') ?>/" + id, function (data) {
                    $("#id").val(data.id);
                    $("#full_name").val(data.full_name);
                    $("#mobile").val(data.mobile);
                    $("#bags").val(data.bags);
                    $("#message").val(data.message);
                    $("#hospital").val(data.hospital);
                    $("#latitude").val(data.latitude);
                    $("#longitude").val(data.longitude);

                    // ✅ dropdowns & select2 fix
                    $("#blood_group").val(data.blood_group).trigger('change');
                    $("#status").val(data.status).trigger('change');

                    // ✅ cascade dropdowns (country → state → city)
                    $("#country_id").val(data.country_id).trigger('change');
                    setTimeout(function () {
                        $("#state_id").val(data.state_id).trigger('change');
                        setTimeout(function () {
                            $("#city_id").val(data.city_id).trigger('change');
                        }, 500);
                    }, 500);

                    // Show modal
                    $("#modalPreloader").hide();
                    $("#modalForm").fadeIn();
                    $("#donorModal").modal('show');
                }, 'json');
            });


            // Delete donor
            $("#donorTable").on("click", ".deleteBtn", function () {
                let id = $(this).data("id");
                if (confirm("Are you sure?")) {
                    $.get("<?= site_url('requests/delete') ?>/" + id, function (res) {
                        if (res.status == "deleted") table.ajax.reload(null, false);
                        if (res.status == "deleted") {
                            table.ajax.reload(null, false);
                            showToast("Data deleted successfully!");
                        }
                    }, 'json');
                }
            });

            $('#donorModal').on('show.bs.modal', function () {
                $("#modalForm").hide();
                $("#modalPreloader").show();
                setTimeout(function () {
                    $("#modalPreloader").hide();
                    $("#modalForm").fadeIn();
                }, 500); // half-second delay
            });

            // View donor
            $("#donorTable").on("click", ".viewBtn", function () {
                let id = $(this).data("id");

                // Reset content & show preloader
                $("#viewContent").hide().html("");
                $("#viewPreloader").show();
                $("#viewModal").modal("show");

                // AJAX call
                $.get("<?= site_url('requests/view') ?>/" + id, function (data) {
                    setTimeout(function () {
                        // Format dates
                        const dob = data.dob ? new Date(data.dob).toLocaleDateString('en-GB') : '-';
                        const memberSince = data.created_at ? new Date(data.created_at).toLocaleString('en-GB') : '-';

                        // Build modal content
                        let html = `
                            <div class="card border-0 m-3">
                                <div class="card-header text-center text-white pt-5 pb-5 bg-primary" >

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
                                            <small>No. of units</small><br>
                                            <span>${data.bags || '-'}</span>
                                        </div>
                                        <div class="col">
                                            <small>Views</small><br>
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
                                                <span class="badge badge-${data.status == 'Active' ? 'primary' : 'danger'}">
                                                    ${data.status}
                                                </span>
                                            </div>
                                        </div>






                                        <div class="row border-bottom py-1">
                                            <div class="col-4 text-left font-weight-bold">Contact#:</div>
                                            <div class="col-8 text-right">${data.mobile || '-'}</div>
                                        </div>

                                        <div class="row border-bottom py-1">
                                            <div class="col-4 text-left font-weight-bold">Hospital:</div>
                                            <div class="col-8 text-right">${data.hospital || '-'}</div>
                                        </div>

                                        <div class="row border-bottom py-1">
                                            <div class="col-4 text-left font-weight-bold">Location:</div>
                                            <div class="col-8 text-right">${data.latitude || '-'}, ${data.longitude || '-'}</div>
                                        </div>

                                        <div class="row border-bottom py-1">
                                            <div class="col-4 text-left font-weight-bold">Message:</div>
                                            <div class="col-8 text-right">${data.message || '-'}</div>
                                        </div>

                                        <div class="row border-bottom py-1">
                                            <div class="col-4 text-left font-weight-bold">Added by:</div>
                                            <div class="col-8 text-right">645</div>
                                        </div>

                                        <div class="row py-1">
                                            <div class="col-4 text-left font-weight-bold">Member Since:</div>
                                            <div class="col-8 text-right">${memberSince}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <style>
                                .custom-border {
                                  border: 4px solid #fff; /* white border */
                                }

                                .profile-img-wrapper {
                                  position: absolute;
                                 left: 50%;
                                 bottom: -50px; /* half overlap header-body */
                                  transform: translateX(-50%);
                                }
                                </style>
                        `;

                        // Hide preloader, show content
                        $("#viewPreloader").hide();
                        $("#viewContent").html(html).fadeIn();

                    }, 500);
                }, "json");
            });

        });

        // Initialize Google Map
        let map, marker;

        function                                initMap() {
            const defaultLatLng = {lat: 24.8607, lng: 67.0011}; // default center
            map = new google.maps.Map(document.getElementById("map"), {
                zoom: 12,
                center: defaultLatLng
            });

            marker = new google.maps.Marker({
                position: defaultLatLng,
                map: map,
                draggable: true
            });

            // Update inputs when marker is dragged
            marker.addListener('dragend', function () {
                $('#latitude').val(marker.getPosition().lat());
                $('#longitude').val(marker.getPosition().lng());
            });

            // Search box
            // const searchBox = new google.maps.places.SearchBox(document.getElementById('location_search'));
            // map.controls[google.maps.ControlPosition.TOP_LEFT].push(document.getElementById('location_search'));

            searchBox.addListener('places_changed', function () {
                const places = searchBox.getPlaces();
                if (places.length === 0) return;
                const place = places[0];
                map.setCenter(place.geometry.location);
                marker.setPosition(place.geometry.location);
                $('#latitude').val(place.geometry.location.lat());
                $('#longitude').val(place.geometry.location.lng());
            });

        }
    </script>
<?php $googleMapsKey = getenv('GOOGLE_MAPS_API_KEY'); ?>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=<?= $googleMapsKey ?>&callback=initMap"></script>



<?= $this->endSection() ?>