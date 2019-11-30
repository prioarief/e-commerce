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
        
            <input type="hidden" name="kd_jasa_awal" value="<?= $jasa['kd_jasa'] ?>" >
			<div class="form-group mt-3">
				<label>Kode Jasa</label>
				<input type="text" class="form-control" name="kd_jasa" id="kd_jasa" value="<?= $jasa['kd_jasa'] ?>">
                <?= form_error('kd_jasa') ?>
            </div>
			
			<div class="form-group">
				<label>Jasa Pengiriman</label>
				<input type="text" class="form-control" name="jasa" id="jasa" value="<?= $jasa['nama_jasa'] ?>">
                <?= form_error('jasa') ?>
            </div>

			<!-- <div class="form-group">
                <label>Provinsi</label>
                <select class="form-control" name="provinsi" id="provinsi">
                    <option selected>---- Select Provinsi ----</option>
                <?php foreach($prov as $s) : ?>
                    <option value="<?= $s['kd_prov']; ?>"><?= $s['nama_prov']; ?></option>
                <?php endforeach; ?>
                </select>
            </div> -->
            
			
			    <button type="submit" name="addJasat" class="btn btn-md btn-primary">Add Jasa</button>
			    <button type="reset" name="reset" class="btn btn-md btn-success">Reset</button>
			</div>

</form>