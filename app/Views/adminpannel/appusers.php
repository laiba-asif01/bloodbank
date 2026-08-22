<?= $this->extend('adminpannel/layouts/structure') ?>
<?= $this->section('title') ?>App Users<?= $this->endSection() ?>

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
                        <div class="float-right">


                            <button  class="btn btn-sm " >
                                <a href="<?=base_url('user/login')?>" class="bg-red-500 px-4 py-1.5 rounded text-white ">User Portal</a>
                            </button>

                            <button id="addUserBtn" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#userModal">
                                <i class="fa fa-plus"></i> Add User
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="overflow-x:auto;">

                        <table id="userTable" class="table table-bordered table-sm text-sm" style="width:100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Reg No</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Password</th>
                                <th>Country</th>
                                <th>State</th>
                                <th>City</th>
                                <th>BG</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                            <tfoot class="text-sm">
                            <tr>
                                <th><input type="text" class="form-control form-control-sm border-0" placeholder="ID"></th>
                                <th><input type="text" class="form-control form-control-sm border-0" placeholder="Reg No"></th>
                                <th><input type="text" class="form-control form-control-sm border-0" placeholder="Full Name"></th>
                                <th><input type="text" class="form-control form-control-sm border-0" placeholder="Mobile"></th>
                                <th><input type="text" class="form-control form-control-sm border-0" placeholder="Password"></th>
                                <th><input type="text" class="form-control form-control-sm border-0" placeholder="Country"></th>
                                <th><input type="text" class="form-control form-control-sm border-0" placeholder="State"></th>
                                <th><input type="text" class="form-control form-control-sm border-0" placeholder="City"></th>
                                <th><input type="text" class="form-control form-control-sm border-0" placeholder="Blood Group"></th>
                                <th>
                                    <select class="form-control form-control-sm select2bs4 filter-state" style="width: 100%">
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
        </section>
    </div>

    <!-- User Modal -->
    <div class="modal fade" id="userModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="userForm">
                    <div class="modal-header">
                        <h5 class="modal-title">App User</h5>
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
                                <label class="mr-2" style="width:120px;">Registration No:</label>
                                <input type="text" name="reg_no" id="reg_no" class="form-control" placeholder="Auto-generated" disabled>
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">Full Name :</label>
                                <input type="text" name="full_name" id="full_name" class="form-control" placeholder="Full Name" required>
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">Mobile :</label>
                                <input type="text" name="mobile" id="mobile" class="form-control" maxlength="11" placeholder="11 digits only" required>

                            </div>

                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">Password :</label>

                                <div class="input-group flex-grow-1">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">

                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-outline-secondary toggle-password">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">Country :</label>
                                <select name="country_id" id="country_id" class="form-control select2bs4" style="width: 100%" required>
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
                                <select name="state_id" id="state_id" class="form-control select2bs4" style="width: 100%" required>
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
                                <label class="mr-2" style="width:120px;">Address :</label>
                                <textarea name="address" id="address" class="form-control" placeholder="Address"></textarea>
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">Search Location :</label>
                                <input type="text" id="location_search" class="form-control" placeholder="Enter a location">
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">Or pick from map :</label>
                                <div id="map" style="height:250px; flex:1;"></div>
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">Latitude :</label>
                                <input type="text" name="latitude" id="latitude" class="form-control" placeholder="0.000000">
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">Longitude :</label>
                                <input type="text" name="longitude" id="longitude" class="form-control" placeholder="0.000000">
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">Date of Birth :</label>
                                <input type="date" name="dob" id="dob" class="form-control">
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">Blood Group :</label>
                                <select name="blood_group" id="blood_group" class="form-control select2bs4" style="width: 100%">
                                    <option value="">Select Blood Group</option>
                                    <option>A+</option><option>A-</option><option>B+</option><option>B-</option>
                                    <option>O+</option><option>O-</option><option>AB+</option><option>AB-</option>
                                </select>
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">Status :</label>
                                <select name="status" id="status" class="form-control select2bs4" style="width: 100%">
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

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="loginForm">
                    <div class="modal-header">
                        <h5 class="modal-title">User Login</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Registration Number</label>
                            <input type="text" name="reg_no" class="form-control" placeholder="Enter Registration Number" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-group">
                                <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-secondary toggle-password" type="button">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery & AJAX -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>

        $(document).ready(function(){

            let table = $("#userTable").DataTable({
                responsive: false,
                scrollX: false,
                ajax: "<?= site_url('appusers/fetch') ?>",
                columns:[
                    {data:"id"},
                    {data:"reg_no"},
                    {data:"full_name"},
                    {data:"mobile"},
                    {data:"password"},
                    {data:"country_name"},
                    {data:"state_name"},
                    {data:"city_name"},
                    {data:"blood_group"},
                    {data:"status"},
                    {data:null, render:function(data,type,row){
                            return `<div class="btn-group">
                                <button type="button" class="btn btn-xs btn-primary editBtn" data-id="${row.id}"><i class="fas fa-edit"></i></button>
                                <button type="button" class="btn btn-xs btn-danger deleteBtn" data-id="${row.id}"><i class="fas fa-trash-alt"></i></button>
                            </div>`;
                        }}
                ],
                initComplete: function () {
                    let api = this.api();

                    // Text filters
                    api.columns().every(function () {
                        let that = this;
                        $('input', this.footer()).on('keyup change clear', function () {
                            if (that.search() !== this.value) {
                                that.search(this.value).draw();
                            }
                        });
                    });

                    // Status filter dropdown
                    api.column(9).every(function () {
                        let column = this;
                        $('.filter-state').on('change', function () {
                            let val = $(this).val();
                            column.search(val ? '^' + val + '$' : '', true, false).draw();
                        });
                    });
                }
            });

            // Password show/hide toggle
            $(document).on('click', '.toggle-password', function() {
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

            // Mobile input validation - only numbers and max 11 digits
            $('#mobile').on('input', function() {
                this.value = this.value.replace(/\D/g, '').slice(0, 11);
            });

            // Reset form when Add User button is clicked
            $('#addUserBtn').click(function() {
                $('#userForm')[0].reset();
                $('#id').val('');
                $('#reg_no').val('Auto-generated');
                $("#blood_group").val("").trigger("change");
                $("#status").val("Active").trigger("change");
                $('#country_id').val('').trigger('change');
                $('#state_id').val('').trigger('change');
                $('#city_id').val('').trigger('change');
                $('#password').val('').trigger('change');
                // Reset password field to password type
                $('#password').attr('type', 'password');
                $('.toggle-password i').removeClass('fa-eye-slash').addClass('fa-eye');
            });

            // Country change -> load states
            $('#country_id').change(function(){
                let countryId = $(this).val();
                $('#state_id').html('<option>Loading...</option>');
                $('#city_id').html('<option>Select City</option>');
                if(countryId){
                    $.get("<?= site_url('appusers/getStates') ?>/"+countryId, function(states){
                        let html = '<option value="">Select State</option>';
                        states.forEach(s => html += `<option value="${s.id}">${s.name}</option>`);
                        $('#state_id').html(html);
                    }, 'json');
                } else {
                    $('#state_id').html('<option value="">Select State</option>');
                }
            });

            // State change -> load cities
            $('#state_id').change(function(){
                let stateId = $(this).val();
                $('#city_id').html('<option>Loading...</option>');
                if(stateId){
                    $.get("<?= site_url('appusers/getCities') ?>/"+stateId, function(cities){
                        let html = '<option value="">Select City</option>';
                        cities.forEach(c => html += `<option value="${c.id}">${c.name}</option>`);
                        $('#city_id').html(html);
                    }, 'json');
                } else {
                    $('#city_id').html('<option value="">Select City</option>');
                }
            });

            // Save user
            $("#userForm").submit(function(e){
                e.preventDefault();

                // Mobile validation
                const mobile = $('#mobile').val();
                if (!/^\d{11}$/.test(mobile)) {
                    alert('Mobile must be exactly 11 digits');
                    return false;
                }

                $("#modalPreloader").show();
                $("#modalForm").hide();

                $.post("<?= site_url('appusers/store') ?>", $(this).serialize(), function(res){
                    $("#modalPreloader").hide();
                    $("#modalForm").show();

                    if(res.status=="success"){
                        $("#userModal").modal('hide');
                        $("#userForm")[0].reset();
                        table.ajax.reload(null,false);
                        if ($("#id").val()) {
                            showToast("Data edited successfully!");
                        } else {
                            showToast("Data saved successfully!");
                        }
                    } else if(res.status=="error") {
                        alert(res.message);
                    }
                },'json');
            });

            // Edit user
            $("#userTable").on("click",".editBtn",function(){
                let id=$(this).data("id");
                $("#modalForm").hide();
                $("#modalPreloader").show();

                $.get("<?= site_url('appusers/edit') ?>/"+id,function(data){
                    $("#id").val(data.id);
                    $("#reg_no").val(data.reg_no);
                    $("#full_name").val(data.full_name);
                    $("#mobile").val(data.mobile);
                    $("#password").val(data.password);
                    $("#country_id").val(data.country_id).trigger('change');
                    setTimeout(function () {
                        $("#state_id").val(data.state_id).trigger('change');
                        setTimeout(function () {
                            $("#city_id").val(data.city_id).trigger('change');
                        }, 500);
                    }, 500);
                    $("#address").val(data.address);
                    $("#latitude").val(data.latitude);
                    $("#longitude").val(data.longitude);
                    $("#dob").val(data.dob);
                    $("#blood_group").val(data.blood_group).trigger('change');
                    $("#status").val(data.status).trigger('change');

                    $("#modalPreloader").hide();
                    $("#modalForm").fadeIn();
                    $("#userModal").modal('show');
                },'json');
            });

            // Delete user
            $("#userTable").on("click",".deleteBtn",function(){
                let id=$(this).data("id");
                if(confirm("Are you sure?")){
                    $.get("<?= site_url('appusers/delete') ?>/"+id,function(res){
                        if (res.status == "deleted") {
                            table.ajax.reload(null, false);
                            showToast("Data deleted successfully!");
                        }
                    },'json');
                }
            });

            $("#loginForm").submit(function(e){
                e.preventDefault();

                $.post("<?= site_url('appusers/login') ?>", $(this).serialize(), function(res){

                    if (res.status === "success") {
                        $("#loginModal").modal("hide");
                        window.location.href = res.redirect;
                    }
                    else {
                        alert(res.message);
                    }
                }, 'json');
            });

            $('#userModal').on('show.bs.modal', function () {
                $("#modalForm").hide();
                $("#modalPreloader").show();
                setTimeout(function(){
                    $("#modalPreloader").hide();
                    $("#modalForm").fadeIn();
                }, 500);
            });

        });

        // Initialize Google Map
        let map, marker;
        function initMap() {
            const defaultLatLng = { lat: 24.8607, lng: 67.0011 };
            map = new google.maps.Map(document.getElementById("map"), {
                zoom: 12,
                center: defaultLatLng
            });

            marker = new google.maps.Marker({
                position: defaultLatLng,
                map: map,
                draggable: true
            });

            marker.addListener('dragend', function() {
                $('#latitude').val(marker.getPosition().lat());
                $('#longitude').val(marker.getPosition().lng());
            });

            const searchBox = new google.maps.places.SearchBox(document.getElementById('location_search'));

            searchBox.addListener('places_changed', function() {
                const places = searchBox.getPlaces();
                if (places.length === 0) return;
                const place = places[0];
                map.setCenter(place.geometry.location);
                marker.setPosition(place.geometry.location);
                $('#latitude').val(place.geometry.location.lat());
                $('#longitude').val(place.geometry.location.lng());
            });
        }

        // Toast function
        function showToast(message, type = "success") {
            alert((type === "success" ? "✓ " : "✗ ") + message);
        }

    </script>
<?php $googleMapsKey = getenv('GOOGLE_MAPS_API_KEY'); ?>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=<?= $googleMapsKey ?>&callback=initMap"></script>

<?= $this->endSection() ?>