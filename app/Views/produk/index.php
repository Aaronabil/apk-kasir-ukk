<main class="main-content position-relative border-radius-lg ">
  <!-- Navbar -->
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
          <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Master Data</a></li>
          <li class="breadcrumb-item text-sm text-white active" aria-current="page">Produk</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0">Produk</h6>
      </nav>
      <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          <div class="input-group">
            <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
            <input type="text" class="form-control" placeholder="Type here...">
          </div>
        </div>
        <ul class="navbar-nav  justify-content-end">
          <li class="nav-item d-flex align-items-center">
            <a href="<?= base_url('logout') ?>" class="nav-link text-white font-weight-bold px-0">
              <i class="fa fa-user me-sm-1"></i>
              <span class="d-sm-inline d-none">Logout</span>
            </a>
          </li>
          <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
              <div class="sidenav-toggler-inner">
                <i class="sidenav-toggler-line bg-white"></i>
                <i class="sidenav-toggler-line bg-white"></i>
                <i class="sidenav-toggler-line bg-white"></i>
              </div>
            </a>
          </li>
          <li class="nav-item px-3 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-white p-0">
              <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
            </a>
          </li>
          <!--<li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../public/assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New message</span> from Laur
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          13 minutes ago
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../public/assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New album</span> by Travis Scott
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          1 day
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <title>credit-card</title>
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                              <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(453.000000, 454.000000)">
                                  <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                  <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          Payment successfully completed
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          2 days
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>-->
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->

  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6><i class="ni ni-box-2 text-dark align-items-center" aria-hidden="true"></i>&nbsp;Tabel Produk</h6>
            <!--<div class='col-8  text-sm alert alert-warning'>
              <span class='glyphicon glyphicon-info-sign'></span> Ada <span class="text-danger">2</span> barang yang Stok tersisa sudah kurang dari 3 items. Silahkan pesan lagi !!
              <span class='pull-right'><a class="text-white" href='index.php?page=barang&stok=yes'>Cek Barang <i class='fa fa-angle-double-right'></i></a></span>
            </div>-->
            <form action="<?= base_url() ?>/produk" method="get">
              <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group">
                  <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                  <input type="text" name="search" class="form-control" placeholder="Cari Produk..." value="<?= $search ?>">
                </div>
                <input type="submit" id="btnsearch" value="Cari" class="btn btn-primary ms-2 mt-3" onclick='document.getElementById("searchForm").submit();'>
              </div>
            </form>
            <a class="btn btn-sm bg-gradient-dark text-xxs mb-0 mt-0" href="<?= base_url() ?>/produk/create"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Produk</a>
          </div>
          <?php if (session()->getFlashdata('berhasil')) : ?>
            <div class="alert alert-success col-3 text-sm text-light ms-4 my-2" role="alert">
              <b><?= session()->getFlashdata('berhasil') ?></b>
            </div>
          <?php endif; ?>

          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table table-bordered table-striped table-sm align-items-center mb-0 mt-2">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="5px">No.</th>
                    <th class="text-uppercase text-secondary text-xxs text-center font-weight-bolder opacity-7">Nama Produk</th>
                    <th class="text-uppercase text-secondary text-xxs text-center font-weight-bolder opacity-7 ps-2">Harga Beli</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga Jual</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stok</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="55px">Aksi</th>

                  </tr>
                </thead>

                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($tb_produk as $pro) : ?>
                    <tr>
                      <td class="align-middle text-center text-sm">
                        <?= $i++; ?>.
                      </td>
                      <td class="align-middle text-center text-sm">
                        <?= ucwords($pro['nama_produk']); ?>
                      </td>
                      <td class="align-middle text-center text-sm">
                        Rp. <?= $pro['harga_beli']; ?>
                      </td>
                      <td class="align-middle text-center text-sm">
                        Rp. <?= $pro['harga_jual']; ?>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <!--<span class="badge badge-sm bg-gradient-danger">Habis</span>-->
                        <?= $pro['stock']; ?>
                      </td>
                      <td class="text-center">
                        <!-- <a href="javascript:;" class="text-warning font-weight-bold text-xs ps-2" data-toggle="tooltip" data-original-title="Edit user"><i class=" fas fa-solid fa-info text-warning me-0"></i>
                          Details
                        </a> -->
                        &nbsp;&nbsp;&nbsp;
                        <a href="/produk/edit/<?= $pro['ProdukID']; ?>" class="text-primary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user"><i class="fas fa-pencil-alt text-primary me-0" aria-hidden="true"></i>
                          Edit
                        </a>
                        &nbsp;&nbsp;&nbsp;
                        <form action="/produk/<?= $pro['ProdukID']; ?>" method="post" class="d-inline">

                          <input type="hidden" name="_method" value="DELETE">

                          <button type="submit" style="border: none; background-color: Transparent;" onclick="return confirm('Hapus data produk <?= $pro['nama_produk']; ?>?');"><a class="text-danger font-weight-bold text-xs ps-1" data-toggle="tooltip" data-original-title="Edit user"><i class="far fa-trash-alt me-0"></i>
                              Hapus
                            </a></button>
                        </form>
                      </td>
                    </tr>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <?= $pager->links(); ?>
              <!-- <nav aria-label="Page navigation example">
                <ul class="pagination">
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                </ul>
              </nav> -->
            </div>
          </div>
        </div>
      </div>
    </div>