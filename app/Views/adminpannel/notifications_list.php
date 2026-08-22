<?= $this->extend('adminpannel/layouts/structure') ?>
<?= $this->section('title') ?> Notifications List <?= $this->endSection() ?>
<?= $this->section('content') ?>

    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard <small>Notification</small></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                            <li class="breadcrumb-item active">Notifications</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <?php if(session()->getFlashdata('success')): ?>
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                showToast("<?= session()->getFlashdata('success') ?>");
                            });
                        </script>
                    <?php endif; ?>

                    <?php if(session()->getFlashdata('error')): ?>
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                showToast("<?= session()->getFlashdata('error') ?>");
                            });
                        </script>
                    <?php endif; ?>


                    <div class="card-header">
                        <h3 class="card-title">Notifications</h3>
                        <div class="card-tools pull-right">
                            <div class="input-group input-group-sm">
                                <div class="input-group-btn">
                                    <a href="<?= base_url('notifications') ?>"
                                       class="btn btn-sm btn-primary">
                                        <i class="fa fa-plus"></i> Send Notification
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-sm table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Message</th>
                                    <th>URL</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?= $notificationsTable ?>
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>

<?= $this->endSection() ?>