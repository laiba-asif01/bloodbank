<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $this->renderSection('title') ?></title>
</head>

<style>
    #toast-container {
        position: fixed;
        top: 20px;
        right: -400px; /* Start off screen */
        z-index: 9999;
        transition: right 0.6s ease-in-out;
    }

    .toast-message {
        background: #000;
        color: #fff;
        padding: 14px 20px;
        border-radius: 6px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.3);
        min-width: 250px;
        font-size: 16px;
        font-weight: normal;
        opacity: 0.95;
        word-spacing: 4px;
        text-align: center;
    }

</style>
<body>


<!-- Navbar -->
<?= $this->include('adminpannel/components/navbar') ?>
<!-- Content Area -->
<?= $this->renderSection('content') ?>
<!-- Footer -->
<?= $this->include('adminpannel/components/footer') ?>
</body>
</html>
