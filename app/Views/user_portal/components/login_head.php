<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Login - Blood Donor Portal</title>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
    * {
        font-family: 'Poppins', sans-serif;
    }



    .login-container {
        max-width: 450px;
        width: 100%;
    }

    .login-card {
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        overflow: hidden;
    }

    .login-header {
        background: linear-gradient(135deg, #dc3545, #c82333);
        padding: 40px 30px;
        text-align: center;
        color: #fff;
    }

    .login-header .icon-circle {
        width: 80px;
        height: 80px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        border: 3px solid rgba(255, 255, 255, 0.3);
    }

    .login-header .icon-circle i {
        font-size: 36px;
    }

    .login-header h2 {
        margin: 0;
        font-weight: 600;
        font-size: 24px;
    }

    .login-header p {
        margin: 10px 0 0;
        opacity: 0.9;
        font-size: 14px;
    }

    .login-body {
        padding: 40px 30px;
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

    .input-group-prepend {
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        z-index: 10;
    }

    .input-group-text {
        background: transparent;
        border: none;
        color: #dc3545;
        padding: 0 15px;
        height: 100%;
        display: flex;
        align-items: center;
    }

    .form-control {
        height: 50px;
        border: 2px solid #e9ecef;
        border-radius: 10px;
        padding-left: 45px;
        font-size: 15px;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #dc3545;
        box-shadow: 0 0 0 3px rgba(220, 53, 69, 0.1);
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

    .btn-login {
        width: 100%;
        height: 50px;
        background: linear-gradient(135deg, #dc3545, #c82333);
        border: none;
        border-radius: 10px;
        color: #fff;
        font-weight: 600;
        font-size: 16px;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .btn-login:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(220, 53, 69, 0.4);
    }

    .btn-login:active {
        transform: translateY(0);
    }

    .btn-login .spinner-border {
        width: 20px;
        height: 20px;
        border-width: 2px;
    }

    .login-footer {
        text-align: center;
        padding: 20px 30px 30px;
        border-top: 1px solid #f1f1f1;
    }

    .login-footer a {
        color: #dc3545;
        text-decoration: none;
        font-weight: 500;
    }

    .login-footer a:hover {
        text-decoration: underline;
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

    /* Back to home link */
    .back-home {
        position: fixed;
        top: 20px;
        left: 20px;
        color: #fff;
        text-decoration: none;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 8px;
        opacity: 0.9;
        transition: opacity 0.3s;
    }

    .back-home:hover {
        opacity: 1;
        color: #fff;
        text-decoration: none;
    }

    /* Floating blood drops animation */
    .blood-drop {
        position: fixed;
        font-size: 30px;
        color: rgba(255, 255, 255, 0.1);
        animation: float 6s ease-in-out infinite;
    }

    .blood-drop:nth-child(1) { left: 10%; animation-delay: 0s; }
    .blood-drop:nth-child(2) { left: 30%; animation-delay: 1s; }
    .blood-drop:nth-child(3) { left: 70%; animation-delay: 2s; }
    .blood-drop:nth-child(4) { left: 90%; animation-delay: 3s; }

    @keyframes float {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(10deg); }
    }

    /* Responsive */
    @media (max-width: 576px) {
        .login-header {
            padding: 30px 20px;
        }
        .login-body {
            padding: 30px 20px;
        }
        .login-footer {
            padding: 15px 20px 25px;
        }
    }
</style>