<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?= base_url() ?>/assets/img/favicon.png">
    <title>
        Aplikasi Kasir
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="<?= base_url() ?>/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="<?= base_url() ?>/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="<?= base_url() ?>/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="<?= base_url() ?>/assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
    <!--<style>
    :hover{
      color: #5E72E4;
      transition: all .3s ease-in-out;
    }

.active:hover{
  color: #5E72E4 !important;
}
  </style>-->
</head>

<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>

    <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 shadow-lg" id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <p class="navbar-brand m-0" href="#" target="">
                <img src="<?= base_url() ?>/assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold">Aplikasi Kasir</span>
            </p>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="<?= base_url() ?>">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Beranda</span>
                    </a>
                </li>
                <hr class="horizontal dark mt-0">
                <li class="nav-item">
                    <a class="nav-link " role="button" data-bs-toggle="" href="#" style="cursor: default;">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Master Data</span>
                    </a>
                    <div class="collapse show" id="md">
                        <ul class="nav rounded-2 ms-2">
                            <li class="nav-item">
                                <a class="nav-link text-light" href="<?= base_url() ?>/produk">
                                    <div class="icon icon-shape icon-md text-center d-flex align-items-center">
                                        <i class="ni ni-box-2 text-dark" aria-hidden="true"></i>
                                    </div>
                                    <span class="sidenav-normal ms-0 ps-0 text-dark">Produk</span>
                                </a>
                        </ul>
                        <ul class="nav rounded-2 ms-2">
                            <li class="nav-item">
                                <a class="nav-link text-light" href="<?= base_url() ?>/pelanggan">
                                    <div class="icon icon-shape icon-md text-center d-flex align-items-center">
                                        <i class="ni ni-single-02 text-dark" aria-hidden="true"></i>
                                    </div>
                                    <span class="sidenav-normal ms-0 ps-0 text-dark">Pelanggan</span>
                                </a>
                        </ul>
                        <?php if (in_groups('admin')) : ?>
                            <ul class="nav rounded-2 ms-2">
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="<?= base_url() ?>/pengguna">
                                        <div class="icon icon-shape icon-md text-center d-flex align-items-center">
                                            <i class="ni ni-satisfied text-dark" aria-hidden="true"></i>
                                        </div>
                                        <span class="sidenav-normal ms-0 ps-0 text-dark">Pengguna</span>
                                    </a>
                            </ul>
                        <?php endif; ?>
                        <!--<a class="dropdown-item text-light" href="<?= base_url() ?>/barang">Barang</a>
                        <a class="dropdown-item text-light" href="<?= base_url() ?>/kategori">Kategori</a>-->
                    </div>
                </li>
                <?php if (in_groups('petugas')) : ?>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="" aria-expanded="false" href="tr">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Transaksi</span>
                        </a>
                        <div class="collapse show" id="tr">
                            <ul class="nav rounded-2 ms-2">
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="<?= base_url() ?>/penjualan">
                                        <div class="icon icon-shape icon-md text-center d-flex align-items-center">
                                            <i class="ni ni-cart text-dark" aria-hidden="true"></i>
                                        </div>
                                        <span class="sidenav-normal ms-0 ps-0 text-dark">Penjualan</span>
                                    </a>
                                </li>
                            </ul>
                            <!--<a class="dropdown-item text-light" href="<?= base_url() ?>/barang">Barang</a>
                        <a class="dropdown-item text-light" href="<?= base_url() ?>/kategori">Kategori</a>-->
                        </div>
                    </li>
                <?php endif; ?>
                <?php if (in_groups('admin')) : ?>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="" aria-expanded="false" href="tr">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-single-copy-04 text-danger text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Laporan</span>
                        </a>
                        <div class="collapse show" id="tr">
                            <ul class="nav rounded-2 ms-2">
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="#">
                                        <div class="icon icon-shape icon-md text-center d-flex align-items-center">
                                            <i class="ni ni-app text-dark" aria-hidden="true"></i>
                                        </div>
                                        <span class="sidenav-normal ms-0 ps-0 text-dark">Stock Barang</span>
                                    </a>
                                </li>
                            </ul>
                            <!--<a class="dropdown-item text-light" href="<?= base_url() ?>/barang">Barang</a>
                        <a class="dropdown-item text-light" href="<?= base_url() ?>/kategori">Kategori</a>-->
                        </div>
                    </li>
                <?php endif; ?>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="../pages/profile.html">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Profile</span>
                    </a>
                </li>
            </ul>
        </div>
        <!--<div class="sidenav-footer mx-3">
            <div class="card card-plain shadow-none" id="sidenavCard">
                <img class="w-50 mx-auto" src="<?= base_url() ?>/assets/img/illustrations/icon-documentation.svg" alt="sidebar_illustration">
                <div class="card-body text-center p-3 w-100 pt-0">
                    <div class="docs-info">
                        <h6 class="mb-0">Need help?</h6>
                        <p class="text-xs font-weight-bold mb-0">Sorry, we can't help you</p>
                    </div>
                </div>
            </div>
            <a href="https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard" target="_blank" class="btn btn-dark btn-sm w-100 mb-3">Documentation</a>
            <a class="btn btn-primary btn-sm mb-0 w-100" href="https://www.creative-tim.com/product/argon-dashboard-pro?ref=sidebarfree" type="button">Upgrade to pro</a>
        </div>-->
    </aside>