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
							<h1 class="mb-0 pb-0 display-4" id="title">Users</h1>
							<nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
								<ul class="breadcrumb pt-0">
									<li class="breadcrumb-item"><a href="#">Master</a></li>
									<li class="breadcrumb-item"><a href="#">Users</a></li>
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
														<div class="d-flex align-items-center lh-1-25">Total Users</div>
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
				<button type="button" class="btn btn-outline-primary btn-icon btn-icon-start mb-3 Tambah"
					data-bs-toggle="modal" data-bs-target="#ModalUser">
					<i data-acorn-icon="plus"></i>
					<span>Tambah Baru</span>
				</button>
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
												<th class="text-muted text-uppercase">Name</th>
												<th class="text-muted text-uppercase">Username</th>
												<th class="text-muted text-uppercase">Akses</th>
												<th class="text-muted text-uppercase">Status</th>
												<th class="text-muted text-uppercase">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i=1;
											foreach($data->result_array() as $a):
											?>
											<tr>
												<td><?= $i++; ?></td>
												<td><?= $a['user_nama']; ?></td>
												<td><?= $a['user_username']; ?></td>
												<td><?= $a['role_nama']; ?></td>
												<td>
													<?php if($a['user_status'] =="Aktif"): ?>
													<span class="badge bg-primary text-uppercase"><?= $a['user_status']; ?></span>
													<?php else: ?>
													<span class="badge bg-danger text-uppercase"><?= $a['user_status']; ?></span>
													<?php endif; ?>
												</td>
												<td>
													<button class="btn btn-sm btn-icon btn-icon-start btn-outline-warning ms-1 Edit"
														type="button" data-bs-toggle="modal" data-bs-target="#ModalUser"
														data-id="<?= $a['user_id'];?>">
														<i data-acorn-icon="edit-square" data-acorn-size="15"></i>
														<span class="d-none d-xxl-inline-block">Edit</span>
													</button>
													<button class="btn btn-sm btn-icon btn-icon-start btn-outline-danger ms-1 Hapus"
														type="button" data-id="<?= $a['user_id'];?>">
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
			<div class="modal fade" id="ModalUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
				role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="titleTambah">Tambah User Baru</h5>
							<h5 class="modal-title" id="titleEdit">Edit User</h5>
							<button type="button" class="btn-close CloseModal" data-bs-dismiss="modal"
								aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<form method="POST" id="formModalUser">
								<div class="mb-1">
									<label class="form-label">Role Akses</label>
									<select id="user_role" name="user_role" class="form-control" select2>
										<option value="">- Pilih -</option>
										<?php foreach($role->result_array() as $a): ?>
										<option value="<?= $a['role_id']; ?>"><?= $a['role_nama']; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="mb-1">
									<label class="form-label">Nama</label>
									<input type="text" class="form-control" id="user_nama" name="user_nama"
										placeholder="Nama Lengkap" />
									<input type="hidden" id="user_id" name="user_id">
								</div>
								<div class="mb-1">
									<label class="form-label">Username</label>
									<input type="text" class="form-control" id="user_username" name="user_username"
										placeholder="username" />
								</div>
								<div class="mb-1">
									<label class="form-label">Password</label>
									<input type="password" class="form-control " id="user_password" name="user_password"
										placeholder="********" />
								</div>
								<div class="mb-1">
									<label class="form-label">Status</label>
									<select id="user_status" name="user_status" class="form-control">
										<option selected value="Aktif">Aktif</option>
										<option value="Tidak Aktif">Tidak Aktif</option>
									</select>
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary" id="ModalButtonSimpan">Simpan</button>
							<button type="button" class="btn btn-warning" id="ModalButtonEdit">Edit</button>
						</div>
					</div>
				</div>
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


		$(document).on("click", ".Tambah", function() {
			$('#titleEdit').hide();
			$('#ModalButtonEdit').hide();
			$('#titleTambah').show();
			$('#ModalButtonSimpan').show();
		})

		$(document).on("click", "#ModalButtonSimpan", function() {
			if (validasi()) {
				let data = $('#formModalUser').serialize();
				$.ajax({
					type: 'POST',
					url: '<?= site_url('Master/Users/Tambah') ?>',
					data: data,
					beforeSend: function() {
					$('#ModalButtonSimpan').prop('disabled', true);
					$('#ModalButtonSimpan').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> loading...')
				},
					success: function(response) {
						var data = JSON.parse(response);
						if (data.success) {
							Swal.fire({
								icon: 'success',
								title: 'Success',
								text: data.msg,
								showConfirmButton: false,
								timer: 1500
							});
						} else {
							Swal.fire({
								icon: 'error',
								title: 'Error',
								text: data.msg,
								showConfirmButton: true,
								timer: 2000
							});
						}
						setTimeout(() => {
							window.location.assign('<?= site_url("Master/Users") ?>');
						}, 2000);
					}
				});
			}
		});

		function validasi() {
			let user_role = document.getElementById("user_role").value;
			let user_nama = document.getElementById("user_nama").value;
			let user_username = document.getElementById("user_username").value;
			let user_password = document.getElementById("user_password").value;
			let user_status = document.getElementById("user_status").value;
			if ((user_role == "") || (user_username == "") || (user_nama == "") || (user_password ==
					"") || (user_status ==
					"")) {
				if (user_status == "") {
					notif("Status");
				}
				if (user_password == "") {
					notif("Password");
				}
				if (user_username == "") {
					notif("Username");
				}
				if (user_role == "") {
					notif("User Akses");
				}
			} else {
				return true;
			}
		}

		$(document).on("click", ".Edit", function() {
			$('#titleEdit').show();
			$('#ModalButtonEdit').show();
			$('#titleTambah').hide();
			$('#ModalButtonSimpan').hide();
			let id = $(this).data('id');
			let roleNama = "";
			$.ajax({
				type: 'POST',
				url: '<?= site_url('Master/Users/View'); ?>',
				data: {
					id: id
				},
				success: function(response) {
					let data = JSON.parse(response);
					if (data.success) {
						$('#user_id').val(data.user_id);
						$('#user_username').val(data.user_username);
						$('#user_nama').val(data.user_nama);
						roleNama += '<option value=' + data.role_id + '>' + data.role_nama + '</option>';
						roleNama +=
							'<?php foreach ($role->result_array() as $data) { ?><option value="<?= $data['role_id'] ?>"><?= $data['role_nama'] ?></option><?php } ?>';
						$('#user_role').html(roleNama);
						$('#user_status').val(data.user_status);
					} else {
						Swal.fire({
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

		$(document).on("click", ".CloseModal", function() {
			let html = '';
			$('#user_id').val("");
			$('#user_nama').val("");
			$('#user_username').val("");
			$('#user_password').val("");
			html += '<option value="">- Pilih -</option>';
			html +=
				'<?php foreach ($role->result_array() as $data) { ?><option value="<?= $data['role_id'] ?>"><?= $data['role_nama'] ?></option><?php } ?>';
			$('#user_role').html(html);
		});

		$(document).on("click", "#ModalButtonEdit", function() {
			if (validasiupdate()) {
				let data = $('#formModalUser').serialize();
				$.ajax({
					type: 'POST',
					url: '<?= site_url('Master/Users/Edit') ?>',
					data: data,
					beforeSend: function() {
					$('#ModalButtonEdit').prop('disabled', true);
					$('#ModalButtonEdit').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> loading...')
				},
					success: function(response) {
						var data = JSON.parse(response);
						if (data.success) {
							Swal.fire({
								icon: 'success',
								title: 'Success',
								text: data.msg,
								showConfirmButton: false,
								timer: 1500
							});
						} else {
							Swal.fire({
								icon: 'error',
								title: 'Error',
								text: data.msg,
								showConfirmButton: false,
								timer: 1500
							});
						}
						setTimeout(() => {
							window.location.assign('<?= site_url("Master/Users") ?>');
						}, 1500);
					}
				});
			}
		});

		function validasiupdate() {
			let user_role = document.getElementById("user_role").value;
			let user_nama = document.getElementById("user_nama").value;
			let user_username = document.getElementById("user_username").value;
			let user_password = document.getElementById("user_password").value;
			let user_status = document.getElementById("user_status").value;
			if ((user_role == "") || (user_username == "") || (user_nama == "") || (user_password ==
					"") || (user_status ==
					"")) {
				if (user_status == "") {
					notif("Status");
				}
				if (user_password == "") {
					notif("Password");
				}
				if (user_username == "") {
					notif("Username");
				}
				if (user_role == "") {
					notif("User Akses");
				}
			} else {
				return true;
			}
		}

		function notif(word) {
			Swal.fire({
				title: 'Perhatian',
				text: word + ' wajib di isi !',
				icon: 'info',
			}).then((result) => {})
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
						url: '<?= site_url('Master/Users/Hapus') ?>',
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
								window.location.assign('<?= site_url("Master/Users") ?>');
							}, 2000);
						}
					});
				}
			})
		});
		</script>
		<?php $this->load->view('Template/v_bottom');  ?>