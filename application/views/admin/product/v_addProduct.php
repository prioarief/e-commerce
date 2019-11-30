<div class="col-md-9 ml-5">
        <h4 class="text-center"><b>Add Product</b></h4>
        <form action="" method="post" enctype="multipart/form-data">
        <?php if (validation_errors()) : ?>
            <span><?= validation_errors(); ?></span>
        <?php endif; ?>
        
			<div class="form-group mt-3">
				<label>Kode Product</label>
				<input type="text" class="form-control" name="kd_brg" id="kd_brg" value="<?= $kode ?>" readonly >
            </div>
			<div class="form-group mt-5">
				<label>Product</label>
				<input type="text" class="form-control" name="nama_product" id="nama_product" autofocus>
            </div>
            
			<div class="form-group">
				<label>Bahan</label>
				<input type="text" class="form-control" name="bahan" id="bahan">
			</div>
			<div class="form-group">
				<label>Warna</label>
				<input type="text" class="form-control" name="warna" id="warna">
			</div>
			<div class="form-group">
				<label>Ukuran</label>
				<input type="text" class="form-control" name="ukuran" id="ukuran">
			</div>
			<div class="form-group">
				<label>Harga</label>
				<input type="text" class="form-control" name="harga" id="harga">
			</div>
			<div class="form-group">
				<label>Berat</label>
				<input type="text" class="form-control" name="berat" id="berat">
			</div>
			<div class="form-group">
				<label>keyword</label>
				<input type="text" class="form-control" name="keyword" id="keyword">
			</div>
			<div class="form-group">
				<label>Diskon</label>
				<input type="text" class="form-control" name="diskon" id="diskon">
			</div>
			<div class="form-group">
				<label>Stok</label>
				<input type="text" class="form-control" name="stok" id="stok">
			</div>
			
			<div class="form-group">
				<label class="d-block">Gambar</label>
				<input type="file" name="gambar" id="gambar">
            </div>
            
            <div class="form-group">
                <label>Selects</label>
                <select class="form-control" name="kategori" id="kategori">
                <?php foreach($categori as $s) : ?>
                    <option value="<?= $s['kd_kategori']; ?>"><?= $s['nama_kategori']; ?></option>
                <?php endforeach; ?>
                </select>
            </div>
			    <button type="submit" name="addProduct" class="btn btn-md btn-primary mb-5">Add Product</button>
			    <button type="reset" name="reset" class="btn btn-md btn-success mb-5">Reset</button>
			</div>

</form>
