<?= $this->extend('adminpannel/layouts/structure') ?>
<?= $this->section('title') ?>Cities<?= $this->endSection() ?>
<?= $this->section('content') ?>

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <h1 class="m-0 text-dark">Dashboard <small class="text-muted">Cities</small></h1>
            </div>
        </div>

        <section class="content p-3">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title pt-1">Manage Cities</h3>
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#cityModal">
                            <i class="fa fa-plus"></i> Add City
                        </button>
                    </div>
                    <div class="card-body">
                        <table id="cityTable" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Country</th>
                                <th>State</th>
                                <th>City Name</th>
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
    <div class="modal fade" id="cityModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="cityForm">
                    <div class="modal-header">
                        <h5 class="modal-title">City</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">

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
                                <label class="mr-2" style="width:120px;">State:</label>
                                <select name="state_id" id="state_id" class="form-control select2bs4" style="width: 100%">
                                    <option value="">Select State</option>
                                </select>
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <label class="mr-2" style="width:120px;">City Name:</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="City Name">
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

            // DataTable
            let table = $("#cityTable").DataTable({
                responsive: true,
                autoWidth: false,
                ajax: {
                    url: "<?= site_url('cities/fetch') ?>",
                    dataSrc: "data"
                },
                columns: [
                    { data: "id" },
                    { data: "country_name" },
                    { data: "state_name" },
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

            // ✅ Add City -> reset form
            $(document).on("click", '[data-target="#cityModal"]', function () {
                $('#cityForm')[0].reset();
                $('#id').val('');
                $('#country_id').val('').trigger('change');
                $('#state_id').html('<option value="">Select State</option>').trigger('change');
                $('.modal-title').text('Add City');
            });

            // ✅ Load states when country changes
            $('#country_id').change(function(){
                let countryId = $(this).val();
                $('#state_id').html('<option>Loading...</option>');
                if(countryId){
                    $.get("<?= site_url('cities/getStates') ?>/"+countryId, function(data){
                        let html = '<option value="">Select State</option>';
                        data.forEach(state => { html += `<option value="${state.id}">${state.name}</option>`; });
                        $('#state_id').html(html);
                    }, 'json');
                } else {
                    $('#state_id').html('<option value="">Select State</option>');
                }
            });

            // ✅ Save city
            $("#cityForm").submit(function(e){
                e.preventDefault();
                $.post("<?= site_url('cities/store') ?>", $(this).serialize(), function(res){
                    if(res.status == "success"){
                        $("#cityModal").modal('hide');
                        $("#cityForm")[0].reset();
                        table.ajax.reload(null,false);

                        if ($("#id").val()) {
                            showToast("Data edited successfully!");
                        } else {
                            showToast("Data saved successfully!");
                        }
                    }
                }, 'json');
            });

            // ✅ Edit city
            $("#cityTable").on("click", ".editBtn", function(){
                let id = $(this).data("id");
                $.get("<?= site_url('cities/edit') ?>/"+id, function(data){
                    $("#id").val(data.id);
                    $("#name").val(data.name);
                    $("#country_id").val(data.country_id).trigger('change');

                    // States load hone ke baad select karna
                    setTimeout(function(){
                        $("#state_id").val(data.state_id).trigger('change');
                    }, 300);

                    $('.modal-title').text('Edit City');
                    $("#cityModal").modal('show');
                }, 'json');
            });

            // ✅ Delete city
            $("#cityTable").on("click", ".deleteBtn", function(){
                let id = $(this).data("id");
                if(confirm("Are you sure?")){
                    $.get("<?= site_url('cities/delete') ?>/"+id, function(res){
                        if(res.status == "deleted") table.ajax.reload(null,false);
                        if (res.status == "deleted") {
                            table.ajax.reload(null, false);
                            showToast("Data deleted successfully!");
                        }
                    }, 'json');
                }
            });

        });
    </script>


<?= $this->endSection() ?>