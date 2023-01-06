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
						<div class="col-12">
                            <a class="nav-link active px-0 float-end" href="<?= base_url('Pages/Data/Murid');?>">
                                <i data-acorn-icon="arrow-left" class="me-2" data-acorn-size="17"></i>
                                <span class="align-middle">Kembali</span>
                            </a>
							<h1 class="mb-0 pb-0 display-4" id="title">Edit Murid Baru</h1>
							<nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
								<ul class="breadcrumb pt-0">
									<li class="breadcrumb-item"><a href="#">Pages</a></li>
									<li class="breadcrumb-item"><a href="#">Data</a></li>
									<li class="breadcrumb-item"><a href="#">Murid</a></li>
									<li class="breadcrumb-item"><a href="#">Edit Murid Baru</a></li>
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
														<div class="d-flex align-items-center lh-1-25">Total Murid</div>
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
					<div class="col-sm-6">
						<div class="card">
                            <div class="card-header">
                                EDIT NO ID : <b><?= $data['murid_kartu_id']; ?></b>
                            </div>
							<div class="card-body">
                            <form method="POST" id="formModalUser">
								<div class="mb-1">
									<label class="form-label">Nama</label>
									<input type="text" class="form-control" id="murid_nama" name="murid_nama"
										placeholder="Nama Lengkap" value="<?= $data['murid_nama']; ?>" />
									<input type="hidden" class="form-control" id="murid_kartu_id" name="murid_kartu_id" value="<?= $data['murid_kartu_id']; ?>" />
								</div>
								<div class="mb-1">
									<label class="form-label">Jenis Kelamin</label>
									<select id="murid_jk" name="murid_jk" class="form-control" select2>
										<option value="<?= $data['murid_jk']; ?>"><?= $data['murid_jk']; ?></option>
										<option value="Laki-laki">Laki-laki</option>
										<option value="Perempuan">Perempuan</option>
									</select>
								</div>
								<div class="mb-1">
									<label class="form-label">Tanggal Lahir</label>
									<input type="date" class="form-control" id="murid_tgl_lahir" name="murid_tgl_lahir" value="<?= $data['murid_tgl_lahir']; ?>"
									/>
								</div>
								<div class="mb-1">
									<label class="form-label">Pendidikan</label>
									<select id="murid_pendidikan" name="murid_pendidikan" class="form-control" >
										<option value="<?= $data['pend_id']; ?>"><?= $data['pend_nama']; ?></option>
									</select>
								</div>
								<div class="mb-1">
									<label class="form-label">Kelas</label>
									<select id="murid_kelas" name="murid_kelas" class="form-control" select2>
										<option value="<?= $data['kelas_id']; ?>"><?= $data['kelas_nama']; ?></option>
									</select>
								</div>
								<div class="mb-1">
									<label class="form-label">Kelompok</label>
									<select id="murid_kelompok" name="murid_kelompok" class="form-control" select2>
										<option value="<?= $data['kel_id']; ?>"><?= $data['kel_nama']; ?></option>
									</select>
								</div>
								<div class="mb-1">
									<label class="form-label">Nama Wali</label>
									<input type="text" class="form-control" id="murid_wali" name="murid_wali"
									placeholder="Nama Lengkap Wali" value="<?= $data['murid_wali']; ?>"/>
								</div>
								<div class="mb-1">
									<label class="form-label">Nomor HP Wali</label>
									<input type="Number" class="form-control" id="murid_no_wali" name="murid_no_wali"
									placeholder="contoh : 08123456789" value="<?= $data['murid_no_wali']; ?>" />
								</div>
								<div class="mb-1">
									<label class="form-label">Status</label>
									<select id="murid_status" name="murid_status" class="form-control">
										<option value="<?= $data['murid_status']; ?>"><?= $data['murid_status']; ?></option>
										<option value="Aktif">Aktif</option>
										<option value="Tidak Aktif">Tidak Aktif</option>
									</select>
								</div>
							</form>
							</div>
						</div>
					</div>
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-grid gap-2 mx-auto">
                                    <button type="button" class="btn btn-warning" id="ModalButtonSimpan">Edit Simpan</button>
                                    <a href="<?= base_url('Pages/Data/Murid');?>" class="btn btn-dark" type="button" id="Kembali" onclick="Kembali()">Kembali</a>
                                </div>
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

		function Kembali() {
			let element = document.getElementById("Kembali");
			element.classList.add("disabled");
			$('#Kembali').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> loading...')
		}
	// pendidikan
	$(document).ready(function() {
		$("#murid_pendidikan").select2({
			theme: "bootstrap4",
			ajax: {
				url: '<?= base_url('Pages/Data/Murid/Pendidikan') ?>',
				type: "post",
				dataType: 'json',
				delay: 200,
				data: function(params) {
					return {
						searchTerm: params.term
					};
				},
				processResults: function(response) {
					return {
						results: response
					};
				},
				cache: true
			}
		});
	});
	// kelas
	$(document).ready(function() {
		$("#murid_kelas").select2({
			theme: "bootstrap4",
			ajax: {
				url: '<?= base_url('Pages/Data/Murid/Kelas') ?>',
				type: "post",
				dataType: 'json',
				delay: 200,
				data: function(params) {
					return {
						searchTerm: params.term
					};
				},
				processResults: function(response) {
					return {
						results: response
					};
				},
				cache: true
			}
		});
	});
	// kelompok
	$(document).ready(function() {
		$("#murid_kelompok").select2({
			theme: "bootstrap4",
			ajax: {
				url: '<?= base_url('Pages/Data/Murid/Kelompok') ?>',
				type: "post",
				dataType: 'json',
				delay: 200,
				data: function(params) {
					return {
						searchTerm: params.term
					};
				},
				processResults: function(response) {
					return {
						results: response
					};
				},
				cache: true
			}
		});
	});

    $(document).on("click", "#ModalButtonSimpan", function() {
        if (validasi()) {
            let data = $('#formModalUser').serialize();
            $.ajax({
                type: 'POST',
                url: '<?= site_url('Pages/Data/Murid/Edit') ?>',
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
                        window.location.assign('<?= site_url("Pages/Data/Murid") ?>');
                    }, 2000);
                }
            });
        }
    });

    function validasi() {
        let murid_nama = document.getElementById("murid_nama").value;
        let murid_jk = document.getElementById("murid_jk").value;
        let murid_tgl_lahir = document.getElementById("murid_tgl_lahir").value;
        let murid_pendidikan = document.getElementById("murid_pendidikan").value;
        let murid_kelompok = document.getElementById("murid_kelompok").value;
        let murid_wali = document.getElementById("murid_wali").value;
        let murid_no_wali = document.getElementById("murid_no_wali").value;
        let murid_kelas = document.getElementById("murid_kelas").value;
        let murid_status = document.getElementById("murid_status").value;
        if ((murid_nama == "") || (murid_tgl_lahir == "") || (murid_jk == "") || (murid_pendidikan ==
                "") || (murid_kelompok =="") || (murid_wali =="") || (murid_no_wali =="") || (murid_kelas =="") || (murid_status =="")) {
            if (murid_status == "") {
                notif("Status");
            }
            if (murid_kelas == "") {
                notif("Kelas");
            }
            if (murid_no_wali == "") {
                notif("Nomor Hp Wali");
            }
            if (murid_wali == "") {
                notif("Nama Wali");
            }
            if (murid_kelompok == "") {
                notif("kelompok");
            }
            if (murid_pendidikan == "") {
                notif("Pendidikan");
            }
            if (murid_tgl_lahir == "") {
                notif("Tanggal Lahir");
            }
            if (murid_jk == "") {
                notif("Jenis Kelamin");
            }
            if (murid_nama == "") {
                notif("Nama Murid");
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
    </script>
    <?php $this->load->view('Template/v_bottom');  ?>