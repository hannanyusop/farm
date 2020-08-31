<?php include('../function.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>The Ranch Dairy Farm Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico">

    <!-- App css -->
    <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
    <link href="../assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />

</head>

<body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>

<!-- Pre-loader -->
<div id="preloader">
    <div id="status">
        <div class="bouncing-loader"><div ></div><div ></div><div ></div></div>
    </div>
</div>
<!-- End Preloader-->

<!-- Begin page -->
<div class="wrapper">
    <!-- ========== Left Sidebar Start ========== -->
    <div class="left-side-menu">

        <!-- LOGO -->
        <a href="#" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="../assets/images/logo.png" alt="" height="16">
                    </span>
            <span class="logo-sm">
                        <img src="../assets/images/logo_sm.png" alt="" height="16">
                    </span>
        </a>

        <!-- LOGO -->
        <a href="#" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <img src="../assets/images/logo-dark.png" alt="" height="16">
                    </span>
            <span class="logo-sm">
                        <img src="../assets/images/logo_sm_dark.png" alt="" height="16">
                    </span>
        </a>

        <div class="h-100" id="left-side-menu-container" data-simplebar>

            <!--- Sidemenu -->
            <ul class="metismenu side-nav">
                <li class="side-nav-title side-nav-item">Navigation</li>

                <li class="side-nav-item">
                    <a href="home.php" class="side-nav-link">
                        <i class="uil-dashboard"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a href="javascript: void(0);" class="side-nav-link">
                        <i class="uil-crockery"></i>
                        <span> Cow Feed </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="side-nav-second-level" aria-expanded="false">
                        <li>
                            <a href="extended-dragula.html">Dragula</a>
                        </li>
                    </ul>
                </li>

                <li class="side-nav-item">
                    <a href="javascript: void(0);" class="side-nav-link">
                        <i class="uil-syringe"></i>
                        <span> Vaccine </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="side-nav-second-level" aria-expanded="false">
                        <li>
                            <a href="extended-dragula.html">Dragula</a>
                        </li>
                    </ul>
                </li>

                <li class="side-nav-item">
                    <a href="javascript: void(0);" class="side-nav-link">
                        <i class="uil-user-check"></i>
                        <span> User </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="side-nav-second-level" aria-expanded="false">
                        <li>
                            <a href="extended-dragula.html">Dragula</a>
                        </li>
                    </ul>
                </li>

                <li class="side-nav-item">
                    <a href="home.php" class="side-nav-link">
                        <i class="uil-chart"></i>
                        <span> Report </span>
                    </a>
                </li>



            </ul>

            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->


    <div class="content-page">
        <div class="content">
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topbar-right-menu float-right mb-0">


                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                           aria-expanded="false">
                                    <span class="account-user-avatar">
                                        <img src="../assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                                    </span>
                            <span>
                                        <span class="account-user-name"><?= $_SESSION['user']['username'] ?></span>
                                        <span class="account-position"><?= $_SESSION['user']['usertype'] ?></span>
                                    </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                            <!-- item-->
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="mdi mdi-account-circle mr-1"></i>
                                <span>My Account</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="mdi mdi-account-edit mr-1"></i>
                                <span>Settings</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="mdi mdi-lifebuoy mr-1"></i>
                                <span>Support</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="mdi mdi-lock-outline mr-1"></i>
                                <span>Lock Screen</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="mdi mdi-logout mr-1"></i>
                                <span>Logout</span>
                            </a>

                        </div>
                    </li>

                </ul>
                <button class="button-menu-mobile open-left disable-btn">
                    <i class="mdi mdi-menu"></i>
                </button>
            </div>
            <!-- end Topbar -->

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                    <li class="breadcrumb-item active">Preloader Example</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Dashboard With Preloader</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

            </div> <!-- container -->

        </div> <!-- content -->

        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        2018 - 2020 © Hyper - Coderthemes.com
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-right footer-links d-none d-md-block">
                            <a href="javascript: void(0);">About</a>
                            <a href="javascript: void(0);">Support</a>
                            <a href="javascript: void(0);">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->

    </div>

</div>


<!-- bundle -->
<script src="../assets/js/vendor.min.js"></script>
<script src="../assets/js/app.min.js"></script>

<!-- Apex js -->
<script src="../assets/js/vendor/apexcharts.min.js"></script>

<!-- Todo js -->
<script src="../assets/js/ui/component.todo.js"></script>

<!-- demo app -->
<script src="../assets/js/pages/demo.dashboard-crm.js"></script>
<!-- end demo js-->
</body>
</html>
