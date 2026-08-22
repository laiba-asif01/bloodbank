<?= $this->extend('adminpannel/layouts/structure') ?>
<?= $this->section('title') ?>
    Send notifications
<?= $this->endSection() ?>
<?= $this->section('content') ?>



    <div class="content-wrapper" style="min-height: 119.698px;">

        <div class="col-md-12 pt-2">


        </div>

        <!-- Main content -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard <small>Send Notifications</small></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?=base_url("#")?>">Home</a></li>
                            <li class="breadcrumb-item active">Notification</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Send Notifications</h3>
                        <div class="card-tools pull-right">
                            <div class="input-group input-group-sm">

                                <div class="input-group-btn">
                                    <a href="<?=base_url("notificationslist")?>" class="btn btn-sm btn-primary"><i class="fa fa-list"></i> Notifications </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?= base_url('notifications/save') ?>" method="post" enctype="multipart/form-data">
                        <div class="card-body">

                            <div class="form-group row">
                                <label class="col-md-3 control-label">Title :-</label>
                                <div class="col-md-9">
                                    <input type="text" name="notification_title" id="notification_title" class="form-control" value="" placeholder="" required="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 control-label">External Link <small>(optional)</small> :-</label>
                                <div class="col-md-9">
                                    <input type="text" name="external_link" id="external_link" class="form-control" value="" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 control-label">Message :-</label>
                                <div class="col-md-9">
                                    <textarea name="notification_msg" id="notification_msg" class="form-control" required=""></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 control-label">Notification Image <small>(Optional)</small><p class="small">(Recommended resolution: 600x293 or
                                        650x317 or 700x342 or 750x366)</p></label>

                                <div class="col-md-9">
                                    <div class="fileupload_block">
                                        <input type="file" name="big_picture" value="" id="fileupload">
                                        <div class="fileupload_img"><img type="image" src="<?=base_url("assets/images/img_2.png")?>" alt="category image"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-9 offset-3">
                                    <button type="submit" name="submit" class="btn btn-block btn-info">Send
                                        Notification
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </section>

        <script>
            $(function(){
                // setLocationPicker(null, null);
            });
        </script>
        <!-- /.content -->
    </div>



<?= $this->endSection() ?>