<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Bank App - Login</title>
    <link rel="stylesheet" href="<?= base_url("assets/plugins/fontawesome-free/css/all.min.css") ?>">
    <link rel="stylesheet" href="<?= base_url("assets/dist/css/adminlte.min.css") ?>">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <b>Blood Bank App</b>
    </div>

    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <?php if(session()->getFlashdata('error')): ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

            <form action="<?= base_url('login/check') ?>" method="post">
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="admin@admin.com" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="admin" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                </div>
            </form>

            <p class="mb-1 mt-3">
                Not able to login? <a href="<?= base_url('login/auto') ?>">Click here</a>
            </p>
        </div>
    </div>
</div>
</body>
</html>
