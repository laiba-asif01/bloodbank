<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->include('interface/components/header') ?>
</head>
<style>
    /* ye apni CSS file me daalo */
    .img-overlay::before {
        position: absolute;
        content: '';
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        mix-blend-mode: multiply;
        background: #FB3640;
        background: -webkit-linear-gradient(to right, #17173A, #FB3640);
        background: linear-gradient(to right, #17173A, #FB3640);
        z-index: -1;
    }
    .swiper-pagination-bullet-active {
        background-color: #000 !important;
    }
    .faq-item {
        transition: all 0.3s ease;
        border: 1px solid #ef4444 !important;
    }

    .faq-item.active {
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
    }

    .faq-answer {
        transition: max-height 0.5s ease;
    }
    /* Preloader Styles */
    #preloader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #000;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .dotted-spinner {
        width: 80px;
        height: 80px;
        position: relative;
    }

    .dot {
        position: absolute;
        width: 16px;
        height: 16px;
        background: #ef4444;
        border-radius: 50%;
        animation: spin 1.2s infinite ease-in-out both;
    }

    .dot:nth-child(1) {
        top: 0;
        left: 0;
        animation-delay: -0.4s;
    }

    .dot:nth-child(2) {
        top: 0;
        right: 0;
        animation-delay: -0.8s;
    }

    .dot:nth-child(3) {
        bottom: 0;
        right: 0;
        animation-delay: -1.2s;
    }

    .dot:nth-child(4) {
        bottom: 0;
        left: 0;
        animation-delay: -1.6s;
    }

    @keyframes spin {
        0%, 80%, 100% {
            transform: scale(0);
            opacity: 0.5;
        }
        40% {
            transform: scale(1);
            opacity: 1;
        }
    }

    /* Existing styles */
    .img-overlay::before {
        position: absolute;
        content: '';
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        mix-blend-mode: multiply;
        background: #FB3640;
        background: -webkit-linear-gradient(to right, #17173A, #FB3640);
        background: linear-gradient(to right, #17173A, #FB3640);
        z-index: -1;
    }
    .swiper-pagination-bullet-active {
        background-color: #000 !important;
    }
    .faq-item {
        transition: all 0.3s ease;
        border: 1px solid #ef4444 !important;
    }

    .faq-item.active {
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
    }

    .faq-answer {
        transition: max-height 0.5s ease;
    }
    #preloader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #000;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        z-index: 9999;
    }

    .preloader {
        display: inline-block;
        position: relative;
        width: 50px;
        height: 50px;
    }

    .preloader-dots {
        width: 100%;
        height: 100%;
        border: 8px dotted #ff3b3b;
        border-radius: 50%;
        animation: spin 2s linear infinite;

    }



    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* Main content hidden initially */

</style>
<body>

<!-- Preloader -->
<div id="preloader">
    <div class="preloader">
        <div class="preloader-dots"></div>
    </div>
</div>


<!-- Website Content -->
<div id="main-content">
<!-- Navbar -->
<?= $this->include('interface/components/navbar') ?>
<!-- Content Area -->
<?= $this->renderSection('content') ?>
<!-- Footer -->
<?= $this->include('interface/components/footer') ?>
</div>
<script>
    // Jab page load ho jaye
    window.addEventListener("load", function() {
        setTimeout(() => {
            document.getElementById("preloader").style.display = "none"; // Preloader hide
            document.getElementById("main-content").style.display = "block"; // Content show
            document.body.style.overflow = "auto"; // Scroll enable
        }, 500); // 3 sec baad content show hoga
    });
</script>
</body>

</html>
