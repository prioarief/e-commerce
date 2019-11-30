<div class="col-md-9 ml-5">
        <h4 class="text-center"><b>Add Stok</b></h4>
        <form action="<?= base_url() ?>Products/AksiTambahStok" method="post" enctype="multipart/form-data">
        
        
			
            
            
			<div class="form-group">
                <label>Product</label>
                <select class="form-control" name="product" id="product">
                    <option selected>---- Select Product ----</option>
                <?php foreach($product as $s) : ?>
                    <option value="<?= $s['kd_brg']; ?>"><?= $s['nama_brg']; ?></option>
                <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Jumlah</label>
                <input type="text" class="form-control" name="jumlah" id="jumlah">
            </div>


            <button type="submit" class="btn btn-danger btn-sm">Add Stok</button>
</div>

</form>
