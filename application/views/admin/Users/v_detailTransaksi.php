<div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
            <ul>
                <li class="text-center">
                    <h2 class="profil"><?= $user['email'] ?></h2>
                    <span>Member since : <?= date('d F Y', $user['created_at']) ?></span>
                </li>
                <div class="col-sm">
                    <h4 class="text-center mt-3 mb-3">Detail Transaksi</h4>
                    <?php foreach($transaksi as $tr){ ?>
                <li class="list-group-item mb-2 bg-light boxxx">
                    <div class="row">
                        
                        <div class="col-sm-2">
                            <span>Alamat : <?= $tr['id'] ?></span>
                        </div>
                    </div>
                </li>
                    <?php } ?>
                </div>

                
            </ul>
            </div>

            
        </div>
    </div>