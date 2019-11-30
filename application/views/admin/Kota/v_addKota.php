<div class="col-md-9 ml-5">
        <h4 class="text-center"><b>Add Kota</b></h4>
        <form action="" method="post" enctype="multipart/form-data">
        <?php if (validation_errors()) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= validation_errors() ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
            
        <?php endif; ?>
        
			<div class="form-group mt-3">
				<label>Kode Kota</label>
				<input type="text" class="form-control" name="kd_kota" id="kd_kota" value="<?= $kode; ?>">
                <?= form_error('kd_kota') ?>
            </div>
			
			<div class="form-group">
				<label>Kota</label>
				<input type="text" class="form-control" name="nama_kota" id="nama_kota">
            </div>

			<div class="form-group">
                <label>Provinsi</label>
                <select class="form-control" name="provinsi" id="provinsi">
                    <option selected>---- Select Provinsi ----</option>
                <?php foreach($prov as $s) : ?>
                    <option value="<?= $s['kd_prov']; ?>"><?= $s['nama_prov']; ?></option>
                <?php endforeach; ?>
                </select>
            </div>
            
			
			    <button type="submit" name="addProduct" class="btn btn-md btn-primary">Add Kota</button>
			    <button type="reset" name="reset" class="btn btn-md btn-success">Reset</button>
			</div>

</form>
