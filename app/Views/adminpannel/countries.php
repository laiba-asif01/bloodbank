<?= $this->extend('adminpannel/layouts/structure') ?>
<?= $this->section('title') ?>
    Countries
<?= $this->endSection() ?>
<?= $this->section('content') ?>

    <div class="content-wrapper">
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard <small class="text-muted">Countries</small></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item text-muted">
                                <a href="#" class="text-primary">Home</a> / Countries
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content p-3">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title pt-1 text-md">Manage Blood Banks</h3>
                        <span class="float-right">

                            <button type="button"  id="addCountryBtn" class="btn btn-primary float-right" data-toggle="modal" data-target="#countryModal">
                        <i class="fa fa-plus"></i> Add Country
                    </button>

                            </span>
                    </div>
                    <div class="card-body">
                        <table id="countryTable" class="table table-bordered">
                            <thead>
                            <tr class="text-sm">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Short Code</th>
                                <th>Phone Code</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="countryModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="countryForm">
                    <div class="modal-header">
                        <h5 class="modal-title">Country</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">

                        <!-- Preloader -->
                        <div id="modalPreloader" class="text-center py-5" style="display:none;">
                            <div class="spinner-grow text-primary" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>

                        <!-- Form -->
                        <div id="modalForm">
                            <input type="hidden" name="id" id="id">
                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">Country:</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Country">
                            </div>
                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">Short Code:</label>
                                <input type="text" name="short_code" id="short_code" class="form-control" placeholder="Short Code">
                            </div>
                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">Phone Code:</label>
                                <input type="text" name="phone_code" id="phone_code" class="form-control" placeholder="Phone Code">
                            </div>
                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;"></label>
                                <button type="submit" class="btn btn-info w-[100%]">Save</button>
                            </div>


                            <?= csrf_field() ?>
                        </div>

                    </div>
                    <!--                <div class="modal-footer">-->
                    <!--                    <button type="submit" class="btn btn-success">Save</button>-->
                    <!--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
                    <!--                </div>-->
                </form>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {

            let table = $("#countryTable").DataTable({
                responsive: true,
                autoWidth: false,
                ajax: {
                    url: "<?= site_url('countries/fetch') ?>",
                    dataSrc: "data"
                },
                columns: [
                    { data: "id" },
                    { data: "name" },
                    { data: "short_code" },
                    { data: "phone_code" },
                    {
                        data: null,
                        orderable: false,
                        searchable: false,
                        render: function (data, type, item) {
                            return `<div class="btn-group">
                        <button type="button" class="btn btn-sm btn-primary editBtn" data-id="${item.id}">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-danger deleteBtn" data-id="${item.id}">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>`;
                        }
                    }
                ]
            });

            // Add Country button -> reset form
            $('#addCountryBtn').click(function() {
                $('#countryForm')[0].reset();   // ✅ form clear
                $('#id').val('');               // hidden id clear
                $('#modalTitle').text('Add Country');
            });

            // Save
            $("#countryForm").submit(function(e){
                e.preventDefault();
                $("#modalForm").hide();
                $("#modalPreloader").show();

                $.post("<?= site_url('countries/store') ?>", $(this).serialize(), function(res){
                    $("#modalPreloader").hide();
                    $("#modalForm").show();

                    if(res.status == "success"){
                        $("#countryModal").modal('hide');
                        $("#countryForm")[0].reset();
                        table.ajax.reload(null, false); // refresh table without resetting pagination

                        if ($("#id").val()) {
                            showToast("Data edited successfully!");
                        } else {
                            showToast("Data saved successfully!");
                        }
                    }
                }, 'json');
            });

            // Edit
            $("#countryTable").on("click", ".editBtn", function(){
                let id = $(this).data("id");
                $("#modalForm").hide();
                $("#modalPreloader").show();

                $.get("<?= site_url('countries/edit') ?>/"+id, function(data){
                    $("#id").val(data.id);
                    $("#name").val(data.name);
                    $("#short_code").val(data.short_code);
                    $("#phone_code").val(data.phone_code);

                    $('#modalTitle').text('Edit Country'); // ✅ title update
                    $("#modalPreloader").hide();
                    $("#modalForm").show();
                    $("#countryModal").modal('show');
                }, 'json');
            });

            // Delete
            $("#countryTable").on("click", ".deleteBtn", function(){
                let id = $(this).data("id");
                if(confirm("Are you sure?")){
                    $.get("<?= site_url('countries/delete') ?>/"+id, function(res){
                        if(res.status == "deleted"){
                            table.ajax.reload(null, false);
                            if (res.status == "deleted") {
                                table.ajax.reload(null, false);
                                showToast("Data deleted successfully!");
                            }
                        }
                    }, 'json');
                }
            });

            // Modal preloader
            $('#countryModal').on('show.bs.modal', function () {
                $("#modalForm").hide();
                $("#modalPreloader").show();
                setTimeout(function(){
                    $("#modalPreloader").hide();
                    $("#modalForm").fadeIn();
                }, 500);
            });

        });
    </script>




<?= $this->endSection() ?>