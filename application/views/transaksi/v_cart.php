<div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
            <ul>
                <li class=" text-center bg-light "><h2>Keranjang Belanja</h2></li>
                <?php foreach ($cart as $c): ?>
                <li class="list-group-item mb-2 bg-light boxxx">
                <form action="" method="post"> 
                    <div class="row">
                        <div class="col-sm-2">
                            <input type="checkbox" data-price="<?= $c['jumlah'] * $c['harga'] ?>" name="item[]" id="" class="item form-group mr-2" value="<?= $c['kd_keranjang'] ?>">
                            <img class="img-cart gambarCart" src="<?= base_url() ?>assets/Users/img/product/<?= $c['gambar'] ?>" alt="">
                        </div>
                        <div class="col-sm-3">
                            <span><?= $c['nama_brg'] ?></span>
                            <b><span class="d-block" >Rp. <?= number_format($c['harga']) ?></span></b>
                            
                        </div>
                        <div class="col-sm-2 mt-3">
                            <span>Jumlah : <?= $c['jumlah'] ?></span>
                            <!-- <input type="hidden" name="jumlah[]" value="<?= $c['jumlah'] ?>"> -->
                        </div>
                        <div class="col-sm-3 mt-3">
                            
                            <span id="harga" class="harga">Sub Total : Rp.<?= number_format($c['jumlah'] * $c['harga']) ?></span>
                        </div>
                        <div class="col-sm-2">
                            <a class="btn btn-primary btn-sm mb-1 mt-3" href="<?= base_url() ?>Transaksi/DeleteCart/<?= $c['kd_keranjang'] ?>" onclick="return confirm('yakin ?');" title="Delete"><i class="fa fa-trash"></i></a>
                            <a class="btn btn-warning btn-sm mb-1 mt-3 updateCart" data-toggle="modal" data-target="#updateCart" data-id="<?= $c['kd_keranjang']; ?>" id="data" title="Update"><i class="fa fa-pencil"></i></a>
                        </div>
                        <?php $sub = $c['jumlah'] * $c['harga']; ?>
                    <!-- <input type="hidden" name="sub" id="total" value="<?= $sub ?>"> -->
                    </div>
                </li>
                <?php endforeach; ?>
                <li class="list-group-item text-right">
                    <div class="col-sm-12">
                        <b><span class="text-danger" id="totalHarga"></span></b>
                        <input type="hidden" name="harga" id="total" value="">
                    </div>
                </li>
                <li class=" text-center bg-light mt-2 "><h3>Alamat</h3></li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-sm-3">
                            <input type="text" name="penerima" id="" class="form-control mb-2" placeholder="Penerima">
                            <span class="text-danger"><?= form_error('penerima') ?></span>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="telp" id="" class="form-control mb-2" placeholder="No Telepon">
                            <span class="text-danger"><?= form_error('telp') ?></span>
                        </div>
                        <div class="col-sm-3">
                            <input type="number" name="kode" id="" class="form-control mb-2" placeholder="Kode Pos" min="1">
                             <span class="text-danger"><?= form_error('kode') ?></span>
                        </div>
                        <div class="col-sm-3">
                            <textarea name="alamat" id="" cols="30" rows="4" placeholder="Masukan alamat, kelurahan,  kecamatan, kota dan kode pos"></textarea>
                            <span class="text-danger"><?= form_error('alamat') ?></span>
                            <span class="text-danger">Shipped from Jakarta</span>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group mt-2">
                                <select class="form-control" name="provinsi" id="provinsi">
                                <option selected>---- Select Provinsi ----</option>
                                    <?php foreach($provinsi as $s) : ?>
                                    <option value="<?= $s['kd_prov']; ?>"><?= $s['nama_prov']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group mt-2">
                                <select class="form-control kota" name="kota" id="kota">
                                            
                                </select>
                            </div>            
                        </div>
                        <div class="col-sm">
                            <div class="form-group mt-2">
                                <select class="form-control ongkir" name="ongkir" id="ongkir">
                                            
                                </select>
                            </div>
                        </div>
                        <div class="col-sm">
                            <span class="mt-2">Metode Pembayaran : <br> <b>Cash On Delivery</b></span>    
                            <input type="hidden" value="<?= $acak ?>" name="resi">
                        </div>
                    </div>
                </li>
                <li class="list-group-item ">
                    <div class="row">
                        <div class="col-sm-12 text-right">
                            <button type="submit" class="btn btn-primary"  id="checkout">Checkout</button>
                        </div>
                    </div>
                </li>
                </form>
            </ul>
            </div>

            
        </div>
    </div>



    <!-- <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" name="penerima" id="" class="form-control mb-2" placeholder="Penerima">
                                    <span class="text-danger"><?= form_error('penerima') ?></span>
                                    <input type="text" name="telp" id="" class="form-control mb-2" placeholder="No Telepon">
                                    <span class="text-danger"><?= form_error('telp') ?></span>
                                    <input type="number" name="kode" id="" class="form-control mb-2" placeholder="Kode Pos" min="1">
                                    <span class="text-danger"><?= form_error('kode') ?></span>
                                    <input type="text" name="alamat" id="" class="form-control mb-2" placeholder="Alamat Lengkap">
                                    <span class="text-danger"><?= form_error('alamat') ?></span>
                                    
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <select class="form-control" name="provinsi" id="provinsi">
                                            <option selected>---- Select Provinsi ----</option>
                                        <?php foreach($provinsi as $s) : ?>
                                            <option value="<?= $s['kd_prov']; ?>"><?= $s['nama_prov']; ?></option>
                                        <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group mt-5">
                                        <select class="form-control kota" name="kota" id="kota">
                                            
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <p>Pengiriman</p>
                                        <select class="form-control ongkir" name="ongkir" id="ongkir">
                                            
                                        </select>
                                    </div>
                                    
                                    
                                    
                                </div>
                            </div>
                    </div> -->

