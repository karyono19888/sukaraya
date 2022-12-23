<body>
	<div id="root">
		<?php $this->load->view('Template/v_navbar'); ?>

		<main>
			<div class="container">
				<div class="row">
					<div class="col-auto d-none d-lg-flex">
						<div class="nav flex-column sw-25 mt-n2" id="settingsColumn">
							<!-- Content of this will be moved from #settingsMoveContent div based on the responsive breakpoint.  -->
						</div>
					</div>

					<div class="col">
						<!-- Title and Top Buttons Start -->
						<div class="page-title-container">
							<div class="row">
								<!-- Title Start -->
								<div class="col">
									<a class="nav-link active px-0 float-end" href="<?= base_url('Profile');?>">
										<i data-acorn-icon="arrow-left" class="me-2" data-acorn-size="17"></i>
										<span class="align-middle">Kembali</span>
									</a>
									<h1 class="mb-0 pb-0 display-4" id="title">Edit Profile</h1>
									<nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
										<ul class="breadcrumb pt-0">
											<li class="breadcrumb-item"><a href="<?= base_url('Profile');?>">Profile</a></li>
											<li class="breadcrumb-item"><a href="#">Edit Profile</a></li>
										</ul>
									</nav>
								</div>
								<!-- Title End -->

								<!-- Top Buttons Start -->
								<div class="col-12 col-sm-auto d-flex align-items-start justify-content-end d-block d-lg-none">
									<button type="button" class="btn btn-icon btn-icon-start btn-outline-primary w-100 w-sm-auto"
										data-bs-toggle="dropdown">
										<i data-acorn-icon="gear"></i>
										<span>Settings</span>
									</button>

									<!-- In Page Menu Start -->
									<div class="dropdown-menu dropdown-menu-end sw-25 py-3 px-4" id="settingsMoveContent"
										data-move-target="#settingsColumn" data-move-breakpoint="lg">
										<div class="mb-2">
											<a class="nav-link active px-0" href="#">
												<i data-acorn-icon="shield" class="me-2" data-acorn-size="17"></i>
												<span class="align-middle">Profile</span>
											</a>
											<div>
												<a class="nav-link active py-1 my-1 px-0" href="#">
													<i class="me-2 sw-2 d-inline-block"></i>
													<span class="align-middle">Personal</span>
												</a>
											</div>
										</div>
									</div>
									<!-- In Page Menu End -->
								</div>
								<!-- Top Buttons End -->
							</div>
						</div>
						<!-- Title and Top Buttons End -->
						<?= $this->session->flashdata('message'); ?>
						<!-- Public Info Start -->
						<h2 class="small-title">Public Info</h2>
						<div class="card mb-5">
							<div class="card-body">
								<form method="POST" id="formEditProfile" action="<?= base_url('Profile/SubmitEditProfile');?>">
									<div class="mb-3 row">
										<label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Nama</label>
										<div class="col-sm-8 col-md-9 col-lg-10">
											<input type="text" class="form-control" value="<?= $edit['user_nama'];?>"
												id="user_nama" name="user_nama" required />
											<input type="hidden" id="user_id" name="user_id" value="<?= $edit['user_id'];?>">
										</div>
									</div>
									<div class="mb-3 row">
										<label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Username</label>
										<div class="col-sm-8 col-md-9 col-lg-10">
											<input type="text" class="form-control" value="<?= $edit['user_username'];?>"
												id="user_username" name="user_username" disabled />
										</div>
									</div>
									<div class="mb-3 row">
										<label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Email</label>
										<div class="col-sm-8 col-md-9 col-lg-10">
											<input type="email" class="form-control"
												value="<?= $edit['user_email'] =="" ?'Email belum di isi':''.$edit['user_email'].'';?>"
												id="user_email" name="user_email" required />
										</div>
									</div>
									<div class="mb-3 row mt-5">
										<div class="col-sm-8 col-md-9 col-lg-10 ms-auto">
											<button type="submit" class="btn btn-primary">Update</button>
										</div>
									</div>
								</form>
							</div>
						</div>
						<!-- Public Info End -->

						<!-- Contact Start -->
						<h2 class="small-title">Password</h2>
						<div class="card mb-5">
							<div class="card-body">
								<form id="formPassword" method="POST" action="<?= base_url('Profile/SubmitUbahPassword');?>">
									<div class="mb-3 row">
										<label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Password lama</label>
										<div class="col-sm-8 col-md-9 col-lg-10">
											<input type="password" class="form-control" id="passwordlama" name="passwordlama"
												placeholder="********" />
											<input type="hidden" id="user_id" name="user_id" value="<?= $edit['user_id'];?>">
										</div>
									</div>
									<div class="mb-3 row">
										<label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Password baru</label>
										<div class="col-sm-8 col-md-9 col-lg-10">
											<input type="password" class="form-control" id="passwordbaru" name="passwordbaru"
												placeholder="********" />
										</div>
									</div>
									<div class="mb-3 row">
										<label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Konfirmasi Password baru</label>
										<div class="col-sm-8 col-md-9 col-lg-10">
											<input type="password" class="form-control" id="passwordkonfirmasi"
												name="passwordkonfirmasi" placeholder="********" />
										</div>
									</div>
									<div class="mb-3 row mt-5">
										<div class="col-sm-8 col-md-9 col-lg-10 ms-auto">
											<button type="submit" class="btn btn-outline-primary">Update</button>
										</div>
									</div>
								</form>
							</div>
						</div>
						<!-- Contact End -->
					</div>
				</div>
			</div>
		</main>
		<?php $this->load->view('Template/v_footer');  ?>
		<?php $this->load->view('Template/v_bottom-footer');  ?>
		<?php $this->load->view('Template/v_bottom');  ?>