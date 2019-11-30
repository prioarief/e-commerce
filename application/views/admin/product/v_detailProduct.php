<!--================Single Product Area =================-->
	<div class="product_image_area mb-5">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-6">
					<div class="s_Product_carousel">

            <div class="single-prd-item">
							<img class="img-fluid-detail mb-5" style="width : 450px; height : 450px;" src="<?= base_url(); ?>assets/Users/img/product/<?= $product['gambar']; ?>" alt="">
						</div>
					</div>
				</div>
				<div class="col-lg-5 offset-lg-1">
				
					<ul class="list-group">
						<li class="list-group-item disabled text-center" aria-disabled="true"><b>Detail Product</b></li>
						<li class="list-group-item">Kode Barang : <?= $product['kd_brg'] ?></li>
						<li class="list-group-item">Nama Barang : <?= $product['nama_brg'] ?></li>
						<li class="list-group-item">Harga : Rp. <?= number_format($product['harga']); ?></li>
						<li class="list-group-item">Bahan : <?= $product['bahan'] ?></li>
						<li class="list-group-item">Warna : <?= $product['warna'] ?></li>
						<li class="list-group-item">Stok : <?= $product['stok'] ?></li>
						<li class="list-group-item">Berat : <?= $product['berat'] ?> kg</li>
						<li class="list-group-item">Diskon : <?= $product['diskon'] ?> %</li>
						<li class="list-group-item">Keyword : <?= $product['keyword'] ?></li>
						<li class="list-group-item">Ukuran : <?= $product['ukuran'] ?></li>
						<li class="list-group-item">Kategori : <?= $product['nama_kategori']; ?></li>
						<li class="list-group-item">
							<a href="<?= base_url() ?>Admin/Products" class="btn btn-primary link">Back</a>
							<a href="<?= base_url() ?>/Products/UpdateProduct/<?= $product['kd_brg']; ?>" class="btn btn-danger">Update</a>
						</li>

						
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!--================End Single Product Area =================-->
