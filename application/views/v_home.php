


	<div class="containertext-center">
		<form action="<?= base_url() ?>Products/Search" method="post">
			<div class="col-sm-12 mt-5">
				<div class="row mt-3 justify-content-center kontent">
                <div class="col-sm-8">
                    <div class="input-group mb-3">
						<input type="text" class="form-control search" placeholder="Search here ..." id="search-input" name="keyword">
						<button type="submit" class="btn btn-danger btn-md"><i class="fa fa-search"></i></i></button>
                    </div>
					<span class="text-danger"><?= form_error('keyword') ?></span>
                    <!-- <div class="input-group mb-3 ">
						<select class="form-control search" name="category" id="category">
								<option class="" selected>-- Select Category --</option>
							<?php foreach($category as $s) : ?>
								<option value="<?= $s['kd_kategori']; ?>"><?= $s['nama_kategori']; ?></option>
							<?php endforeach; ?>
						</select>
                    </div> -->
                </div>
            </div>
			</div>
		</form>
	</div>
	
	
	
	<section class="owl-carousel active">
		
		<div class="single-product mt-5">
			<div class="container">
						<?php 
						if (empty($products)) {?>
							<div class="alert alert-danger alert-sm text-center" role="alert">Barang Yang Di Cari Tidak Di Temukan</div>
						<?php }
					
					?>

				<div class="row">

					
					<?php foreach($products as $cat): ?>
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<img class="img-fluid" src="<?= base_url(); ?>assets/Users/img/product/<?= $cat['gambar']; ?>" alt="">
							<div class="product-details">
								<h6><?= $cat['nama_brg']; ?></h6>
								<div class="price">
									<h6>Rp.  <?= number_format($cat['harga']); ?></h6>
									
								</div>
								<div class="prd-bottom">

									<a data-toggle="modal" data-target="#exampleModal" class="social-info tampilModal" data-id="<?= $cat['kd_brg']; ?>" id="data">
										<span class="ti-bag"></span>
										<p class="hover-text mr-5">Cart</p>
									</a>
									
									<a href="https://api.whatsapp.com/send?phone=6289637533496&text=Haloo,%20<?= $cat['nama_brg']; ?> %20Ready?" class="social-info">
										<span class="lnr lnr-phone"></span>
										<p class="hover-text">Chat CS</p>
									</a>
									<a href="Products/DetailProduct/<?= $cat['kd_brg']; ?>" class="social-info">
										<span class="lnr lnr-move"></span>
										<p class="hover-text">view more</p>
									</a>
								</div>
							</div>
						</div>
					</div>
					
					

					
					<?php endforeach; ?>



				</div>
			</div>
		</div>

	</section>

	
	
<section class="features-area section_gap">
		<div class="container">
			<div class="row features-inner">
				
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="<?= base_url(); ?>assets/Users/img/features/f-icon1.png" alt="">
						</div>
						<h6>Free Delivery</h6>
						<small>TAPI BOONG</small>
					</div>
				</div>
				
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="<?= base_url(); ?>assets/Users/img/features/f-icon2.png" alt="">
						</div>
						<h6>Return Policy</h6>
						
						
					</div>
				</div>
				
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="<?= base_url(); ?>assets/Users/img/features/f-icon3.png" alt="">
						</div>
						<h6>24/7 Support</h6>
						
					</div>
				</div>
				
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="<?= base_url(); ?>assets/Users/img/features/f-icon4.png" alt="">
						</div>
						<h6>Secure Payment</h6>
						
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add To Cart</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
		<div class="col-md-12 form-group">
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Input Quantity...">
		</div>
            
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->
	

	 <!-- <div class="container mt-5">
		<div class="row">
			<div class="col-xl-3 col-lg-4 col-md-5">
				<div class="sidebar-categories">
					<div class="head">Browse Categories</div>
					<ul class="main-categories">
						<?php foreach($category as $c)  :?>
							<li class="main-nav-list"><a href="#"><?= $c['nama_kategori']; ?></a></li>
						<?php endforeach; ?>


					</ul>
				</div>

			</div>
			<div class="col-xl-9 col-lg-8 col-md-7"> -->
				<!-- Start Filter Bar -->
				<!-- <div class="filter-bar d-flex flex-wrap align-items-center">
					<form class="form-inline" method="post">
						<div class="row">
							<div class="col mt-3">
								<input type="text" class="form-control" placeholder="Search Here...">
							</div>
							<div class="col mt-3">
								<button class="btn btn-dark" type="submit">
									<i class="fa fa-search text-white"></i>
								</button>
							</div>
						</div>
					</form>

					
				</div> -->
				<!-- End Filter Bar -->
				<!-- Start Best Seller -->
				<!-- <section class="lattest-product-area pb-40 category-list">
						<div class="row">
						
						<?php foreach($products as $cat): ?> -->
							<!-- single product -->
							<!-- <div class="col-lg-6">
								<div class="single-product">
									<img class="img-fluid" src="<?= base_url(); ?>assets/Users/img/product/<?= $cat['gambar']; ?>" alt="">
									<div class="product-details">
										<h6><?= $cat['nama_brg']; ?></h6>
										<div class="price">
											<h6>Rp. <?= number_format($cat['harga']) ?></h6> -->
											<!-- <h6 class="l-through">$210.00</h6> -->
										<!-- </div>
										<div class="prd-bottom">

											<a href="<?= base_url() ?>Transaksi/Cart/<?=  $cat['kd_brg']; ?>" class="social-info">
												<span class="ti-bag"></span>
												<p class="hover-text">add to cart</p>
											</a>
											<a href="" class="social-info">
												<span class="lnr lnr-heart"></span>
												<p class="hover-text">Wishlist</p>
											</a>
											<a href="Products/DetailProduct/<?= $cat['kd_brg']; ?>" class="social-info">
												<span class="lnr lnr-move"></span>
												<p class="hover-text">view more</p>
											</a>
										</div>
									</div>
								</div>
							</div>
							<?php endforeach; ?>
						</div>
					</section> -->
				<!-- End Best Seller -->

				<!-- Start Filter Bar -->
				<!-- <div class="filter-bar d-flex flex-wrap align-items-center mb-5">
					
					<div class="pagination ml-5">
						<a href="#" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
						<a href="#" class="active">1</a>
						<a href="#">2</a>
						<a href="#">3</a>
						
						<a href="#">6</a>
						<a href="#" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
					</div>
				</div> -->
				<!-- End Filter Bar -->
			<!-- </div>
		</div>
	</div>

	<section class="features-area section_gap">
		<div class="container">
			<div class="row features-inner">
				
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="<?= base_url(); ?>assets/Users/img/features/f-icon1.png" alt="">
						</div>
						<h6>Free Delivery</h6>
						<small>Kalo hoki</small>
					</div>
				</div>
				
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="<?= base_url(); ?>assets/Users/img/features/f-icon2.png" alt="">
						</div>
						<h6>Return Policy</h6>
						
						
					</div>
				</div>
				
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="<?= base_url(); ?>assets/Users/img/features/f-icon3.png" alt="">
						</div>
						<h6>24/7 Support</h6>
						
					</div>
				</div>
				
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="<?= base_url(); ?>assets/Users/img/features/f-icon4.png" alt="">
						</div>
						<h6>Secure Payment</h6>
						
					</div>
				</div>
			</div>
		</div>
	</section> -->