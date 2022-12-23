<body class="h-100">
	<div id="root" class="h-100">
		<!-- Background Start -->
		<div class="fixed-background"></div>
		<!-- Background End -->

		<div class="container-fluid p-0 h-100 position-relative">
			<div class="row g-0 h-100">
				<!-- Left Side Start -->
				<div class="offset-0 col-12 d-none d-lg-flex offset-md-1 col-lg h-lg-100">
					<div class="min-h-100 d-flex align-items-center">
						<div class="w-100 w-lg-75 w-xxl-50">
							<div>
								<div class="mb-5">
									<img src="<?= base_url('assets/');?>img/logo/logo.png" alt="logo" width="25%">
									<h1 class="display-3 text-white">Generasi Penerus Sukaraya</h1>
								</div>
								<h2 class="display-3 text-white">طَلَبُ الْعِلْمِ فَرِيْضَةٌ عَلَى كُلِّ مُسْلِمٍ</h2>
								<p class="h6 text-white lh-1-5 mb-5">
									Artinya : "Menuntut ilmu itu wajib bagi setiap muslim"
								</p>
								<div class="mb-5">
									<a class="btn btn-lg btn-outline-white" href="<?= base_url();?>">Aplikasi Management System
										Sukaraya</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Left Side End -->

				<!-- Right Side Start -->
				<div class="col-12 col-lg-auto h-100 pb-4 px-4 pt-0 p-lg-0">
					<div
						class="sw-lg-70 min-h-100 bg-foreground d-flex justify-content-center align-items-center shadow-deep py-5 full-page-content-right-border">
						<div class="sw-lg-50 px-5">
							<div class="sh-11">
								<h1 style="color: #1DA8E7;"><span
										style="font-size: 42px; font-weight:bold;">𝕾</span>𝖚𝖐𝖆𝖗𝖆𝖞𝖆
								</h1>
							</div>
							<div class="mb-5">
								<h2 class="cta-1 mb-0 text-primary">Welcome,</h2>
								<h2 class="cta-1 text-primary">let's get started!</h2>
							</div>
							<div class="mb-5">
								<p class="h6">Please use your credentials to login.</p>
								<p class="h6">
									If you are not a member, please contact
									<a href="#">Administrator</a>
									.
								</p>
							</div>
							<?= $this->session->flashdata('message'); ?>
							<div>
								<form method="POST" id="loginForm class=" tooltip-end-bottom" novalidate
									action="<?= base_url('Auth');?>">
									<div class="mb-3 filled form-group tooltip-end-top">
										<i data-acorn-icon="user"></i>
										<input type="text" class="form-control" placeholder="Username" name="username"
											id="username" value="<?= set_value('username'); ?>" required autofocus />
										<?= form_error('username', '<small class="text-sm text-danger">', '</small>'); ?>
									</div>
									<div class="mb-3 filled form-group tooltip-end-top">
										<i data-acorn-icon="lock-off"></i>
										<input class="form-control pe-7" name="password" id="password" type="password"
											placeholder="Password" required />
										<a type="button" id="liveToastBtn" class="text-small position-absolute t-3 e-3"
											href="#">Forgot?</a>
										<?= form_error('password', '<small class="text-sm text-danger">', '</small>'); ?>
									</div>
									<button type="submit" class="btn btn-lg btn-primary" id="login">Login</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- Right Side End -->
			</div>
		</div>
	</div>
	<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 5">
		<div id="liveToast" class="toast hide bg-white" role="alert" aria-live="assertive" aria-atomic="true">
			<div class="toast-header">
				<strong class="me-auto">Lupa Password?</strong>
				<small>a second ago</small>
				<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
			</div>
			<div class="toast-body">Silahkan hubungi <b>Administrator</b>.</div>
		</div>
	</div>

	<?php $this->load->view('Auth/Layout/v_footer'); ?>

	<?php $this->load->view('Auth/Layout/v_bottom'); ?>