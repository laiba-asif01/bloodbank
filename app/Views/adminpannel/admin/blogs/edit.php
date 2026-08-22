<?= $this->extend('adminpannel/layouts/structure') ?>
<?= $this->section('title') ?> Edit blogs <?= $this->endSection() ?>
<?= $this->section('content') ?>
    <div class="content-wrapper" style="min-height: 103.698px;">
        <!-- Main content -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard <small></small></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('admin/blogs') ?>">Blogs</a></li>
                            <li class="breadcrumb-item active">Edit Blog</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <?php if(isset($validation)): ?>
                    <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                <?php endif; ?>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Blog</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <form action="<?= base_url('admin/blogs/update/' . $blog['id']) ?>" class="form form-horizontal" enctype="multipart/form-data" method="post" name="addeditblog">

                            <div class="section">
                                <div class="section-body">
                                    <div class="form-group row">
                                        <label class="sub-title col-md-2 form-control-label"> Title :- </label>
                                        <div class="col-md-10">
                                            <input class="form-control" id="blog_title" name="blog_title" required
                                                   placeholder="Title" type="text"
                                                   value="<?= old('blog_title', $blog['blog_title']) ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 form-control-label"> Description :- </label>
                                        <div class="col-md-10">
<textarea class="form-control" id="Editor" name="blog_content" type="text">
    <?= old('blog_content', $blog['blog_content']) ?>
</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 form-control-label"> Posted/ Updated At :- </label>
                                        <div class="col-md-10">
                                            <input class="form-control" id="posted_at" name="posted_at" required
                                                   placeholder="Date" type="text"
                                                   value="<?= date('d/m/Y, g:i A', strtotime($blog['posted_at'])) ?>" disabled>
                                        </div>
                                    </div>
<!--                                    <div class="form-group row">-->
<!--                                        <label class="col-md-2 form-control-label"> Thumbnail :- </label>-->
<!--                                        <div class="col-md-10">-->
<!--                                            <div>-->
<!--                                                <input id="fileupload" class="col-md-12 btn btn-grd-inverse" name="blog_image" type="file" value="fileupload">-->
<!--                                                <div>-->
<!--                                                    <img id="thumbnail-preview" class="ml-3 mt-2" alt="image"-->
<!--                                                         src="--><?php //= $blog['blog_image'] ? base_url('uploads/blogs/' . $blog['blog_image']) : base_url('assets/images/img_2.png') ?><!--"-->
<!--                                                         height="100">-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->


                                    <div class="form-group row">
                                        <label class="col-md-2 form-control-label"> Thumbnail :- </label>
                                        <div class="col-md-10">
                                            <div>
                                                <input id="fileupload" class="col-md-12 btn btn-grd-inverse"
                                                       name="blog_image" type="file" value="fileupload">

                                                <!-- Hidden field for old image -->
                                                <input type="hidden" name="old_image"
                                                       value="<?= $blog['blog_image'] ?>">

                                                <div>
                                                    <img id="thumbnail-preview" class="ml-3 mt-2" alt="image"
                                                         src="<?= $blog['blog_image']
                                                             ? base_url('uploads/blogs/' . $blog['blog_image'])
                                                             : base_url('assets/images/img_2.png') ?>"
                                                         height="100">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-10 offset-2">
                                            <button type="submit" name="submit" class="btn btn-block btn-info"> Update </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <style>
        .cke_notification {
            display: none !important;
        }
    </style>
    <script src="https://cdn.ckeditor.com/4.9.2/full/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            CKEDITOR.replace('Editor', {
                height: 300
            });

            // Thumbnail preview
            document.getElementById('fileupload').addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('thumbnail-preview').src = e.target.result;
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
<?= $this->endSection() ?>