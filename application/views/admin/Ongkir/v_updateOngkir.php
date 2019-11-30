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
        
            <input type="hidden" name="kd_bk_awal" value="<?= $ongkir['kd_bk'] ?>">
			<div class="form-group mt-3">
				<label>Kode Ongkir</label>
				<input type="text" class="form-control" name="kd_bk" id="kd_bk" value="<?= $ongkir['kd_bk'] ?>">
                <small class="text-danger"><?= form_error('kd_bk') ?></small>
            </div>
			
			

			<div class="form-group">
                <label>Kota Tujuan</label>
                <select class="form-control" name="kota" id="kota">
                    
                <?php foreach($kota as $s) : ?>
                    <?php if($s['kd_kota'] == $ongkir['kd_kota']): ?>
                        <option value="<?= $s['kd_kota']; ?>" selected><?= $s['nama_kota']; ?></option>
                    <?php else :?>
                    <option value="<?= $s['kd_kota']; ?>"><?= $s['nama_kota']; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
                </select>
            </div>
			

			<div class="form-group">
                <label>Jasa Pengiriman</label>
                <select class="form-control" name="jasa" id="jasa">
                   
                <?php foreach($pengiriman as $s) : ?>
                    <?php if($s['kd_jp'] == $ongkir['kd_jp']): ?>
                        <option value="<?= $s['kd_jp']; ?>" selected><?= $s['nama_jp']; ?> ~ <?= $s['nama_jasa'] ?></option>
                    <?php else: ?>
                    <option value="<?= $s['kd_jp']; ?>"><?= $s['nama_jp']; ?> ~ <?= $s['nama_jasa'] ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group mt-3">
				<label>Biaya Kirim</label>
				<input type="number" class="form-control" name="biaya_kirim" id="biaya_kirim" min="0" value="<?= $ongkir['biaya_kirim'] ?>">
                <small class="text-danger"><?= form_error('biaya_kirim') ?></small>
            </div>
            
			
			    <button type="submit" name="addJasat" class="btn btn-md btn-primary">Add Jasa</button>
			    <button type="reset" name="reset" class="btn btn-md btn-success">Reset</button>
			</div>

</form>
