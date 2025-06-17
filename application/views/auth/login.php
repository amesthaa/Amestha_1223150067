<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login | Your App</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/fontawesome-free/css/all.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/dist/css/adminlte.min.css'); ?>">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <style>
    body {
      background-color: #f4f6f9; /* Light background similar to AdminLTE default */
    }
    .login-box {
      width: 380px; /* Slightly wider for better spacing */
      margin: 7% auto; /* Center vertically and horizontally */
    }
    .login-logo a {
      color: #343a40; /* Darker color for logo text */
      font-weight: 700;
    }
    .card {
      border: none; /* Remove card border */
      box-shadow: 0 0 1px rgba(0,0,0,.125),0 1px 3px rgba(0,0,0,.2); /* Subtle shadow */
    }
    .login-card-body {
      padding: 30px; /* Increase padding */
    }
    .login-box-msg {
      font-size: 1.1rem; /* Slightly larger message font */
      margin-bottom: 25px; /* More space below message */
      color: #6c757d; /* Muted color */
    }
    .input-group-text {
      background-color: #e9ecef; /* Lighter background for input icons */
      border-color: #ced4da;
    }
    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
      transition: all 0.3s ease; /* Smooth transition for hover */
    }
    .btn-primary:hover {
      background-color: #0056b3;
      border-color: #004085;
    }
    /* Remove social auth links */
    .social-auth-links {
      display: none;
    }
    /* Simple footer links */
    .simple-links {
      text-align: center;
      margin-top: 20px;
    }
    .simple-links a {
      color: #007bff;
      text-decoration: none;
      font-size: 0.9rem;
      padding: 0 10px;
    }
    .simple-links a:hover {
      text-decoration: underline;
    }
    /* Custom error message style */
    .alert-error {
      color: #dc3545; /* Red color */
      background-color: #f8d7da; /* Light red background */
      border: 1px solid #f5c6cb; /* Red border */
      padding: 10px;
      margin-bottom: 20px;
      border-radius: .25rem;
      text-align: center;
    }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Your</b>App</a> </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <?php if ($this->session->flashdata('error')): ?>
        <p class="alert-error"> <?= $this->session->flashdata('error'); ?> </p>
      <?php endif; ?>

      <form action="<?= site_url('auth/process_login') ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Username or Email"> <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span> </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          </div>
      </form>

      <div class="simple-links">
        <a href="forgot-password.html">Forgot Password?</a>
        <a href="register">Register New Account</a>
      </div>
    </div>
    </div>
</div>
<script src="<?= base_url('assets/adminlte/plugins/jquery/jquery.min.js')?>"></script>
<script src="<?= base_url('assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<script src="<?= base_url('assets/adminlte/dist/js/adminlte.min.js')?>"></script>

</body>
</html>