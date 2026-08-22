<?= $this->extend('adminpannel/layouts/structure') ?>
<?= $this->section('title') ?> Blogs List <?= $this->endSection() ?>
<?= $this->section('content') ?>

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard <small>Blogs</small></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Blog</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"> Manage Blogs</h3>
                        <a href="<?= base_url('admin/addblogs') ?>" class="btn btn-primary float-right">+ Add Blog</a>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-sm  table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Thumbnail</th>
                                <th>Posted At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($blogs)): foreach($blogs as $blog): ?>
                                <tr>
                                    <td><?= $blog['id'] ?></td>
                                    <td><?= $blog['blog_title'] ?></td>
                                    <td><img src="<?= base_url('uploads/blogs/'.$blog['blog_image']) ?>" width="80"></td>
                                    <td><?= $blog['posted_at'] ?></td>
                                    <td>
                                        <a href="<?= base_url('admin/blogs/edit/'.$blog['id']) ?>" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="fas fa-edit"></i></a>
                                        <a href="<?= base_url('admin/blogs/delete/'.$blog['id']) ?>" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Delete "
                                           onclick="return confirm('Delete this blog?')"><i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; else: ?>
                                <tr><td colspan="5">No Blogs Found</td></tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                        <?php if(session()->getFlashdata('success')): ?>
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    showToast("<?= session()->getFlashdata('success') ?>");
                                });
                            </script>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </section>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            $('[data-toggle="tooltip"]').tooltip({
                template: '<div class="tooltip bs-tooltip-top" role="tooltip"><div class="arrow"></div><div class="tooltip-inner bg-dark text-white" style="opacity:0.9;"></div></div>'
            });
        });
    </script>

<?= $this->endSection() ?>