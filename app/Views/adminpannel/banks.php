<?= $this->extend('adminpannel/layouts/structure') ?>
<?= $this->section('title') ?>Blood Bank<?= $this->endSection() ?>
<?= $this->section('content') ?>

    <div class="content-wrapper">
        <!-- Page Header -->
        <div class="content-header">
            <div class="container-fluid">
                <h1 class="m-0 text-dark">Dashboard <small class="text-muted">App Users</small></h1>
            </div>
        </div>

        <!-- Main Content -->
        <section class="content p-3">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title pt-1">Manage App Users</h3>
                        <button class="btn btn-primary btn-sm float-right" id="addbloodbank" data-toggle="modal" data-target="#userModal">
                            <i class="fa fa-plus"></i> Add Blood Bank
                        </button>
                        <button class="btn btn-info btn-sm float-right mr-1" data-toggle="modal" data-target="#userModal">
                            <i class="fa fa-file-import"></i> Import From Excel
                        </button>

                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="userTable" class="table table-bordered table-sm text-sm" style="width:100%">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Country</th>
                                    <th>State</th>
                                    <th>City</th>
                                    <th>Lat/Lon</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody></tbody>
                                <tfoot class="text-sm">
                                <tr>
                                    <th><input type="text" class="form-control form-control-sm border-0" placeholder="ID"></th>
                                    <th><input type="text" class="form-control form-control-sm border-0" placeholder="Name"></th>
                                    <th><input type="text" class="form-control form-control-sm border-0" placeholder="Contact"></th>
                                    <th><input type="text" class="form-control form-control-sm border-0" placeholder="Country"></th>
                                    <th><input type="text" class="form-control form-control-sm border-0" placeholder="State"></th>
                                    <th><input type="text" class="form-control form-control-sm border-0" placeholder="City"></th>
                                    <th><input type="text" class="form-control form-control-sm border-0" placeholder="Lat/Lon"></th>
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
    <div class="modal fade" id="userModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="userForm">
                    <div class="modal-header">
                        <h5 class="modal-title">Blood Bank</h5>
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
                                <input type="text" name="name" id="name" class="form-control"
                                       placeholder="BloodBank Name">
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">Contact :</label>
                                <input type="text" name="contact" id="contact" class="form-control"
                                       placeholder="contact">
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">Country :</label>
                                <select name="country_id" id="country_id" class="form-control select2bs4"
                                        style="width: 100%">
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
                                        style="width: 100%">
                                    <option value="">Select State</option>
                                </select>
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">City :</label>
                                <select name="city_id" id="city_id" class="form-control select2bs4" style="width: 100%">
                                    <option value="">Select City</option>
                                </select>
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">Address :</label>
                                <textarea name="address" id="address" class="form-control"
                                          placeholder="Address"></textarea>
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">Search Location :</label>
                                <input type="text" id="location_search" class="form-control"
                                       placeholder="Enter a location">
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">Or pick from map :</label>
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
                                <select name="status" id="status" class="form-control form-control-sm">
                                    <option>Active</option>
                                    <option>Inactive</option>
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
                    <h5 class="modal-title">View Blood Bank</h5>
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

<!---->
<!--<style>-->
<!--    #toast-container {-->
<!--        position: fixed;-->
<!--        top: 20px;-->
<!--        right: -400px; /* Start off screen */-->
<!--        z-index: 9999;-->
<!--        transition: right 0.6s ease-in-out;-->
<!--    }-->
<!---->
<!--    .toast-message {-->
<!--        background: #000;-->
<!--        color: #fff;-->
<!--        padding: 14px 20px;-->
<!--        border-radius: 6px;-->
<!--        box-shadow: 0 4px 6px rgba(0,0,0,0.3);-->
<!--        min-width: 250px;-->
<!--        font-size: 16px;-->
<!--        font-weight: normal;-->
<!--        opacity: 0.95;-->
<!--       word-spacing: 4px;-->
<!--        text-align: center;-->
<!--    }-->
<!---->
<!--</style>-->


    <!-- jQuery & AJAX -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>

        $(document).ready(function () {

            let table = $("#userTable").DataTable({
                responsive: false,   // responsive: false rakhna warna wo columns ko hide kar dega
                scrollX: false,
                ajax: "<?= site_url('banks/fetch') ?>",
                columns: [
                    {data: "id"},
                    {data: "name"},
                    {data: "contact"},
                    {data: "country_name"},
                    {data: "state_name"},
                    {data: "city_name"},
                    {
                        data: null, render: function (data, type, row) {
                            return (row.latitude && row.longitude) ? row.latitude + ', ' + row.longitude : 'N/A';
                        }
                    },
                    {data: "status"},
                    {
                        data: null, render: function (data, type, row) {
                            return `

<div class="btn-group ">
                        <button type="button" class="btn  btn-xs  btn-info viewBtn" data-id="${row.id}"><i class="fas fa-eye fa-align-left"></i></button>
                        <button type="button" class="btn  btn-xs  btn-primary editBtn" data-id="${row.id}"><i class="fas fa-edit fa-align-center"></i></button>
                        <button type="button" class="btn  btn-xs  btn-danger deleteBtn" data-id="${row.id}"><i class="fas fa-trash-alt fa-align-right"></i></button>
                      </div>

`;
                        }
                    }
                ],


                initComplete: function () {
                    let api = this.api();

                    // Text filters
                    api.columns([0,1,2,3,4,5,7]).every(function () {
                        let that = this;
                        $('input', this.footer()).on('keyup change clear', function () {
                            if (that.search() !== this.value) {
                                that.search(this.value).draw();
                            }
                        });
                    });

                    // Status filter dropdown (column 7 hai "Status")
                    api.column(7).every(function () {
                        let column = this;
                        $('.filter-state').on('change', function () {
                            let val = $(this).val();
                            column.search(val ? '^' + val + '$' : '', true, false).draw();
                        });
                    });
                }


            });

            $('#addbloodbank').click(function() {
                $('.modal-title').text('Add Blood Bank');   // modal title
                $('#userForm')[0].reset();                  // reset normal inputs
                $('#id').val('');                           // reset hidden id

                // Reset dropdowns
                $('#status').val('Active').trigger('change');
                $('#country_id').val('').trigger('change');
                $('#state_id').html('<option value="">Select State</option>').trigger('change');
                $('#city_id').html('<option value="">Select City</option>').trigger('change');

                // Reset map fields
                $('#latitude').val('');
                $('#longitude').val('');
            });



            // Country change -> load states
            $('#country_id').change(function () {
                let countryId = $(this).val();
                $('#state_id').html('<option>Loading...</option>');
                $('#city_id').html('<option>Select City</option>');
                if (countryId) {
                    $.get("<?= site_url('banks/getStates') ?>/" + countryId, function (states) {
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
                    $.get("<?= site_url('banks/getCities') ?>/" + stateId, function (cities) {
                        let html = '<option value="">Select City</option>';
                        cities.forEach(c => html += `<option value="${c.id}">${c.name}</option>`);
                        $('#city_id').html(html);
                    }, 'json');
                } else {
                    $('#city_id').html('<option value="">Select City</option>');
                }
            });

            // Save user
            $("#userForm").submit(function (e) {
                e.preventDefault();
                // $("#modalForm").hide();        // Hide form
                // $("#modalPreloader").show();   // Show preloader

                $.post("<?= site_url('banks/store') ?>", $(this).serialize(), function (res) {
                    $("#modalPreloader").hide();  // Hide preloader
                    $("#modalForm").show();       // Show form again

                    if (res.status == "success") {
                        $("#userModal").modal('hide');
                        $("#userForm")[0].reset();
                        table.ajax.reload(null, false);



                        if ($("#id").val()) {
                            showToast("Data edited successfully!");
                        } else {
                            showToast("Data saved successfully!");
                        }
                    }
                }, 'json');
            });

            // Edit user
            $("#userTable").on("click", ".editBtn", function () {
                let id = $(this).data("id");
                // $("#modalForm").hide();
                // $("#modalPreloader").show();

                $.get("<?= site_url('banks/edit') ?>/" + id, function (data) {
                    $("#id").val(data.id);
                    $("#name").val(data.name);
                    $("#contact").val(data.contact);
                    $("#country_id").val(data.country_id).change();
                    setTimeout(function () {
                        $("#state_id").val(data.state_id).change();
                        setTimeout(function () {
                            $("#city_id").val(data.city_id).change();
                        }, 200);
                    }, 200);
                    $("#address").val(data.address);
                    $("#latitude").val(data.latitude);
                    $("#longitude").val(data.longitude);
                    $("#status").val(data.status);

                    $("#modalPreloader").hide();  // Hide preloader
                    $("#modalForm").fadeIn();     // Show form
                    $("#userModal").modal('show');
                }, 'json');
            });

            // Delete user
            $("#userTable").on("click", ".deleteBtn", function () {
                let id = $(this).data("id");
                if (confirm("Are you sure?")) {
                    $.get("<?= site_url('banks/delete') ?>/" + id, function (res) {
                        if (res.status == "deleted") table.ajax.reload(null, false);


                        if (res.status == "deleted") {
                            table.ajax.reload(null, false);
                            showToast("Data deleted successfully!");
                        }

                    }, 'json');
                }
            });
            $('#userModal').on('show.bs.modal', function () {
                $("#modalForm").hide();
                $("#modalPreloader").show();
                setTimeout(function () {
                    $("#modalPreloader").hide();
                    $("#modalForm").fadeIn();
                }, 500); // half-second delay
            });


        });
        // Initialize Google Map
        let map, marker;

        function initMap() {
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

        // View Bank
        $("#userTable").on("click", ".viewBtn", function () {
            let id = $(this).data("id");

            // Reset content & show preloader
            $("#viewContent").hide().html("");   // clear old data
            $("#viewPreloader").show();          // show spinner
            $("#viewModal").modal("show");

            // AJAX call
            $.get("<?= site_url('banks/view') ?>/" + id, function (data) {

                // Simulate a small delay to see preloader
                setTimeout(function () {
                    // Build modal content
                    let html = `
                <div class="card  border-0 m-3 ]" >
                    <div class="card-header text-center text-white pt-5 pb-5" style="background:#dc3545;">
                        <h5 class="mb-0">${data.name}</h5>
                        <h6 class="mb-0 font-weight-bold">Region : - ${data.city_name}, ${data.state_name}, ${data.country_name}</h6>
                    </div>
                    <div class="card-body" style="background-color: rgba(0, 0, 0, .03)">

                        <div class="row text-center mb-3 mt-3">
                            <div class="col">
                                <small>ADDED BY</small><br>
                                <span>-</span>
                            </div>
                            <div class="col">
                                <small>VIEWS</small><br>
                                <span>0</span>
                            </div>
                            <div class="col">
                                <small>CONTACT#</small><br>
                                <span>${data.contact}</span>
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
        <div class="col-4 text-left font-weight-bold">Address:</div>
        <div class="col-8 text-right">${data.address ?? '-'}</div>
    </div>

    <div class="row border-bottom py-1">
        <div class="col-4 text-left font-weight-bold">Location:</div>
        <div class="col-8 text-right">${data.latitude}, ${data.longitude}</div>
    </div>

    <div class="row py-1">
        <div class="col-4 text-left font-weight-bold">Member Since:</div>
        <div class="col-8 text-right">${data.created_at ?? ''}</div>
    </div>
</div>

                    </div>
                </div>
            `;

                    // Hide preloader, show content
                    $("#viewPreloader").hide();
                    $("#viewContent").html(html).fadeIn();

                }, 500); // 0.5s delay to show spinner

            }, "json");
        });

    </script>


<?php $googleMapsKey = getenv('GOOGLE_MAPS_API_KEY'); ?>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=<?= $googleMapsKey ?>&callback=initMap"></script>




<?= $this->endSection() ?>

