<?= $this->extend('adminpannel/layouts/structure') ?>
<?= $this->section('title') ?> Admin Settings <?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0  text-dark">Dashboard <small class="text-muted">Admin Profile</small></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a class="text-muted" href="#">Home / Settings / Profile</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            <div class="card">
                <div class="card-header ">
                    <p>Admin Profile</p>
                </div>

                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="app_settings">

                            <form action="<?= base_url('adminconfig/save') ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $admin['id'] ?? '' ?>">
                                <div class="form-group row">
                                    <label class="col-md-2 control-label">Username :-</label>
                                    <div class="col-md-10">
                                        <input type="text" name="username" value="<?= $admin['username'] ?? '' ?>" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-2 form-control-label"> Logo :- </label>
                                    <div class="col-md-10">
                                        <div>
                                            <input type="file" name="logo" class="" onchange="previewImage(event)">
                                            <div class="flex">
                                                <img id="thumbnail-preview" class=" mr-3 mt-2" alt="image" src="<?= base_url('assets/images/img_3.png') ?>" height="100">
                                                <?php if (!empty($admin['logo'])): ?>
                                                    <img id="logoPreview" src="<?= base_url('uploads/admin/'.$admin['logo']) ?>" width="100">
                                                <?php else: ?>
                                                    <img id="logoPreview" src="" style="display:none;" width="100">
                                                <?php endif; ?>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-2 control-label">Email :-</label>
                                    <div class="col-md-10">
                                        <input type="email" name="email" value="<?= $admin['email'] ?? '' ?>" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 control-label">Password :-</label>
                                    <div class="col-md-10">
                                        <input type="password" name="password" class="form-control" placeholder="leave empty if not changing">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-10 offset-2">
                                        <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat btn-info">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
</div>



<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function(){
            const output = document.getElementById('logoPreview');
            output.src = reader.result;
            output.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }

    document.getElementById('logoPreview').addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('thumbnail-preview').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });

</script>

<div id="toast-container"></div>

<style>
    #toast-container {
        position: fixed;
        top: 20px;
        right: -400px;
        z-index: 9999;
        transition: right 0.6s ease-in-out;
    }
    .toast-message {
        background: #000;
        color: #fff;
        padding: 12px 20px;
        margin-bottom: 10px;
        border-radius: 6px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.3);
        min-width: 250px;
        font-size: 14px;
        font-weight: bold;
        opacity: 0.95;
    }
</style>

<script>
    function showToast(message) {
        let container = document.getElementById("toast-container");
        let toast = document.createElement("div");
        toast.className = "toast-message";
        toast.innerText = message;

        container.appendChild(toast);
        container.style.right = "20px"; // slide in

        setTimeout(function () {
            toast.style.opacity = "0";
            setTimeout(function(){
                toast.remove();
                if (container.children.length === 0) {
                    container.style.right = "-400px"; // slide out
                }
            }, 500);
        }, 3000);
    }
</script>

<?php if(session()->getFlashdata('success')): ?>
    <script>
        document.addEventListener("DOMContentLoaded", function(){
            showToast("<?= session()->getFlashdata('success') ?>");
        });
    </script>
<?php endif; ?>


<?= $this->endSection() ?>
