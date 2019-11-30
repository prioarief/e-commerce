<div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
            <ul>
                <form action="<?= base_url() ?>Transaksi " method="post">
                <li class=" text-center bg-light mb-3 "><h2><div class="alert alert-success">Pemesanan Berhasil</div></h2></li>
                <?php foreach($keranjang as $item){
                       $data = $this->Transaksi_model->GetCartById($item);
                        foreach($data as $result){
                        $keranjang = $result['kd_brg'];
                        $produk = $this->Products_model->GetProductById($keranjang);
                        // echo $result['kd_keranjang'] .' jumlahnya '. $result['jumlah'];
                        // echo $acak;
                ?>
                
                <li class="list-group-item order_box mb-2">
                    <div class="row">
                        <div class="col-sm-4">
                            <span><?= $produk['nama_brg']  ?></span>
                            <input type="hidden" name="barang[]" value="<?= $result['kd_keranjang'] ?>">
                        </div>
                        <div class="col-sm-2">
                            <span>Rp. <?= number_format($produk['harga'])  ?></span>
                        </div>
                        <div class="col-sm-2">
                            <span>x</span>
                            <span><?= $result['jumlah']  ?></span>
                        </div>
                        <div class="col-sm-2 offset-1 text-right">
                            <span>Rp. <?= number_format($produk['harga']*$result['jumlah'])  ?></span>
                            <input type="hidden" name="total" value="<?= $produk['harga']*$result['jumlah'] ?>">
                        </div>
                    </div>        
                </li>
                <?php } } ?>

                <li class="list-group-item text-right bg-lighttt mt-3">
                    <div class="col-sm-12">
                        <b>
                            <p class="text-right  mr-1">Total : Rp.  <?= number_format($harga) ?> </p>
                            <p class="text-right  mr-1">Ongkir : Rp.  <?= number_format($ongkir) ?> </p>
                            <hr>
                            <p class="text-right  mr-1">Total Harus Di Bayar : Rp.  <?= number_format($harga + $ongkir) ?> </p>
                            <p class="text-right  mr-1">Metode Pembayaran : <b><?= $pembayaran ?></b>   </p>
                            
                        </b>
                    </div>
                </li>

                <?php 
                    $namaKota = $this->Kota_model->GetKotaById($kota);
                    $namaProvinsi = $this->Provinsi_model->GetProvinsiById($provinsi);
                ?>

                <li class="list-group-item mt-4">
                    <p>Penerima : <?= $penerima ?></p>
                    <p>No Telp : <?= $telp ?></p>
                    <p>Alamat : <?= $alamat ?></p>
                    <p>Kode Pos : <?= $kode ?></p>
                    <p>Kota : <?= $namaKota['nama_kota'] ?></p>
                    <p>Provinsi : <?= $namaProvinsi['nama_prov'] ?></p>
                    <p class="">No Resi Pengiriman : <b><?= $resi ?></b></p>
                    <div class="col-sm">
                        
                    </div>
                </li>

                <!-- <li class="list-group-iten">
                    <div class="col-sm-12">
                        <p class="text-right  mr-1">No Resi Pengiriman : <b><?= $acak ?></b></p>
                    </div>
                </li> -->
                
                <li class="list-group-item ">
                    <div class="row">
                    
                        <div class="col-sm-12 text-right">
                            <a href="<?= base_url() ?>" class="btn btn-danger">Lanjutkan</a>
                        </div>
                    </div>
                </li>
                </form>
            </ul>
            </div>

            
        </div>
    </div>