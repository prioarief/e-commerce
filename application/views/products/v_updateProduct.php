<div class="col-md-9 ml-5">
        <h4 class="text-center"><b>Update Product</b></h4>
        <form action="" method="post" enctype="multipart/form-data">
        <?php if (validation_errors()) : ?>
            <span><?= validation_errors(); ?></span>
        <?php endif; ?>
        <input type="hidden" name="kd_brg" value="<?= $product['kd_brg']; ?>">
			<div class="form-group mt-5">
				<label>Product</label>
				<input class="form-control" name="nama_product" id="nama_product" value="<?= $product['nama_brg'] ?>">
            </div>
            <input type="hidden" name="fotolama" value="<?= $product['gambar']; ?>">
			<div class="form-group">
				<label>Bahan</label>
				<input type="text" class="form-control" name="bahan" id="bahan" value="<?= $product['bahan'] ?>">
			</div>
			<div class="form-group">
				<label>Warna</label>
				<input type="text" class="form-control" name="warna" id="warna" value="<?= $product['warna'] ?>">
			</div>
			<div class="form-group">
				<label>Ukuran</label>
				<input type="text" class="form-control" name="ukuran" id="ukuran" value="<?= $product['ukuran'] ?>">
			</div>
			<div class="form-group">
				<label>Harga</label>
				<input type="text" class="form-control" name="harga" id="harga" value="<?= $product['harga'] ?>">
			</div>
			<div class="form-group">
				<label>Berat</label>
				<input type="text" class="form-control" name="berat" id="berat" value="<?= $product['berat'] ?>">
			</div>
			<div class="form-group">
				<label>keyword</label>
				<input type="text" class="form-control" name="keyword" id="keyword" value="<?= $product['keyword'] ?>">
			</div>
			<div class="form-group">
				<label>Diskon</label>
				<input type="text" class="form-control" name="diskon" id="diskon" value="<?= $product['diskon'] ?>">
			</div>
			<div class="form-group">
				<label>Stok</label>
				<input type="text" class="form-control" name="stok" id="stok" value="<?= $product['stok'] ?>">
			</div>
			
			<div class="form-group">
                <img src="<?= base_url(); ?>assets/Users/img/product/<?= $product['gambar']; ?>" style="width:100px; height:100px;" alt="" class="mb-4"><br>
				<label>Gambar</label>
				<input type="file" name="gambar" id="gambar">
            </div>
            
            <div class="form-group">
                <label>Selects</label>
                <select class="form-control" name="kategori" id="kategori">
                <?php foreach($categori as $s) : ?>
                    <?php if($s['kd_kategori'] == $product['kd_kategori']): ?>
                        <option value="<?= $s['kd_kategori']; ?>" selected><?= $s['nama_kategori']; ?></option>
                    <?php else :?>
                        <option value="<?= $s['kd_kategori']; ?>"><?= $s['nama_kategori']; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
                </select>
            </div>
			    <button type="submit" name="addProduct" class="btn btn-md btn-primary">Update Product</button>
			</div>

</form>
