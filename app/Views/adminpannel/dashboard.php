<?=$this->extend('adminpannel/layouts/structure')?>
<?=$this->section('title')?>
    dashboard
<?=$this->endSection()?>
<?=$this->section('content')?>

    <!--// CodeIgniter 4: get DB instance for this view-->


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li></ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-4 col-6 ">
                        <!-- small box -->
                        <div class="small-box bg-info ">
                            <div class="inner">
                                <h3><?= $donorsCount ??0 ?></h3>

                                <p>Blood Donors</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="<?=base_url("donors")?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?= $requestsCount ??0 ?></h3>

                                <p>Blood Requests</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="<?=base_url("requests")?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box  bg-warning">
                            <div class="inner">
                                <h3><?= $banksCount??0 ?></h3>

                                <p>Blood Banks</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="<?=base_url("banks")?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box  bg-danger">
                            <div class="inner">
                                <h3><?= $usersCount??0 ?></h3>
                                <p>App Users</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="<?=base_url("appusers")?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box  bg-warning">
                            <div class="inner">
                                <h3><?= $blogsCount??0 ?></h3>
                                <p>Blogs</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="<?=base_url("admin/blogs")?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><?= $contactsCount?? 0 ?></h3>
                                <p>Contacts/Calls</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card ">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <!--                                    <i class="far fa-chart-bar"></i>-->
                                        Last 6 months users joining
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <canvas id="usersChart" style="height:300px; width:100%;"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card ">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Last 6 months donor joining
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <canvas id="donorsChart" style="height:300px; width:100%;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- right col -->
                </div>
                <!-- /.row (main row) -->
                <!-- New Chart Card -->


                <!-- Recent Requests -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Recent Requests</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>Request ID</th>
                                <th>Requester Name</th>
                                <th>City</th>
                                <th>Blood Group</th>
                                <th>Bags</th>
                                <th>Fulfilled</th>
                                <th>Requested At</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!empty($recentRequests)): ?>
                                <?php foreach ($recentRequests as $req): ?>
                                    <tr>
                                        <td><?= $req->id ?></td>
                                        <td><?= $req->full_name ?></td>
                                        <td><?= $req->city_id ?></td>
                                        <td><?= $req->blood_group ?></td>
                                        <td><?= $req->bags ?></td>
                                        <td><span class="badge badge-danger">No</span></td>
                                        <td><?= $req->created_at ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center text-muted">No requests found</td>
                                </tr>
                            <?php endif; ?>
                            </tbody>

                        </table>
                    </div>
                    <div class="card-footer text-right">
                        <a href="<?= base_url('bloodrequests') ?>" class="btn btn-sm btn-secondary">View All Requests</a>
                    </div>
                </div>

                <!-- Recent Users -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Recent Users</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>City</th>
                                <th>Blood Group</th>
                                <th>Status</th>
                                <th>Registered At</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!empty($recentUsers)): ?>
                                <?php foreach ($recentUsers as $u): ?>
                                    <tr>
                                        <td><?= $u->id ?></td>
                                        <td><?= $u->full_name ?></td>
                                        <td><?= $u->city_id ?></td>
                                        <td><?= $u->blood_group ?></td>
                                        <td>
                                            <?php if ($u->status == 'active'): ?>
                                                <span class="badge badge-success">Active</span>
                                            <?php else: ?>
                                                <span class="badge badge-danger">Inactive</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?= $u->created_at ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="text-center text-muted">No users found</td>
                                </tr>
                            <?php endif; ?>
                            </tbody>

                        </table>
                    </div>
                    <div class="card-footer text-right">
                        <a href="<?= base_url('appusers') ?>" class="btn btn-sm btn-secondary">View All Users</a>
                    </div>
                </div>

                <!-- Recent Donors -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Recent Donors</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>Donor ID</th>
                                <th>Name</th>
                                <th>City</th>
                                <th>Blood Group</th>
                                <th>Type</th>
                                <th>Registered At</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!empty($recentDonors)): ?>
                                <?php foreach ($recentDonors as $d): ?>
                                    <tr>
                                        <td><?= $d->id ?></td>
                                        <td><?= $d->full_name ?></td>
                                        <td><?= $d->city_id ?></td>
                                        <td><?= $d->blood_group ?></td>
                                        <td>
                                            <?php if ($d->donor_type == 'voluntary'): ?>
                                                <span class="badge badge-info">Voluntary</span>
                                            <?php elseif ($d->donor_type == 'replacement'): ?>
                                                <span class="badge badge-warning">Replacement</span>
                                            <?php else: ?>
                                                <span class="badge badge-secondary"><?= $d->donor_type ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?= $d->created_at ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="text-center text-muted">No donors found</td>
                                </tr>
                            <?php endif; ?>
                            </tbody>

                        </table>
                    </div>
                    <div class="card-footer text-right">
                        <a href="<?= base_url('donors') ?>" class="btn btn-sm btn-secondary">View All Donors</a>
                    </div>
                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Backend data
            const rawUserData  = <?= json_encode($userChartData ?? []) ?>;
            const rawDonorData = <?= json_encode($donorChartData ?? []) ?>;

            // Safe labels & values
            const userLabels  = rawUserData.map(item => item.month ?? "");
            const userCounts  = rawUserData.map(item => item.count ?? 0);

            const donorLabels = rawDonorData.map(item => item.month ?? "");
            const donorCounts = rawDonorData.map(item => item.count ?? 0);

            // Chart Options
            const chartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }, // ❌ legend off
                    tooltip: {
                        enabled: true,
                        backgroundColor: "#000",
                        titleColor: "#fff",
                        bodyColor: "#fff",
                        displayColors: false
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false,
                            drawBorder: false,
                            drawTicks: false
                        },
                        ticks: { color: "#000" }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: { stepSize: 1, color: "#000" },
                        grid: {
                            display: false,
                            drawBorder: false,
                            drawTicks: false
                        }
                    }
                }
            };

            // Users Chart
            new Chart(document.getElementById('usersChart').getContext("2d"), {
                type: 'bar',
                data: {
                    labels: userLabels,
                    datasets: [{
                        label: "", // ❌ legend undefined hataane ke liye
                        data: userCounts,
                        backgroundColor: '#008cff',
                        borderRadius: 6
                    }]
                },
                options: chartOptions
            });

            // Donors Chart
            new Chart(document.getElementById('donorsChart').getContext("2d"), {
                type: 'bar',
                data: {
                    labels: donorLabels,
                    datasets: [{
                        label: "", // ❌ legend undefined hataane ke liye
                        data: donorCounts,
                        backgroundColor: '#008cff',
                        borderRadius: 6
                    }]
                },
                options: chartOptions
            });
        });
    </script>



<?=$this->endSection()?>