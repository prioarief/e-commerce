<h1 class="text-center mb-4">Pengiriman</h1>
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <a class=" btn btn-link text-decoration-none" href="<?= base_url() ?>Pengiriman/JenisPengiriman">Jenis Pengiriman</a>
              <a class=" btn btn-link text-decoration-none" href="<?= base_url() ?>Pengiriman/AddJasaPengiriman">Add Jasa Pengiriman</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered-stripped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Kode Jasa Pengiriman</th>
                      <th>Jasa Pengiriman</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Jasa Pengiriman</th>
                      <th>Aksi</th>
                      <th>Jenis Pengiriman</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php foreach($pengiriman as $p): ?>
                    <tr>
                      <td><?= $p['kd_jasa']; ?></td>
                      <td><?= $p['nama_jasa']; ?></td>
                      <td>
                        <a class="btn btn-primary btn-sm" href="<?= base_url() ?>Pengiriman/HapusJasaPengiriman/<?= $p['kd_jasa'] ?>" onclick="return confirm('yakin ?');" title="Delete"><i class="fas fa-trash"></i></a>
                
                        <a class="btn btn-danger btn-sm" href="<?= base_url() ?>Pengiriman/EditJasaPengiriman/<?= $p['kd_jasa'] ?>" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>