<h1 class="text-center">Users Data</h1>
<div class="card shadow mb-4">
            <div class="card-header py-3">
              
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered-stripped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Created_at</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Created_at</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php foreach($users as $u): ?>
                    <tr>
                      <td><?= $u['username']; ?></td>
                      <td><?= $u['email']; ?></td>
                      <td><?= date('d F Y', $u['created_at']); ?></td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>