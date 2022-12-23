<body>
	<div id="root">
		<?php $this->load->view('Template/v_navbar'); ?>
		<?php $role_nama = $this->db->get_where('users_role',['role_id'=>$this->session->userdata('user_role')])->row_array(); ?>
		<main>
			<div class="container">
				<!-- Title and Top Buttons Start -->
				<div class="page-title-container">
					<div class="row">
						<!-- Title Start -->
						<div class="col-12 col-md-7">
							<h1 class="mb-0 pb-0 display-4" id="title"><?= $this->session->userdata('user_nama'); ?></h1>
							<nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
								<ul class="breadcrumb pt-0">
									<li class="breadcrumb-item"><a href="#"><?= $role_nama['role_nama']; ?></a></li>
								</ul>
							</nav>
						</div>
						<!-- Title End -->

						<!-- Top Buttons Start -->
						<div class="col-12 col-md-5 d-flex align-items-start justify-content-end">
							<a href="<?= base_url('Profile/edit/'.$this->session->userdata('user_id').'');?>" type="button"
								class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto">
								<i data-acorn-icon="edit-square"></i>
								<span>Edit</span>
							</a>
						</div>
						<!-- Top Buttons End -->
					</div>
				</div>
				<!-- Title and Top Buttons End -->
				<?php $img = $this->db->get_where('users',['user_id'=>$this->session->userdata('user_id')])->row_array(); ?>
				<div class="row">
					<!-- Left Side Start -->
					<div class="col-12 col-xl-4 col-xxl-3">
						<!-- Biography Start -->
						<h2 class="small-title">Profile</h2>
						<div class="card mb-5">
							<div class="card-body">
								<div class="d-flex align-items-center flex-column mb-4">
									<div class="d-flex align-items-center flex-column">
										<div class="sw-13 position-relative mb-3">
											<img src="<?= $img['user_image'];?>" class="img-fluid rounded-xl" alt="thumb"
												width="100%" />
										</div>
										<div class="h5 mb-0"><?= $this->session->userdata('user_nama'); ?></div>
										<div class="text-muted"><?= $role_nama['role_nama']; ?></div>
									</div>
								</div>
								<div class="nav flex-column" role="tablist">
									<a class="nav-link active px-0 border-bottom border-separator-light" data-bs-toggle="tab"
										href="#overviewTab" role="tab">
										<i data-acorn-icon="activity" class="me-2" data-acorn-size="17"></i>
										<span class="align-middle">Overview</span>
									</a>
								</div>
							</div>
						</div>
						<!-- Biography End -->
					</div>
					<!-- Left Side End -->

					<!-- Right Side Start -->
					<div class="col-12 col-xl-8 col-xxl-9 mb-5 tab-content">
						<!-- Overview Tab Start -->
						<div class="tab-pane fade show active" id="overviewTab" role="tabpanel">
							<!-- Stats Start -->
							<h2 class="small-title">Informasi</h2>
							<div class="mb-5">
								<div class="row g-2">
									<div class="col-12 col-sm-6 col-lg-3">
										<div class="card hover-border-primary">
											<div class="card-body">
												<div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
													<span>Murid</span>
													<i data-acorn-icon="office" class="text-primary"></i>
												</div>
												<div class="text-small text-muted mb-1">ACTIVE</div>
												<div class="cta-1 text-primary"><?= $murid; ?></div>
											</div>
										</div>
									</div>
									<div class="col-12 col-sm-6 col-lg-3">
										<div class="card hover-border-primary">
											<div class="card-body">
												<div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
													<span>Pengurus</span>
													<i data-acorn-icon="check-square" class="text-primary"></i>
												</div>
												<div class="text-small text-muted mb-1">ACTIVE</div>
												<div class="cta-1 text-primary"><?= $pengurus; ?></div>
											</div>
										</div>
									</div>
									<div class="col-12 col-sm-6 col-lg-3">
										<div class="card hover-border-primary">
											<div class="card-body">
												<div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
													<span>Pengajar</span>
													<i data-acorn-icon="user" class="text-primary"></i>
												</div>
												<div class="text-small text-muted mb-1">ACTIVE</div>
												<div class="cta-1 text-primary"><?= $pengajar; ?></div>
											</div>
										</div>
									</div>
									<div class="col-12 col-sm-6 col-lg-3">
										<div class="card hover-border-primary">
											<div class="card-body">
												<div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
													<span>Absensi</span>
													<i data-acorn-icon="screen" class="text-primary"></i>
												</div>
												<div class="text-small text-muted mb-1">HARI INI</div>
												<div class="cta-1 text-primary">524</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Stats End -->

							<!-- Timeline Start -->
							<h2 class="small-title">Logs</h2>
							<div class="card mb-5">
								<div class="card-body">
									<div class="card-block" style="margin-top: 20px; height: 350px; overflow:auto;">
										<?php foreach($log->result_array() as $a): ?>
										<div class="row g-0">
											<div
												class="col-auto sw-1 d-flex flex-column justify-content-center align-items-center position-relative me-4">
												<div class="w-100 d-flex sh-1"></div>
												<div
													class="rounded-xl shadow d-flex flex-shrink-0 justify-content-center align-items-center">
													<div class="bg-gradient-light sw-1 sh-1 rounded-xl position-relative"></div>
												</div>
												<div class="w-100 d-flex h-100 justify-content-center position-relative">
													<div class="line-w-1 bg-separator h-100 position-absolute"></div>
												</div>
											</div>
											<div class="col mb-4">
												<div class="h-100">
													<div class="d-flex flex-column justify-content-start">
														<div class="d-flex flex-column">
															<a href="#" class="heading stretched-link"><?= $a['log_tipe']; ?></a>
															<div class="text-alternate">
																<?= date("d F Y, H:i:s",strtotime($a['log_time'])); ?></div>
															<div class="text-muted mt-1">
																User "<?= $a['user_nama']; ?>", <?= $a['log_desc']; ?>.
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<?php endforeach; ?>
									</div>
								</div>
							</div>
							<!-- Timeline End -->
						</div>
						<!-- Overview Tab End -->
					</div>
					<!-- Right Side End -->
				</div>
			</div>
		</main>