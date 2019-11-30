<h1 class="text-center mb-4">Pengiriman</h1>
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <a class=" btn btn-link text-decoration-none" href="<?= base_url() ?>Ongkir/AddOngkir">Add Ongkir</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered-stripped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Kode Ongkir</th>
                      <th>Jasa Pengiriman</th>
                      <th>Jenis Pengiriman</th>
                      <th>Kota Tujuan</th>
                      <th>Biaya Kirim</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Kode Ongkir</th>
                      <th>Jasa Pengiriman</th>
                      <th>Jenis Pengiriman</th>
                      <th>Kota Tujuan</th>
                      <th>Biaya Kirim</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php foreach($ongkir as $p): ?>
                    <tr>
                      <td><?= $p['kd_bk']; ?></td>
                      <td><?= $p['nama_jasa']; ?></td>
                      <td><?= $p['nama_jp']; ?></td>
                      <td><?= $p['nama_kota']; ?></td>
                      <td>Rp. <?= number_format($p['biaya_kirim']); ?></td>
                      <td>
                        <a class="btn btn-primary btn-sm" href="<?= base_url() ?>Ongkir/HapusOngkir/<?= $p['kd_bk'] ?>" onclick="return confirm('yakin ?');" title="Delete"><i class="fas fa-trash"></i></a>
                
                        <a class="btn btn-danger btn-sm" href="<?= base_url() ?>Ongkir/EditOngkir/<?= $p['kd_bk'] ?>" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>