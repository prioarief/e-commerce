<div class="modal fade mt-3" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add To Cart</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url() ?>Transaksi/Cart" method="post">
		<div class="col-sm form-group">
			<div class="d-flex gambarrr">
          <img class="img-cart imgg" src="" alt="">
      </div>
			<span class="text-dark barang"></span>
          <input type="hidden" class="form-control mt-2" id="kd_brg" name="kd_brg" value="">
          <div class="product_count">
							
							<input type="text" name="quantity" id="quantity" minlength="1" maxlength="12" value="1" title="Quantity:" class="input-text quantity">
							<button onclick="var result = document.getElementById('quantity'); var quantity = result.value; if( !isNaN( quantity )) result.value++;return false;"
							 class="increase items-count" type="button"><i class="lnr lnr-chevron-up text-danger"></i></button>
							<button onclick="var result = document.getElementById('quantity'); var quantity = result.value; if( !isNaN( quantity ) &amp;&amp; quantity > 1 ) result.value--;return false;"
							 class="reduced items-count" type="button"><i class="lnr lnr-chevron-down text-danger"></i></button>
					</div>
		</div>
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
		</form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade mt-3" id="updateCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Cart</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url() ?>Transaksi/UpdateCart" method="post">
		<div class="col-sm form-group">
			<span class="text-dark barang"></span>
          <input type="hidden" class="form-control mt-2" id="kd_keranjang" name="kd_keranjang" value="">
          <div class="product_count">
							
						
					<input type="text" name="quantity" id="quantityy" maxlength="12" value="1" title="Quantityy:" class="input-text quantityy">
							<button onclick="var result = document.getElementById('quantityy'); var quantityy = result.value; if( !isNaN( quantityy )) result.value++;return false;"
							 class="increase items-count" type="button"><i class="lnr lnr-chevron-up text-danger"></i></button>
							<button onclick="var result = document.getElementById('quantityy'); var quantityy = result.value; if( !isNaN( quantityy ) &amp;&amp; quantityy > 1 ) result.value--;return false;"
							 class="reduced items-count" type="button"><i class="lnr lnr-chevron-down text-danger"></i></button>
					</div>
		</div>
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
		</form>
      </div>
    </div>
  </div>
</div>




<!-- start footer Area -->
<footer class="footer-area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-4  col-md-4 col-sm-4">
					<div class="single-footer-widget">
						<h6>Newsletter</h6>
						<p>Stay update with our latest</p>
							<a href="https:??www.instagram.com/prioarief_">My Instagram</a>
						
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4">
					<div class="single-footer-widget">
						<h6>Follow Us</h6>
						<p>Let us be social</p>
						<div class="footer-social d-flex align-items-center">
							<a href="https://www.facebook.com/prio.a.gunawan"><i class="fa fa-facebook"></i></a>
							<a href="https://www.twitter.com/ryzenGe"><i class="fa fa-twitter"></i></a>
							<a href="https://www.github.com/prioarief"><i class="fa fa-github
							"></i></a>
							<a href="#"><i class="fas fa-insstagram"></i></a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4">
					<div class="single-footer-widget">
						<h6>Customer Service</h6>
						<div class="footer-social d-flex align-items-center">
							<a href="https://api.whatsapp.com/send?phone=6289637533496&text=Haloo"><i class="fa fa-whatsapp"></i></a>
							<a href="https://t.me/prioariefg?start"><i class="fa fa-send"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
				<p class="footer-text m-0">Copyright &copy; 2019 by <a href="https://www.instagram.com/prioarief_/">Prio Arief Gunawan</a></p>
			</div>
		</div>
	</footer>
	<!-- End footer Area -->

	<script src="<?= base_url(); ?>assets/Users/js/vendor/jquery-2.2.4.min.js"></script>
	<script src="<?= base_url(); ?>assets/Users/js/vendor/bootstrap.min.js"></script>
	<script src="<?= base_url(); ?>assets/Users/js/jquery.ajaxchimp.min.js"></script>
	<script src="<?= base_url(); ?>assets/Users/js/jquery.nice-select.min.js"></script>
	<script src="<?= base_url(); ?>assets/Users/js/jquery.sticky.js"></script>
	<script src="<?= base_url(); ?>assets/Users/js/nouislider.min.js"></script>
	<script src="<?= base_url(); ?>assets/Users/js/jquery.magnific-popup.min.js"></script>
	<script src="<?= base_url(); ?>assets/Users/js/owl.carousel.min.js"></script>
	<script src="<?= base_url(); ?>assets/Users/js/gmaps.min.js"></script>
	<script src="<?= base_url(); ?>assets/Users/js/main.js"></script>
	<script src="<?= base_url(); ?>assets/Users/js/my.js"></script>
</body>

</html>
