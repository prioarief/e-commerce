<div class="col-md-9 ml-5">
        <h4 class="text-center"><b>Update Provinsi</b></h4>
        <form action="" method="post" enctype="multipart/form-data">
        <?php if (validation_errors()) : ?>
            <span><?= validation_errors(); ?></span>
        <?php endif; ?>
        
			<div class="form-group mt-3">
				<label>Kode Provinsi</label>
				<input type="text" class="form-control" name="kd_prov" id="kd_prov" value="<?= $prov['kd_prov'] ?>">
				<input type="hidden" class="form-control" name="kd_prov_awal" id="kd_prov" value="<?= $prov['kd_prov'] ?>">
            </div>
			<div class="form-group">
				<label>Provinsi</label>
				<input type="text" class="form-control" name="nama_provinsi" id="nama_provinsi" value="<?= $prov['nama_prov'] ?>">
            </div>
            
			
			    <button type="submit" class="btn btn-md btn-primary">Update Provinsi</button>
			    <button type="reset" name="reset" class="btn btn-md btn-success">Reset</button>
			</div>

</form>
