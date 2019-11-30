<div class="col-md-9 ml-5">
        <h4 class="text-center"><b>Update Category</b></h4>
        <form action="" method="post">
        <?php if (validation_errors()) : ?>
            <span><?= validation_errors(); ?></span>
        <?php endif; ?>
        
			<div class="form-group mt-3">
				<label class="text-dark">Kode Category</label>
				<input type="text" class="form-control" name="kd_category" id="kd_category" value="<?= $categori['kd_kategori'] ?>" >
            </div>
			<div class="form-group mt-5">
				<label class="text-dark">Category Name</label>
				<input type="text" class="form-control" name="category_name" id="category_name" value="<?= $categori['nama_kategori'] ?>">
            </div>
            
			    <button type="submit" name="addProduct" class="btn btn-md btn-primary">Add Product</button>
			    <button type="reset" name="reset" class="btn btn-md btn-success">Reset</button>
			</div>

</form>
