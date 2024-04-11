<?php require_once('../config.php') ?>
<!DOCTYPE html>

<html
    lang="en"
    class="light-style customizer-hide"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="assets/"
    data-template="vertical-menu-template-no-customizer">
<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Prison management</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../sneat/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="../sneat/assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="../sneat/assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="../sneat/assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../sneat/assets/vendor/css/rtl/core.css" />
    <link rel="stylesheet" href="../sneat/assets/vendor/css/rtl/theme-default.css" />
    <link rel="stylesheet" href="../sneat/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../sneat/assets/vendor/libs/typeahead-js/typeahead.css" />
    <!-- Vendor -->
    <link rel="stylesheet" href="../sneat/assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="../sneat/assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="../sneat/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../sneat/assets/js/config.js"></script>

    <script>
        var _base_url_ = '<?php echo base_url ?>';
    </script>
</head>

<body>
<!-- Content -->

<div class="authentication-wrapper authentication-cover">
    <div class="authentication-inner row m-0">
        <!-- /Left Text -->
        <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center p-5">
            <div class="w-100 d-flex justify-content-center">
                <img
                    src="../sneat/assets/img/backgrounds/prison.png"
                    class="img-fluid"
                    alt="Login image"
                    width="512"
                    data-app-dark-img="illustrations/boy-with-rocket-dark.png"
                    data-app-light-img="illustrations/boy-with-rocket-light.png" />
            </div>
        </div>
        <!-- /Left Text -->

        <!-- Login -->
        <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-5 p-4">
            <div class="w-px-400 mx-auto">
                <!-- Logo -->
                <div class="app-brand mb-5">
                    <a href="#" class="app-brand-link gap-2">

                    </a>
                </div>
                <!-- /Logo -->
                <h4 class="mb-2">Welcome to Prison Management  👋</h4>
                <p class="mb-4">Please sign-in to your account and start the adventure</p>

                <form id="login-frm" action="" method="post" class="mb-3">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email or Username</label>
                        <input
                            type="text"
                            class="form-control"
                            id="email"
                            name="username"
                            placeholder="Enter your email or username"
                            autofocus />
                    </div>
                    <div class="mb-3 form-password-toggle">
                        <div class="d-flex justify-content-between">
                            <label class="form-label" for="password">Password</label>
<!--                            <a href="auth-forgot-password-cover.html">-->
<!--                                <small>Forgot Password?</small>-->
<!--                            </a>-->
                        </div>
                        <div class="input-group input-group-merge">
                            <input
                                type="password"
                                id="password"
                                class="form-control"
                                name="password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="password" />
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember-me" />
                            <label class="form-check-label" for="remember-me"> Remember Me </label>
                        </div>
                    </div>
                    <button class="btn btn-primary d-grid w-100">Sign in</button>
                </form>

                <p class="text-center">
                    <span>New on our platform?</span>
                    <a href="auth-register-cover.html">
                        <span>Create an account</span>
                    </a>
                </p>

                <div class="divider my-4">
                    <div class="divider-text">or</div>
                </div>

                <div class="d-flex justify-content-center">
                    <a href="javascript:;" class="btn btn-icon btn-label-facebook me-3">
                        <i class="tf-icons bx bxl-facebook"></i>
                    </a>

                    <a href="javascript:;" class="btn btn-icon btn-label-google-plus me-3">
                        <i class="tf-icons bx bxl-google-plus"></i>
                    </a>

                    <a href="javascript:;" class="btn btn-icon btn-label-twitter">
                        <i class="tf-icons bx bxl-twitter"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- /Login -->
    </div>
</div>

<!-- / Content -->

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="../sneat/assets/vendor/libs/jquery/jquery.js"></script>
<script src="../sneat/assets/vendor/libs/popper/popper.js"></script>
<script src="../sneat/assets/vendor/js/bootstrap.js"></script>
<script src="../sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="../sneat/assets/vendor/libs/hammer/hammer.js"></script>
<script src="../sneat/assets/vendor/libs/i18n/i18n.js"></script>
<script src="../sneat/assets/vendor/libs/typeahead-js/typeahead.js"></script>

<script src="../sneat/assets/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="../sneat/assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
<script src="../sneat/assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
<script src="../sneat/assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>

<!-- Main JS -->
<script src="../sneat/assets/js/main.js"></script>

<!-- Page JS -->
<script src="../sneat/assets/js/pages-auth.js"></script>

<script src = "../dist/js/script.js"></script>

</body>
</html>
