<h1 class="text-center">Products Data</h1>
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">
                <a href="<?= base_url() ?>products/addProducts" class="text-decoration-none">Add Products</a> |
                <a href="<?= base_url() ?>products/TambahStok" class="text-decoration-none">Add Stok</a>
              </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered-stripped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nama barang</th>
                      <th>Kategori</th>
                      <th>Gambar</th>
                      <th>Harga</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nama barang</th>
                      <th>Kategori</th>
                      <th>Gambar</th>
                      <th>Harga</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php foreach($products as $p): ?>
                    <tr>
                      <td><?= $p['nama_brg']; ?></td>
                      <td><?= $p['nama_kategori']; ?></td>
                      <td><img src="<?= base_url(); ?>assets/users/img/product/<?= $p['gambar']; ?>" style="width : 90px; height:90px;" alt=""></td>
                      <td>Rp. <?= number_format($p['harga']); ?></td>
                      <td>
                        <a class="btn btn-primary btn-sm" href="<?= base_url() ?>Products/DeleteProduct/<?= $p['kd_brg']; ?>/<?= $p['gambar']; ?>/" onclick="return confirm('yakin ?');" title="Delete"><i class="fas fa-trash"></i></a>
                        <a class="btn btn-success btn-sm" href="<?= base_url() ?>Admin/detailProduct/<?= $p['kd_brg']; ?>" title="Detail"><i class="fas fa-pen-alt "></i></a>
                        <a class="btn btn-danger btn-sm" href="<?= base_url() ?>Products/UpdateProduct/<?= $p['kd_brg']; ?>" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>