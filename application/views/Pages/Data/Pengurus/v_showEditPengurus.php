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
                            <a class="nav-link active px-0 float-end" href="<?= base_url('Pages/Data/Pengurus');?>">
                                <i data-acorn-icon="arrow-left" class="me-2" data-acorn-size="17"></i>
                                <span class="align-middle">Kembali</span>
                            </a>
							<h1 class="mb-0 pb-0 display-4" id="title">Edit Pengurus Baru</h1>
							<nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
								<ul class="breadcrumb pt-0">
									<li class="breadcrumb-item"><a href="#">Pages</a></li>
									<li class="breadcrumb-item"><a href="#">Data</a></li>
									<li class="breadcrumb-item"><a href="#">Pengurus</a></li>
									<li class="breadcrumb-item"><a href="#">Edit Pengurus Baru</a></li>
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
				<div class="row">
					<div class="col-sm-6">
						<div class="card">
                            <div class="card-header">
                                NO ID : <b><?= $data['pengurus_id_card']; ?></b>
                            </div>
							<div class="card-body">
                            <form method="POST" id="formModalUser">
								<div class="mb-1">
									<label class="form-label">Nama</label>
									<input type="text" class="form-control" id="pengurus_nama" name="pengurus_nama"
										placeholder="Nama Lengkap" value="<?= $data['pengurus_nama']; ?>"/>
									<input type="hidden" class="form-control" id="pengurus_id_card" name="pengurus_id_card" value="<?= $data['pengurus_id_card']; ?>" />
								</div>
								<div class="mb-1">
									<label class="form-label">Jenis Kelamin</label>
									<select id="pengurus_jk" name="pengurus_jk" class="form-control" select2>
									<option value="<?= $data['pengurus_jk']; ?>"><?= $data['pengurus_jk']; ?></option>
										<option value="Laki-laki">Laki-laki</option>
										<option value="Perempuan">Perempuan</option>
									</select>
								</div>
								<div class="mb-1">
									<label class="form-label">Kelompok</label>
									<select id="pengurus_kelompok" name="pengurus_kelompok" class="form-control" select2>
									<option value="<?= $data['kel_id']; ?>"><?= $data['kel_nama']; ?></option>
									</select>
								</div>
								<div class="mb-1">
									<label class="form-label">Da'puan</label>
									<select id="pengurus_dapuan" name="pengurus_dapuan" class="form-control" select2>
									<option value="<?= $data['dapuan_id']; ?>"><?= $data['dapuan_nama']; ?></option>
									</select>
								</div>
								<div class="mb-1">
									<label class="form-label">Nomor HP Wali</label>
									<input type="Number" class="form-control" id="pengurus_no_tlpn" name="pengurus_no_tlpn"
									placeholder="contoh : 08123456789" value="<?= $data['pengurus_no_tlpn']; ?>" />
								</div>
								<div class="mb-1">
									<label class="form-label">Status</label>
									<select id="pengurus_status" name="pengurus_status" class="form-control">
									<option value="<?= $data['pengurus_status']; ?>"><?= $data['pengurus_status']; ?></option>
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
                                    <button type="button" class="btn btn-warning" id="ModalButtonSimpan">Simpan Edit</button>
                                    <a href="<?= base_url('Pages/Data/Pengurus');?>" class="btn btn-dark" type="button" id="Kembali" onclick="Kembali()">Kembali</a>
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

	// kelompok
	$(document).ready(function() {
		$("#pengurus_kelompok").select2({
			theme: "bootstrap4",
			ajax: {
				url: '<?= base_url('Pages/Data/Pengurus/Kelompok') ?>',
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
	// dapuan
	$(document).ready(function() {
		$("#pengurus_dapuan").select2({
			theme: "bootstrap4",
			ajax: {
				url: '<?= base_url('Pages/Data/Pengurus/Dapuan') ?>',
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
                url: '<?= site_url('Pages/Data/Pengurus/Edit') ?>',
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
                        window.location.assign('<?= site_url("Pages/Data/Pengurus") ?>');
                    }, 2000);
                }
            });
        }
    });

    function validasi() {
        let pengurus_nama = document.getElementById("pengurus_nama").value;
        let pengurus_jk = document.getElementById("pengurus_jk").value;
        let pengurus_kelompok = document.getElementById("pengurus_kelompok").value;
        let pengurus_dapuan = document.getElementById("pengurus_dapuan").value;
        let pengurus_no_tlpn = document.getElementById("pengurus_no_tlpn").value;
        let pengurus_status = document.getElementById("pengurus_status").value;
        if ((pengurus_nama == "") || (pengurus_jk == "")  || (pengurus_kelompok =="") || (pengurus_dapuan =="") || (pengurus_no_tlpn =="") || (pengurus_status =="")) {
            if (pengurus_status == "") {
                notif("Status");
            }
            if (pengurus_no_tlpn == "") {
                notif("Nomor Hp");
            }
            if (pengurus_kelompok == "") {
                notif("kelompok");
            }
            if (pengurus_dapuan == "") {
                notif("Da'puan");
            }
            if (pengurus_jk == "") {
                notif("Jenis Kelamin");
            }
            if (pengurus_nama == "") {
                notif("Nama Pengajar");
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