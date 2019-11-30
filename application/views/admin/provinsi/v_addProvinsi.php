<div class="col-md-9 ml-5">
        <h4 class="text-center"><b>Add Provinsi</b></h4>
        <form action="" method="post" enctype="multipart/form-data">
        <?php if (validation_errors()) : ?>
            <span><?= validation_errors(); ?></span>
        <?php endif; ?>
        
			<div class="form-group mt-3">
				<label>Kode Provinsi</label>
				<input type="text" class="form-control" name="kd_prov" id="kd_prov" value="<?= $kode; ?>">
            </div>
			<!-- <div class="form-group mt-3">
				<label>Kode Product</label>
				<input type="text" class="form-control" name="kd_brg" id="kd_brg" value="Product-<?= $kodeBarang ?>" readonly >
            </div> -->
			<div class="form-group">
				<label>Provinsi</label>
				<input type="text" class="form-control" name="nama_provinsi" id="nama_provinsi">
            </div>
            
			
			    <button type="submit" name="addProduct" class="btn btn-md btn-primary">Add Provinsi</button>
			    <button type="reset" name="reset" class="btn btn-md btn-success">Reset</button>
			</div>

</form>
