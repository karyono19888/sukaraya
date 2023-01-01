<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/vendor/datatables.min.css" />

<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/vendor/select2.min.css" />

<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/vendor/select2-bootstrap4.min.css" />

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
							<h1 class="mb-0 pb-0 display-4" id="title">Kartu Pengurus</h1>
							<nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
								<ul class="breadcrumb pt-0">
									<li class="breadcrumb-item"><a href="#">Master</a></li>
									<li class="breadcrumb-item"><a href="#">Kartu ID</a></li>
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
													<i data-acorn-icon="notebook-1" class="text-white"></i>
												</div>
											</div>
											<div class="col">
												<div class="row gx-2 d-flex align-content-center">
													<div class="col-12 col-xl d-flex">
														<div class="d-flex align-items-center lh-1-25">Total Kartu Pengurus</div>
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
				<div class="row">
					<div class="col-sm-12">
						<?= $this->session->flashdata('message'); ?>
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
												<th class="text-muted text-uppercase">Barcode</th>
												<th class="text-muted text-uppercase">Foto</th>
												<th class="text-muted text-uppercase">Status</th>
												<th class="text-muted text-uppercase">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i = 1;
											foreach ($data->result_array() as $a) :
											?>
											<tr class="align-middle">
												<td><?= $i++; ?></td>
												<td><?= $a['pengurus_id_card']; ?></td>
												<td>
													<div class="d-flex align-items-center me-3">
														<div class="sw-6 d-inline-block position-relative me-2">
															<img
																src="<?= $a['pengurus_image'] == "" ? 'https://ui-avatars.com/api/?name=' . $a['pengurus_nama'] . '' : '' . base_url('upload/pengurus/' . $a['pengurus_image'] . '') . ''; ?>"
																class="img-fluid rounded-xl border border-2 border-foreground"
																alt="thumb" width="100%" />
														</div>
														<div class="d-inline-block">
															<div class="text-primary"><?= $a['pengurus_nama']; ?></div>
															<div class="text-muted text-small">Da'puan <?= $a['pengurus_dapuan']; ?>
															</div>
														</div>
													</div>
												</td>
												<td>
													<img
														src="<?= $a['pengurus_barcode'] == "" ? 'https://ui-avatars.com/api/?name=' . $a['pengurus_nama'] . '' : '' . base_url('upload/barcode/' . $a['pengurus_barcode'] . '') . ''; ?>"
														class="img-fluid rounded-xl" alt="thumb" width="30%" />
												</td>
												<td>
													<img
														src="<?= $a['pengurus_image'] == "" ? 'https://ui-avatars.com/api/?name=' . $a['pengurus_nama'] . '' : '' . base_url('upload/pengurus/' . $a['pengurus_image'] . '') . ''; ?>"
														class="img-fluid rounded-xl" alt="thumb" width="30%" />
												</td>
												<td>
													<?php if ($a['pengurus_status'] == "Aktif") : ?>
													<span
														class="badge bg-primary text-uppercase"><?= $a['pengurus_status']; ?></span>
													<?php else : ?>
													<span class="badge bg-danger text-uppercase"><?= $a['pengurus_status']; ?></span>
													<?php endif; ?>
												</td>
												<td>
													<button
														class="btn btn-sm btn-icon btn-icon-start <?= $a['pengurus_image'] == "" ? 'btn-outline-warning' : 'btn-outline-dark'; ?> mb-2 ms-1 Edit"
														type="button" data-bs-toggle="modal" data-bs-target="#ModalKelas"
														data-id="<?= $a['pengurus_id']; ?>">
														<i data-acorn-icon="upload" data-acorn-size="15"></i>
														<span
															class="d-none d-xxl-inline-block"><?= $a['pengurus_image'] == "" ? 'Upload' : 'Edit Foto'; ?></span>
													</button>
													<?php if (!empty($a['pengurus_barcode']) && !empty($a['pengurus_image'])) : ?>
													<a href="<?= base_url('Master/Kartu/pengurus/DownloadKartu/' . $a['pengurus_id_card']); ?>"
														class="btn btn-sm btn-icon btn-icon-start btn-outline-primary ms-1 Download"
														type="button" data-id="<?= $a['pengurus_id_card']; ?>" target="_blank">
														<i data-acorn-icon="download" data-acorn-size="15"></i>
														<span class="d-none d-xxl-inline-block">Download</span>
													</a>
													<?php endif; ?>
													<?php if (empty($a['pengurus_barcode'])) : ?>
													<button class="btn btn-sm btn-icon btn-icon-start btn-outline-dark ms-1 Generate"
														type="button" data-id="<?= $a['pengurus_id_card']; ?>">
														<i data-acorn-icon="code" data-acorn-size="15"></i>
														<span class="d-none d-xxl-inline-block">Generate Barcode</span>
													</button>
													<?php endif; ?>
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

		<div class="modal fade" id="ModalKelas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
			role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="titleTambah">Upload Foto</h5>
						<button type="button" class="btn-close CloseModal" data-bs-dismiss="modal"
							aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form class=" mb-5 tooltip-end-top" id="loginForm" method="POST"
							action="<?= base_url('Master/Kartu/pengurus/UploadFoto'); ?>" enctype="multipart/form-data">
							<div class="mb-3 filled">
								<input type="file" class="form-control" name="murid_image" id="murid_image"
									accept="image/png, image/jpeg" required />
								<small class="text-muted"><i>Maximal size 2MB dan format .png/ .jpeg/ .jpg</i></small>
								<input type="hidden" id="pengurus_id_card" name="pengurus_id_card">
							</div>
							<div class="border-0 pt-0 d-flex justify-content-between align-items-center">
								<a href="#" class="me-3"></a>
								<div>
									<button class="btn btn-icon btn-icon-end btn-primary" type="submit">
										<span>Upload</span>
										<i data-acorn-icon="chevron-right"></i>
									</button>
								</div>
							</div>

							<div class="img-container">
								<div class="row">
									<div class="col-md-8">
										<img src="" id="sample_image" />
									</div>
									<div class="col-md-4">
										<div class="preview"></div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php $this->load->view('Template/v_footer');  ?>
		<?php $this->load->view('Template/v_bottom-footer');  ?>
		<script src="<?= base_url('assets/'); ?>js/vendor/datatables.min.js"></script>
		<script src="<?= base_url('assets/'); ?>js/vendor/select2.full.min.js"></script>
		<script>
		$(document).ready(function() {
			$('#table').DataTable();
		});

		$(document).on("click", ".Edit", function() {
			let id = $(this).data('id');
			$.ajax({
				type: 'POST',
				url: '<?= site_url('Master/Kartu/pengurus/ViewUpload') ?>',
				data: {
					id: id
				},
				success: function(response) {
					var data = JSON.parse(response);
					if (data.success) {
						$('#pengurus_id_card').val(data.pengurus_id_card);
					} else {
						SweetAlert.fire({
							icon: 'warning',
							title: 'Warning',
							text: data.msg,
							showConfirmButton: false,
							timer: 1500
						});
					}
				}
			});
		});


		$(document).on("click", ".Generate", function() {
			let id = $(this).data('id');
			$.ajax({
				type: 'POST',
				url: '<?= site_url('Master/Kartu/pengurus/Generate') ?>',
				data: {
					id: id
				},
				success: function(response) {
					var data = JSON.parse(response);
					if (data.success) {
						SweetAlert.fire({
							icon: 'success',
							title: 'Success',
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
						window.location.assign('<?= site_url("Master/Kartu/pengurus") ?>');
					}, 1500);
				}
			});
		});
		</script>
		<?php $this->load->view('Template/v_bottom');  ?>