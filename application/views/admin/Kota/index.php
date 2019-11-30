<h1 class="text-center">Provinsi Data</h1>
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <a class=" btn btn-link text-decoration-none" href="<?= base_url() ?>Kota/addKota">Add Kota</a>
              <a class=" btn btn-link text-decoration-none" href="<?= base_url() ?>Provinsi/addProvinsi">Add Provinsi</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered-stripped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Kode Kota</th>
                      <th>Kota</th>
                      <th>Provinsi</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Kode Kota</th>
                      <th>Kota</th>
                      <th>Provinsi</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php foreach($kota as $p): ?>
                    <tr>
                      <td><?= $p['kd_kota']; ?></td>
                      <td><?= $p['nama_kota']; ?></td>
                      <td><?= $p['nama_prov']; ?></td>
                      <td>
                        <a class="btn btn-primary btn-sm" href="<?= base_url() ?>Kota/DeleteKota/<?= $p['kd_kota']; ?>" onclick="return confirm('yakin ?');" title="Delete"><i class="fas fa-trash"></i></a>
                
                        <a class="btn btn-danger btn-sm" href="<?= base_url() ?>Kota/UpdateKota/<?= $p['kd_kota']; ?>" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>