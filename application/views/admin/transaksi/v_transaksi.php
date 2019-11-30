<h1 class="text-center">Users Data</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered-stripped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tanggal Transaksi</th>
                        <th>Konsumen</th>
                        <th>Biaya Kirim</th>
                        <th>Resi</th>
                        <th>Status</th>
                        <th>Sub Total</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Tanggal Transaksi</th>
                        <th>Konsumen</th>
                        <th>Biaya Kirim</th>
                        <th>Resi</th>
                        <th>Status</th>
                        <th>Sub Total</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($transaksi as $u) : ?>
                        <?php $data = $this->Admin_model->GetUsersById($u['kd_konsumen']); ?>
                        <tr>
                            <td><?= date('d F Y', $u['tgl_trans']); ?></td>
                            <td><?= $data['email']; ?></td>
                            <td><?= number_format($u['biaya_kirim']); ?></td>
                            <td><?= $u['resi']; ?></td>
                            <td><?= $u['status']; ?></td>
                            <td><?= $u['sub_total']; ?></td>
                            <td><?= $u['alamat']; ?></td>
                            <td>
                                <a href="" class="btn btn-primary">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>