<div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
            <ul>
                <li class="text-center">
                    <h2 class="profil"><?= $user['email'] ?></h2>
                    <span>Member since : <?= date('d F Y', $user['created_at']) ?></span>
                </li>
                <li class="mb-2 mt-4">
                    <a href="<?= base_url() ?>User/RiwayatTransaksi" >Riwayat Transaksi</a>
                </li>
                <div class="col-sm">
                    <h4 class="text-center mt-3 mb-3">Transaksi Yang Sedang Di Proses</h4>
                    <?php foreach($transaksi as $tr){ ?>
                <li class="list-group-item mb-2 bg-light boxxx">
                    <div class="row">
                        <div class="col-sm-2">
                            <span>Tgl Transaksi : <?= date('d F Y', $tr['tgl_trans']) ?></span>
                        </div>
                        <div class="col-sm-2">
                            <span>Alamat : <?= $tr['alamat'] ?></span>
                        </div>
                        <div class="col-sm-2">
                            <span>Resi :  <?= $tr['resi'] ?></span>
                        </div>
                        <div class="col-sm-2">
                            <span>Status : <?= $tr['status'] ?></span>
                        </div>
                        <div class="col-sm-2">
                            <span>Total : <?= number_format($tr['sub_total']) ?></span>
                        </div>
                        <div class="col-sm-2">
                            <a class="btn btn-success btn-sm mb-1 float-right ml-2" href="<?= base_url() ?>User/Konfirmasi/<?= $tr['kd_trans'] ?>" title="Konfirmasi Pesanan"><span class="lnr lnr-checkmark-circle"></span></a>
                            <a class="btn btn-danger btn-sm mb-1 float-right " href="<?= base_url() ?>User/DetailTransaksi/<?= $tr['kd_trans'] ?>" title="Detail"><span class="lnr lnr-pencil"></span></a>
                        </div>
                    </div>
                </li>
                    <?php } ?>
                </div>

                
            </ul>
            </div>

            
        </div>
    </div>