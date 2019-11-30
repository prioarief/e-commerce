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
				<label>Kode Jenis</label>
				<input type="text" class="form-control" name="kd_jp" id="kd_jp" value="<?= $kode; ?>">
                <small class="text-danger"><?= form_error('kd_jp') ?></small>
            </div>
			
			<div class="form-group">
				<label>Jenis Pengiriman</label>
				<input type="text" class="form-control" name="jenis" id="jenis" autofocus>
                <small class="text-danger"><?= form_error('jasa') ?></small>
            </div>

			<div class="form-group">
                <label>Jasa Pengiriman</label>
                <select class="form-control" name="jasa" id="jasa">
                    <option selected>-- Jasa Pengiriman --</option>
                <?php foreach($jasa as $s) : ?>
                    <option value="<?= $s['kd_jasa']; ?>"><?= $s['nama_jasa']; ?></option>
                <?php endforeach; ?>
                </select>
            </div>
            
			
			    <button type="submit" name="addJasat" class="btn btn-md btn-primary">Add Jasa</button>
			    <button type="reset" name="reset" class="btn btn-md btn-success">Reset</button>
			</div>

</form>
