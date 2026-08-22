<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Blood Donor Portal</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * { font-family: 'Poppins', sans-serif; }
        .blood-gradient {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 50%, #a71d2a 100%);
        }
        .card-shadow {
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }
        .btn-gradient {
            background: linear-gradient(135deg, #dc3545, #c82333);
        }
        .btn-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(220, 53, 69, 0.4);
        }
        .input-focus:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 3px rgba(220, 53, 69, 0.1);
        }
        /* Floating blood drops */
        .blood-drop {
            position: fixed;
            font-size: 30px;
            color: rgba(255, 255, 255, 0.1);
            animation: float 6s ease-in-out infinite;
        }

        .blood-drop:nth-child(1) {
            left: 10%
        }

        .blood-drop:nth-child(2) {
            left: 30%;
            animation-delay: 1s
        }

        .blood-drop:nth-child(3) {
            left: 70%;
            animation-delay: 2s
        }

        .blood-drop:nth-child(4) {
            left: 90%;
            animation-delay: 3s
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
            }
            50% {
                transform: translateY(-20px) rotate(10deg);
            }
        }
    </style>
</head>
<body class="font-poppins min-h-screen flex items-center justify-center bg-gradient-to-br from-red-600 via-red-700 to-red-800 p-5">
<!-- Floating Icons -->
<i class="fas fa-tint blood-drop"></i>
<i class="fas fa-tint blood-drop"></i>
<i class="fas fa-tint blood-drop"></i>
<i class="fas fa-tint blood-drop"></i>
<div class="max-w-md w-full">
    <div class="bg-white rounded-2xl card-shadow overflow-hidden">
        <!-- Header -->
        <div class="bg-gradient-to-br from-red-500 to-red-600 text-white text-center px-8 py-5">
            <div class="w-20 h-20 bg-white/20 rounded-full border-2 border-white/30 flex items-center justify-center mx-auto mb-5">
                <i class="fas fa-key text-3xl"></i>
            </div>
<!--            <h2 class="text-2xl font-bold mb-2">Forgot Password</h2>-->
            <p class="opacity-90 font-medium">Enter your registration number and mobile number to recover password</p>
        </div>

        <!-- Body -->
        <div class="p-8">
            <?php if(session()->getFlashdata('error')): ?>
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg mb-6">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <?php if(session()->getFlashdata('success')): ?>
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg mb-6">
                    <i class="fas fa-check-circle mr-2"></i>
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <!-- Dynamic Alert -->
            <div id="resultAlert" class="hidden p-4 rounded-lg mb-6"></div>

            <form id="forgotForm">
                <!-- Registration Number -->
                <div class="mb-6">
                    <label class="block text-gray-700 font-medium mb-2">
                        <i class="fas fa-id-card mr-2 text-red-600"></i>Registration Number
                    </label>
                    <input type="text"
                           id="reg_no"
                           name="reg_no"
                           class="w-full h-12 border-2 border-gray-200 rounded-lg px-4 input-focus focus:outline-none"
                           placeholder="Enter your registration number"
                           required>
                </div>

                <!-- Mobile Number -->
                <div class="mb-8">
                    <label class="block text-gray-700 font-medium mb-2">
                        <i class="fas fa-phone mr-2 text-red-600"></i>Mobile Number
                    </label>
                    <input type="text"
                           id="mobile"
                           name="mobile"
                           class="w-full h-12 border-2 border-gray-200 rounded-lg px-4 input-focus focus:outline-none"
                           placeholder="Enter your 11-digit mobile number"
                           pattern="\d{11}"
                           title="Please enter exactly 11 digits"
                           required>
                    <p class="text-gray-500 text-sm mt-2">
                        Enter the mobile number registered with your account (11 digits)
                    </p>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                        id="submitBtn"
                        class="w-full h-12 rounded-xl bg-gradient-to-br from-red-500 to-red-600 text-white font-medium text-md transition hover:-translate-y-1 hover:shadow-xl">
                        <span class="btn-text">
                            <i class="fas fa-search mr-2"></i>Find My Account
                        </span>
                    <span class="btn-loading hidden">
                            <span class="inline-block animate-spin rounded-full h-4 w-4 border-t-2 border-b-2 border-white mr-2"></span>
                            Searching...
                        </span>
                </button>
            </form>

            <!-- Password Result -->
            <div id="passwordResult" class="hidden mt-6 p-6 bg-gray-50 rounded-lg">
                <h5 class="text-green-600 font-semibold mb-4">
                    <i class="fas fa-check-circle mr-2"></i>Account Found!
                </h5>
                <div class="space-y-3">
                    <p class="text-gray-700">
                        <span class="font-medium">Registration:</span>
                        <span id="foundRegNo" class="ml-2"></span>
                    </p>
                    <p class="text-gray-700">
                        <span class="font-medium">Name:</span>
                        <span id="foundName" class="ml-2"></span>
                    </p>
                    <p class="text-gray-700">
                        <span class="font-medium">Mobile:</span>
                        <span id="foundMobile" class="ml-2"></span>
                    </p>
                    <p class="text-gray-700">
                        <span class="font-medium">Password:</span>
                        <span id="foundPassword" class="ml-2 text-red-600 font-bold"></span>
                    </p>
                </div>
                <hr class="my-4 border-gray-300">
                <p class="text-gray-500 text-sm">
                    Please save your password securely and
                    <a href="<?= base_url('user/login') ?>" class="text-red-600 font-medium hover:underline">
                        login here
                    </a>.
                </p>
            </div>
        </div>

        <!-- Footer -->
        <div class="border-t border-gray-200 py-5 px-8 text-center">
            <a href="<?= base_url('user/login') ?>"
               class="text-red-600 font-medium hover:text-red-700 transition-colors duration-300">
                <i class="fas fa-arrow-left mr-2"></i>Back to Login
            </a>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function() {
        // Mobile number formatting
        $('#mobile').on('input', function() {
            var value = $(this).val().replace(/\D/g, '');
            $(this).val(value.substring(0, 11));
        });

        // Form submission
        $('#forgotForm').on('submit', function(e) {
            e.preventDefault();

            // Mobile validation
            var mobile = $('#mobile').val();
            if (!/^\d{11}$/.test(mobile)) {
                showAlert('Mobile number must be exactly 11 digits.', 'error');
                return;
            }

            // Show loading state
            const btn = $('#submitBtn');
            $('.btn-text').addClass('hidden');
            $('.btn-loading').removeClass('hidden');
            btn.prop('disabled', true);

            // Hide previous results
            $('#resultAlert').addClass('hidden');
            $('#passwordResult').addClass('hidden');

            // AJAX request
            $.ajax({
                url: '<?= base_url('user/forgot-password') ?>',
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(res) {
                    // Reset button state
                    $('.btn-text').removeClass('hidden');
                    $('.btn-loading').addClass('hidden');
                    btn.prop('disabled', false);

                    if (res.status === 'success') {
                        // Show success result
                        $('#foundRegNo').text(res.reg_no);
                        $('#foundName').text(res.name);
                        $('#foundMobile').text(res.mobile);
                        $('#foundPassword').text(res.password);
                        $('#passwordResult').removeClass('hidden');
                    } else {
                        showAlert(res.message, 'error');
                    }
                },
                error: function() {
                    // Reset button state
                    $('.btn-text').removeClass('hidden');
                    $('.btn-loading').addClass('hidden');
                    btn.prop('disabled', false);

                    showAlert('Network error. Please try again.', 'error');
                }
            });
        });

        // Alert function
        function showAlert(message, type) {
            const alertDiv = $('#resultAlert');
            const alertClass = type === 'error' ?
                'bg-red-100 border-l-4 border-red-500 text-red-700' :
                'bg-green-100 border-l-4 border-green-500 text-green-700';

            alertDiv.removeClass('hidden')
                .removeClass('bg-red-100 border-red-500 text-red-700 bg-green-100 border-green-500 text-green-700')
                .addClass(alertClass)
                .html(`<i class="fas fa-${type === 'error' ? 'exclamation' : 'check'}-circle mr-2"></i>${message}`);

            if (type === 'error') {
                setTimeout(() => {
                    alertDiv.addClass('hidden');
                }, 5000);
            }
        }
    });
</script>
</body>
</html>