<h1 class="text-center">Provinsi Data</h1>
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><a class="text-decoration-none" href="<?= base_url() ?>Provinsi/addProvinsi">Add Provinsi</a></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered-stripped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Kode Provinsi</th>
                      <th>Provinsi</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Kode Provinsi</th>
                      <th>Provinsi</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php foreach($provinsi as $p): ?>
                    <tr>
                      <td><?= $p['kd_prov']; ?></td>
                      <td><?= $p['nama_prov']; ?></td>
                      <td>
                        <a class="btn btn-primary btn-sm" href="<?= base_url() ?>Provinsi/DeleteProvinsi/<?= $p['kd_prov']; ?>" onclick="return confirm('yakin ?');" title="Delete"><i class="fas fa-trash"></i></a>
                
                        <a class="btn btn-danger btn-sm" href="<?= base_url() ?>Provinsi/UpdateProvinsi/<?= $p['kd_prov']; ?>" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>