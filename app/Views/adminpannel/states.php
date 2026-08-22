<?= $this->extend('adminpannel/layouts/structure') ?>
<?= $this->section('title') ?>
    States
<?= $this->endSection() ?>
<?= $this->section('content') ?>

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard <small class="text-muted">States</small></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item text-muted">
                                <a href="#" class="text-primary">Home</a> / States
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content p-3">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title pt-1 text-md">Manage States</h3>
                        <span class="float-right">
                        <button type="button" id="addStateBtn" class="btn btn-primary float-right" data-toggle="modal" data-target="#stateModal">
                            <i class="fa fa-plus"></i> Add State
                        </button>
                    </span>
                    </div>
                    <div class="card-body">
                        <table id="stateTable" class="table table-bordered">
                            <thead>
                            <tr class="text-sm">
                                <th>ID</th>
                                <th>Country</th>
                                <th>State Name</th>
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
    <div class="modal fade" id="stateModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="stateForm">
                    <div class="modal-header">
                        <h5 class="modal-title">State</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">

                        <div id="modalPreloader" class="text-center py-5" style="display:none;">
                            <div class="spinner-grow text-primary" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>

                        <div id="modalForm">
                            <input type="hidden" name="id" id="id">
                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">Country:</label>
                                <select name="country_id" id="country_id" class="form-control select2bs4" style="width: 100%">
                                    <option value="">Select Country</option>
                                    <?php foreach($countries as $country): ?>
                                        <option value="<?= $country['id'] ?>"><?= $country['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">State Name:</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="State Name">
                            </div>
                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;"></label>
                                <button type="submit" class="btn btn-info w-[100%]">Save</button>
                            </div>
                            <?= csrf_field() ?>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            let table = $("#stateTable").DataTable({
                responsive: true,
                autoWidth: false,
                ajax: {
                    url: "<?= site_url('states/fetch') ?>",
                    dataSrc: "data"
                },
                columns: [
                    { data: "id" },
                    { data: "country_name" },
                    { data: "name" },
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

            //  Add State button -> reset form
            $('#addStateBtn').click(function() {
                $('#stateForm')[0].reset();              // clear all inputs
                $('#id').val('');                        // reset hidden id
                $('#country_id').val('').trigger('change'); // reset select2 country
                $('#modalTitle').text('Add State');      // change modal title
            });

            // Save (Add / Update)
            $("#stateForm").submit(function(e){
                e.preventDefault();
                $("#modalForm").hide();
                $("#modalPreloader").show();

                $.post("<?= site_url('states/store') ?>", $(this).serialize(), function(res){
                    $("#modalPreloader").hide();
                    $("#modalForm").show();

                    if(res.status == "success"){
                        $("#stateModal").modal('hide');
                        $("#stateForm")[0].reset();
                        table.ajax.reload(null, false);

                        if ($("#id").val()) {
                            showToast("Data edited successfully!");
                        } else {
                            showToast("Data saved successfully!");
                        }
                    }
                }, 'json');
            });

            //  Edit State
            $("#stateTable").on("click", ".editBtn", function(){
                let id = $(this).data("id");
                $("#modalForm").hide();
                $("#modalPreloader").show();

                $.get("<?= site_url('states/edit') ?>/"+id, function(data){
                    $("#id").val(data.id);
                    $("#name").val(data.name);
                    $("#country_id").val(data.country_id).trigger('change');

                    $('#modalTitle').text('Edit State'); // title change

                    $("#modalPreloader").hide();
                    $("#modalForm").show();
                    $("#stateModal").modal('show');
                }, 'json');
            });

            //  Delete State
            $("#stateTable").on("click", ".deleteBtn", function(){
                let id = $(this).data("id");
                if(confirm("Are you sure?")){
                    $.get("<?= site_url('states/delete') ?>/"+id, function(res){
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

            //  Modal preloader
            $('#stateModal').on('show.bs.modal', function () {
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