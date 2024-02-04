<?= $this->extend('templates_admin/main'); ?>

<?= $this->section('content'); ?>


<?= $this->include('templates_admin/header') ?>


<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-format-list-numbered"></i>
        </span> Data Massage
      </h3>
      <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <span><a href="<?= base_url('dashboard'); ?>" style='text-decoration : none;'>Dashboard</a></span>/Data Massage <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
          </li>
        </ul>
      </nav>
    </div>
    <?php if (session()->has('validation')) : ?>
      <div class="alert alert-danger">
        <?= session('validation')->listErrors() ?>
      </div>
    <?php endif; ?>
    <div class="row">
      <div class="col-12 grid-margin">
        <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
          <i class="fas fa-plus"></i> Tambah
        </button>
        <div class="card">

          <div class="card-body">
            <!-- Button trigger modal -->

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form action="<?= base_url('massage/create') ?>" method="post">
                      <div class="form-group">
                        <label for="jenis_massage">Jenis Massage:</label>
                        <input type="text" class="form-control" id="jenis_massage" name="jenis_massage" required>
                      </div>
                      <div class="form-group">
                        <label for="harga">Harga:</label>
                        <input type="number" class="form-control" id="harga" name="harga" required>
                      </div>

                      <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                  </div>

                </div>
              </div>
            </div>

            <div class="table-responsive">

              <table class="table">
                <thead>

                  <tr>
                    <th> No </th>
                    <th> Jenis Massage </th>
                    <th> Harga </th>
                    <th> Aksi </th>
                  </tr>
                </thead>

                <tbody>
                  <?php foreach ($massage as $index => $m) : ?>
                    <tr>
                      <td> <?= $index + 1; ?> </td>

                      <td> <?= $m['jenis_massage']; ?> </td>

                      <td> <?= $m['harga']; ?> </td>

                      <td>
                        <a href="<?= base_url('massage/show/' . $m['id']); ?>" class="btn btn-primary btn-sm">Edit</a>
                        <a href="<?= base_url('massage/delete/' . $m['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <?= $this->endSection() ?>