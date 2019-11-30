<div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm-8 container">
            <ul>
                <li class="text-center">
                    <h2 class="profil"><?= $user['email'] ?></h2>
                    <span>Member since : <?= date('d F Y', $user['created_at']) ?></span>
                </li>
                <li class="mb-2 mt-4">
                    <a href="" >Riwayat Transaksi</a>
                </li>
                <div class="col-sm">
                    <h4 class="text-center mt-3 mb-3">Detail Transaksi</h4>
                    <?php foreach($transaksi as $tr){ ?>
                        <?php $data = $this->Products_model->GetProductById($tr['kd_brg']); ?>
                <li class="list-group-item mb-2 bg-light boxxx">
                    <div class="row">
                        
                        <div class="col-sm text-center">
                            <span><?= $data['nama_brg'] . ' x '. $tr['jumlah'] ?></span>
                        </div>
                    </div>
                </li>
                    <?php } ?>
                </div>

                
            </ul>
            </div>

            
        </div>
    </div>