<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  <a href="<?= base_url() ?>#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<!-- Content Row -->
<div class="row">

  <!-- Earnings (Monthly) Card Example -->
  <a href="<?= base_url() ?>Admin/Products" class="text-decoration-none">
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Product</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $countP; ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </a>
    </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <a href="<?= base_url() ?>Category" class="text-decoration-none">
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Category</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $countC; ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-tags fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </a>
    </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <a href="<?= base_url() ?>Category" class="text-decoration-none">
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Pengiriman</div>
            <!-- <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $countC; ?></div> -->
          </div>
          <div class="col-auto">
            <i class="fas fa-truck fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </a>
    </div>
  </div>


  <!-- Pending Requests Card Example -->
  <a href="<?= base_url() ?>Admin/Users" class="text-decoration-none">
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Users</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $countUser; ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-users fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
    </a>
  </div>
</div>
