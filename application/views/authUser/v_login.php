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
							<a class="primary-btn" href="<?= base_url() ?>Auth/Register">Create an Account</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
            <?= $this->session->flashdata('alert'); ?>
						<h3>Log in to enter</h3>
						<form class="row login_form"  method="post" id="contactForm" >
							<div class="col-md-12 form-group">
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter Email Address..." value="<?= set_value('email') ?>">
                <?= form_error('email', '<small class="text-danger pl-3">', '</small>' ); ?>
							</div>
							<div class="col-md-12 form-group">
                <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                <?= form_error('password', '<small class="text-danger pl-3">', '</small>' ); ?>
							</div>
							
							<div class="col-md-12 form-group">
								<button type="submit" class="primary-btn">Log In</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->
