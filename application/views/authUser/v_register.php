
  	<!--================Login Box Area =================-->
    <section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="<?= base_url() ?>assets/users/img/login.jpg" alt="">
						<div class="hover">
							<h4>New to our website?</h4>
							<p>There are advances being made in science and technology everyday, and a good example of this is the</p>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
            <?= $this->session->flashdata('alert'); ?>
						<h3>Register Page</h3>
						<form class="row login_form"  method="post" id="contactForm" >
            <input type="hidden" name="kd_konsumen" value="<?= $kode; ?>">
            <div class="form-group">  
                  <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Username" value="<?= set_value('name') ?>" >
                  <?= form_error('name', '<small class="text-danger pl-3">', '</small>' ); ?>
                </div>

                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="<?= set_value('email') ?>">
                  <?= form_error('email', '<small class="text-danger pl-3">', '</small>' ); ?>
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>' ); ?>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Password_repeat">
                  </div>
                </div>
							
							<div class="col-md-12 form-group">
								<button type="submit" class="primary-btn">Register</button>
								<a href="<?= base_url() ?>Auth">Already Account?</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->