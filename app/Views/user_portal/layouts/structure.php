<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $this->renderSection('title') ?></title>

</head>

<style>

        /* Hide sidebar completely */
    .main-sidebar {
        display: none !important;
    }

    /* Adjust content area */
    .content-wrapper,
    .main-header {
        margin-left: 0 !important;
    }

    /* Hide pushmenu button since sidebar is gone */
    .nav-link[data-widget="pushmenu"] {
        display: none;
    }

    /* Rest of your existing styles */
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
<?= $this->include('user_portal/components/navbar') ?>
<!-- Content Area -->
<?= $this->renderSection('content') ?>
<!-- Footer -->
<?= $this->include('user_portal/components/footer') ?>
</body>
</html>
