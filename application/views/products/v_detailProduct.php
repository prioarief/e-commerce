<!--================Single Product Area =================-->
	<div class="product_image_area mb-5">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-sm-4 mt-5">
					<div class="col-sm">
						<img class="img-detail" src="<?= base_url(); ?>assets/Users/img/product/<?= $product['gambar']; ?>" alt="">
					</div>
				</div>
				<div class="col-sm-5 offset-sm-1">
					<div class="s_product_text">
						<h3><?= $product['nama_brg'] ?></h3>
						<h2>Rp. <?= number_format($product['harga']); ?></h2>
						<ul class="list">
							<li><span>Category</span> : <a class="active" href="#"><?= $product['nama_kategori']; ?></a></li>
							<li>Warna : <?= $product['warna'] ?></li>
							<li>Stok : <?= $product['stok'] ?></li>
							<li>Bahan : <?= $product['bahan'] ?></li>
							<li>Berat : <?= $product['berat'] ?> kg</li>
							<li>Diskon : <?= $product['diskon'] ?> %</li>
							<li>Keyword : <?= $product['keyword'] ?></li>
							<li>Ukuran : <?= $product['ukuran'] ?></li>
							<li>Kategori : <?= $product['nama_kategori']; ?></li>
						</ul>
						
						<div class="card_area d-flex align-items-center mt-3"> 
						<!-- <a data-toggle="modal" data-target="#exampleModal" class="social-info tampilModal" data-id="<?= $product['kd_brg']; ?>" id="data">Add To Cart</a> -->
						<a data-toggle="modal" data-target="#exampleModal" class="social-info btn btn-danger tampilModal" data-id="<?= $product['kd_brg']; ?>" id="data"><span class="ti-bag text-white"> Add to cart</span></a>
						
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--================End Single Product Area =================-->
