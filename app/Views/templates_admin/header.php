<div class="container-scroller">

    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo" href="<?= base_url('dashboard'); ?>"><img src="<?= base_url('assets/img-admin/logo-mini.svg') ?>" alt="logo" /></a>
            <a class="navbar-brand brand-logo-mini" href="<?= base_url('dashboard'); ?>"><img src="<?= base_url('assets/img-admin/logo-mini.svg') ?>" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile toggle" id="profileDropdown">

                </li>
                <li class="nav-item d-none d-lg-block full-screen-link">
                    <a class="nav-link">
                        <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                    </a>
                </li>

                <li class="nav-item nav-logout d-none d-lg-block">
                    <a class="nav-link" href="<?= ('login/logout'); ?>">
                        <i class="mdi mdi-power"></i>
                    </a>
                </li>

            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item nav-profile">
                    <a href="#" class="nav-link">
                        <div class="nav-profile-image">
                            <img src="<?= base_url('assets/img-admin/faces/admin.jpg') ?>" alt="profile">
                            <span class="login-status online"></span>
                            <!--change to offline or busy as needed-->
                        </div>
                        <div class="nav-profile-text d-flex flex-column">
                            <span class="font-weight-bold mb-2"><?= $nama; ?></span>
                            <span class="text-secondary text-small"><?= $email; ?></span>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('dashboard'); ?>">
                        <span class="menu-title">Dashboard</span>
                        <i class="mdi mdi-home menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('user'); ?>">
                        <span class="menu-title">Data Member</span>
                        <i class="mdi mdi-account-group menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('terapis'); ?>">
                        <span class="menu-title">Data Terapis</span>
                        <i class="mdi mdi-account-group menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('databooking'); ?>">
                        <span class="menu-title">Data Booking</span>
                        <i class="mdi mdi-book menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('massage'); ?>">
                        <span class="menu-title">Data Massage</span>
                        <i class="mdi mdi-format-list-numbered menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('transaksi'); ?>">
                        <span class="menu-title">Transaksi Massage</span>
                        <i class="mdi mdi-credit-card menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('laporan'); ?>">
                        <span class="menu-title">Laporan Transaksi</span>
                        <i class="mdi mdi-history menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('login/logout'); ?>" class="nav-link">
                        <span class="menu-title">Logout</span>
                        <i class="mdi mdi-logout menu-icon"></i>
                    </a>
                </li>
            </ul>
        </nav>