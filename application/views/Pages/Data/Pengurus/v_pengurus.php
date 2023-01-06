<link rel="stylesheet" href="<?= base_url('assets/');?>css/vendor/datatables.min.css" />

<link rel="stylesheet" href="<?= base_url('assets/');?>css/vendor/select2.min.css" />

<link rel="stylesheet" href="<?= base_url('assets/');?>css/vendor/select2-bootstrap4.min.css" />

<body>
	<div id="root">
		<?php $this->load->view('Template/v_navbar'); ?>

		<main>
			<div class="container">
				<!-- Title and Top Buttons Start -->
				<div class="page-title-container">
					<div class="row">
						<!-- Title Start -->
						<div class="col-12 col-md-7">
							<h1 class="mb-0 pb-0 display-4" id="title">Pengurus</h1>
							<nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
								<ul class="breadcrumb pt-0">
									<li class="breadcrumb-item"><a href="#">Pages</a></li>
									<li class="breadcrumb-item"><a href="#">Data</a></li>
									<li class="breadcrumb-item"><a href="#">Pengurus</a></li>
								</ul>
							</nav>
						</div>
						<!-- Title End -->
					</div>
				</div>
				<!-- Title and Top Buttons End -->
				<div class="row">
					<div class="col-12 col-lg-12">

						<div class="mb-5">
							<div class="row g-2">
								<div class="col-sm-3">
									<div class="card sh-11 hover-scale-up cursor-pointer">
										<div class="h-100 row g-0 card-body align-items-center py-3">
											<div class="col-auto pe-3">
												<div
													class="bg-gradient-light sh-5 sw-5 rounded-xl d-flex justify-content-center align-items-center">
													<i data-acorn-icon="user" class="text-white"></i>
												</div>
											</div>
											<div class="col">
												<div class="row gx-2 d-flex align-content-center">
													<div class="col-12 col-xl d-flex">
														<div class="d-flex align-items-center lh-1-25">Total Pengurus</div>
													</div>
													<div class="col-12 col-xl-auto">
														<div class="cta-2 text-primary"><?= $total; ?></div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-sm-3">
									<div class="card sh-11 hover-scale-up cursor-pointer">
										<div class="h-100 row g-0 card-body align-items-center py-3">
											<div class="col-auto pe-3">
												<div
													class="bg-gradient-light sh-5 sw-5 rounded-xl d-flex justify-content-center align-items-center">
													<i data-acorn-icon="check" class="text-white"></i>
												</div>
											</div>
											<div class="col">
												<div class="row gx-2 d-flex align-content-center">
													<div class="col-12 col-xl d-flex">
														<div class="d-flex align-items-center lh-1-25">Aktif</div>
													</div>
													<div class="col-12 col-xl-auto">
														<div class="cta-2 text-primary"><?= $aktif; ?></div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-sm-3">
									<div class="card sh-11 hover-scale-up cursor-pointer">
										<div class="h-100 row g-0 card-body align-items-center py-3">
											<div class="col-auto pe-3">
												<div
													class="bg-gradient-dark sh-5 sw-5 rounded-xl d-flex justify-content-center align-items-center">
													<i data-acorn-icon="warning-hexagon" class="text-white"></i>
												</div>
											</div>
											<div class="col">
												<div class="row gx-2 d-flex align-content-center">
													<div class="col-12 col-xl d-flex">
														<div class="d-flex align-items-center lh-1-25">Tidak Aktif</div>
													</div>
													<div class="col-12 col-xl-auto">
														<div class="cta-2 text-primary"><?= $tidakaktif; ?></div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Stats End -->
					</div>
				</div>

				<!-- Content Start -->
				<a href="<?= base_url('Pages/Data/Pengurus/ShowTambah');?>" type="button" class="btn btn-outline-primary btn-icon btn-icon-start mb-3" id="Tambah" onclick="Tambah()">
					<i data-acorn-icon="plus"></i>
					<span>Tambah Baru</span>
				</a>
				<div class="row">
					<div class="col-sm-12">
						<div class="card">
							<div class="card-body">
								<!-- Table Start -->
								<div class="table-responsive">
									<table id="table" class="table table-hover">
										<thead>
											<tr>
												<th class="text-muted text-uppercase">No</th>
												<th class="text-muted text-uppercase">ID</th>
												<th class="text-muted text-uppercase">Nama</th>
												<th class="text-muted text-uppercase">Kelompok</th>
												<th class="text-muted text-uppercase">Da'puan</th>
												<th class="text-muted text-uppercase">Status</th>
												<th class="text-muted text-uppercase">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i=1;
													foreach($pengurus->result_array() as $a):
												?>
											<tr>
												<td><?= $i++; ?></td>
												<td><?= $a['pengurus_id_card']; ?></td>
												<td>
													<div class="d-flex align-items-center me-3">
														<div class="sw-6 d-inline-block position-relative me-2">
															<img
																src="<?= $a['pengurus_image'] == "" ? 'https://ui-avatars.com/api/?name=' . $a['pengurus_nama'] . '' : '' . base_url('upload/Pengurus/' . $a['pengurus_image'] . '') . ''; ?>"
																class="img-fluid rounded-xl border border-2 border-foreground"
																alt="thumb" width="100%" />
														</div>
														<div class="d-inline-block">
															<div class="text-primary"><?= $a['pengurus_nama']; ?></div>
															<div class="text-muted text-small"><?= $a['pengurus_jk']; ?>
															</div>
														</div>
													</div>
												</td>
												<td><?= $a['kel_nama']; ?></td>
												<td><?= $a['dapuan_nama']; ?></td>
												<td>
													<?php if($a['pengurus_status'] =="Aktif"): ?>
													<span class="badge bg-primary text-uppercase"><?= $a['pengurus_status']; ?></span>
													<?php else: ?>
													<span class="badge bg-danger text-uppercase"><?= $a['pengurus_status']; ?></span>
													<?php endif; ?>
												</td>
												<td>
													<a href="<?= base_url('Pages/Data/Pengurus/ShowEditPengurus/'.$a['pengurus_id'].'')?>" class="btn btn-sm btn-icon btn-icon-start btn-outline-warning ms-1 Edit"
														type="button">
														<i data-acorn-icon="edit-square" data-acorn-size="15"></i>
														<span class="d-none d-xxl-inline-block">Edit</span>
													</a>
													<button class="btn btn-sm btn-icon btn-icon-start btn-outline-danger ms-1 Hapus"
														type="button" data-id="<?= $a['pengurus_id'];?>">
														<i data-acorn-icon="bin" data-acorn-size="15"></i>
														<span class="d-none d-xxl-inline-block">Delete</span>
													</button>
												</td>
											</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
								<!-- Table End -->
							</div>
						</div>
					</div>
				</div>
				<!-- Content End -->
			</div>
		</main>
		<?php $this->load->view('Template/v_footer');  ?>
		<?php $this->load->view('Template/v_bottom-footer');  ?>
		<script src="<?= base_url('assets/');?>js/vendor/datatables.min.js"></script>
		<script src="<?= base_url('assets/');?>js/vendor/select2.full.min.js"></script>
		<script>
		$(document).ready(function() {
			$('#table').DataTable();
		});

		function Tambah() {
			let element = document.getElementById("Tambah");
			element.classList.add("disabled");
			$('#Tambah').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> loading...')
		}

		$(document).on("click", ".Hapus", function() {
			let id = $(this).data('id');
			Swal.fire({
				title: 'Kamu akan hapus?',
				text: "Data tidak bisa dikembalikan!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				cancelButtonText: 'Tidak',
				confirmButtonText: 'Ya, hapus!'
			}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
						type: 'POST',
						url: '<?= site_url('Pages/Data/Pengurus/Hapus') ?>',
						data: {
							id: id
						},
						success: function(response) {
							var data = JSON.parse(response);
							if (data.success) {
								Swal.fire({
									icon: 'success',
									title: 'Deleted!',
									text: data.msg,
									showConfirmButton: false,
									timer: 1500
								});
							} else {
								SweetAlert.fire({
									icon: 'error',
									title: 'Error',
									text: data.msg,
									showConfirmButton: false,
									timer: 1500
								});
							}
							setTimeout(() => {
								window.location.assign('<?= site_url("Pages/Data/Pengurus") ?>');
							}, 2000);
						}
					});
				}
			})
		});
		</script>
		<?php $this->load->view('Template/v_bottom');  ?>