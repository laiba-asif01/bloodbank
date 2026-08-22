<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login - Blood Donor Portal</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

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

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            font-weight: 500;
            color: #333;
            margin-bottom: 8px;
            display: block;
        }

        .input-group {
            position: relative;
        }


        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #6c757d;
            z-index: 10;
        }

        .password-toggle:hover {
            color: #dc3545;
        }


        .alert {
            border-radius: 10px;
            border: none;
            margin-bottom: 20px;
        }

        .alert-danger {
            background: #fce4e7;
            color: #c82333;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
        }

        /* Floating blood drops animation */
        .blood-drop {
            position: fixed;
            font-size: 30px;
            color: rgba(255, 255, 255, 0.1);
            animation: float 6s ease-in-out infinite;
        }

        .blood-drop:nth-child(1) {
            left: 10%;
            animation-delay: 0s;
        }

        .blood-drop:nth-child(2) {
            left: 30%;
            animation-delay: 1s;
        }

        .blood-drop:nth-child(3) {
            left: 70%;
            animation-delay: 2s;
        }

        .blood-drop:nth-child(4) {
            left: 90%;
            animation-delay: 3s;
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
<body class="font-poppins min-h-screen flex items-center justify-center bg-gray-200 p-5">
<!-- Background decoration -->
<i class="fas fa-tint blood-drop"></i>
<i class="fas fa-tint blood-drop"></i>
<i class="fas fa-tint blood-drop"></i>
<i class="fas fa-tint blood-drop"></i>



<div class="max-w-md w-full">
    <div class="bg-white rounded-2xl card-shadow overflow-hidden">
        <!-- Header -->
        <div class="bg-gradient-to-br from-red-500 to-red-600 text-white text-center px-8 py-5">
            <div class="w-20 h-20 bg-white/20 rounded-full border-2 border-white/30 flex items-center justify-center mx-auto mb-5">
                <i class="fas fa-tint text-3xl"></i>
            </div>
            <h2 class="text-2xl font-bold mb-2">User Portal Login</h2>

        </div>

        <!-- Body -->
        <div class="p-8 pt-10">
            <!-- Error/Success Messages -->
            <?php if (session()->getFlashdata('error')): ?>
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg mb-6">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('success')): ?>
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg mb-6">
                    <i class="fas fa-check-circle mr-2"></i>
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <div id="loginAlert" class="hidden p-4 rounded-lg mb-6"></div>

            <form id="loginForm">
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

                <div class="mb-6">
                    <label for="password" class="block text-gray-700 font-medium mb-2">
                        <i class="fas fa-lock mr-2 text-red-600"></i> Password
                    </label>
                    <div class="input-group mb-2">

                        <input type="password"

                               id="password"
                               name="password"
                               placeholder="Enter your password"
                               class="w-full h-12 border-2 border-gray-200 rounded-lg px-4 input-focus focus:outline-none"

                               required
                               autocomplete="current-password">
                        <span class="password-toggle" onclick="togglePassword()">
                                <i class="fas fa-eye" id="toggleIcon"></i>
                            </span>
                    </div>
                    <a href="<?= base_url('user/forgot-password') ?>"
                       class="text-red-600 font-medium hover:text-red-700 transition-colors duration-300 relative left-60">
                       Forgot Password?
                    </a>
                </div>

                <button type="submit"
                        class="w-full h-12 rounded-xl bg-gradient-to-br from-red-500 to-red-600 text-white font-medium text-md transition hover:-translate-y-1 hover:shadow-xl"
                        id="loginBtn">
                        <span class="btn-text">
                            <i class="fas fa-sign-in-alt mr-2"></i> Login to Portal
                        </span>
                    <span class="btn-loading hidden">
                            <span class="spinner-border spinner-border-sm mr-2"></span> Logging in...
                        </span>
                </button>
            </form>
        </div>

        <!-- Footer -->
        <div class="border-t border-gray-200 py-5 px-8 text-center">
            <p class="mb-2">Don't have an account?</p>
            <a href="<?= base_url('registerasuser') ?>"
               class="text-red-600 font-medium hover:text-red-700 transition-colors duration-300">
                <i class="fas fa-user-plus mr-1"></i> Register as User
            </a>
            <br><br>

        </div>
    </div>

    <p class="text-center text-white mt-4 mb-0" style="opacity: 0.8; font-size: 14px;">
        &copy; <?= date('Y') ?> Blood Donor Portal. All rights reserved.
    </p>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Toggle password visibility
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const toggleIcon = document.getElementById('toggleIcon');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleIcon.classList.remove('fa-eye');
            toggleIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            toggleIcon.classList.remove('fa-eye-slash');
            toggleIcon.classList.add('fa-eye');
        }
    }

    // Show alert function
    function showAlert(message, type) {
        const alertDiv = $('#loginAlert');
        alertDiv.removeClass('alert-danger alert-success')
            .addClass('alert-' + type)
            .html('<i class="fas fa-' + (type === 'success' ? 'check' : 'exclamation') + '-circle mr-2"></i>' + message)
            .slideDown();

        if (type === 'danger') {
            setTimeout(() => alertDiv.slideUp(), 5000);
        }
    }

    // Handle form submission
    $('#loginForm').on('submit', function (e) {
        e.preventDefault();

        const btn = $('#loginBtn');
        const btnText = btn.find('.btn-text');
        const btnLoading = btn.find('.btn-loading');

        // Show loading state
        btnText.hide();
        btnLoading.show();
        btn.prop('disabled', true);
        $('#loginAlert').hide();

        $.ajax({
            url: '<?= base_url('user/login') ?>',
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    showAlert('Login successful! Redirecting...', 'success');

                    // Redirect after short delay
                    setTimeout(function () {
                        window.location.href = response.redirect || '<?= base_url('userportal') ?>';
                    }, 1000);
                } else {
                    showAlert(response.message || 'Invalid credentials. Please try again.', 'danger');
                    btnText.show();
                    btnLoading.hide();
                    btn.prop('disabled', false);
                }
            },
            error: function (xhr, status, error) {
                showAlert('Network error. Please try again.', 'danger');
                btnText.show();
                btnLoading.hide();
                btn.prop('disabled', false);
            }
        });
    });

    // Auto-focus on registration number field
    $(document).ready(function () {
        $('#reg_no').focus();
    });
</script>
</body>
</html>