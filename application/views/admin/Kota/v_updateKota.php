<div class="col-md-9 ml-5">
        <h4 class="text-center"><b>Update Kota</b></h4>
        <form action="" method="post" enctype="multipart/form-data">
        <?php if (validation_errors()) : ?>
            <span><?= validation_errors(); ?></span>
        <?php endif; ?>
        
			<div class="form-group mt-3">
				<label>Kode Kota</label>
				<input type="text" class="form-control" name="kd_kota" id="kd_kota" value="<?= $kota['kd_kota'] ?>">
				<input type="hidden" class="form-control" name="kd_kota_awal" id="kd_kota" value="<?= $kota['kd_kota'] ?>">
            </div>
			<div class="form-group">
				<label>Kota</label>
				<input type="text" class="form-control" name="nama_kota" id="nama_kota" value="<?= $kota['nama_kota'] ?>">
            </div>

			<div class="form-group">
                <label>Provinsi</label>
                <select class="form-control" name="provinsi" id="provinsi">
                <?php foreach($prov as $s) : ?>
                    <?php if($s['kd_prov'] == $kota['kd_prov']): ?>
                        <option value="<?= $s['kd_prov']; ?>" selected><?= $s['nama_prov']; ?></option>
                    <?php else :?>
                        <option value="<?= $s['kd_prov']; ?>"><?= $s['nama_prov']; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
                </select>
            </div>
            
			
			    <button type="submit" class="btn btn-md btn-primary">Update kota</button>
			    <button type="reset" name="reset" class="btn btn-md btn-success">Reset</button>
			</div>

</form>
