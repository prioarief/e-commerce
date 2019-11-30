<h1 class="text-center">Category Data</h1>
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><a class="text-decoration-none" href="<?= base_url() ?>category/addCategory">Add Category</a></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered-stripped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Kode Kategori</th>
                      <th>Kategori</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nama barang</th>
                      <th>Kategori</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php foreach($categori as $c): ?>
                    <tr>
                      <td><?= $c['kd_kategori']; ?></td>
                      <td><?= $c['nama_kategori']; ?></td>
                      <td>
                        <a class="btn btn-primary btn-sm" href="<?= base_url() ?>Category/DeleteCategory/<?= $c['kd_kategori']; ?>" onclick="return confirm('yakin ?');" title="Delete"><i class="fas fa-trash"></i></a>
                    
                        <a class="btn btn-success btn-sm" href="<?= base_url() ?>Category/UpdateCategory/<?= $c['kd_kategori']; ?>" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>