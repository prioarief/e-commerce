<h1 class="text-center mb-4">Pengiriman</h1>
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <a class=" btn btn-link text-decoration-none" href="<?= base_url() ?>Pengiriman/JasaPengiriman">Jasa Pengiriman</a>
              <a class=" btn btn-link text-decoration-none" href="<?= base_url() ?>Pengiriman/AddJenisPengiriman">Add Jenis Pengiriman</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered-stripped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Kode Jenis Pengiriman</th>
                      <th>Jasa Pengiriman</th>
                      <th>Jenis Pengiriman</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Jenis Pengiriman</th>
                      <th>Kode Jasa Pengiriman</th>
                      <th>Jenis Pengiriman</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php foreach($pengiriman as $p): ?>
                    <tr>
                      <td><?= $p['kd_jp']; ?></td>
                      <td><?= $p['nama_jasa']; ?></td>
                      <td><?= $p['nama_jp']; ?></td>
                      <td>
                        <a class="btn btn-primary btn-sm" href="<?= base_url() ?>Pengiriman/HapusJenisPengiriman/<?= $p['kd_jp'] ?>" onclick="return confirm('yakin ?');" title="Delete"><i class="fas fa-trash"></i></a>
                
                        <a class="btn btn-danger btn-sm" href="<?= base_url() ?>Pengiriman/EditJenisPengiriman/<?= $p['kd_jp'] ?>" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>