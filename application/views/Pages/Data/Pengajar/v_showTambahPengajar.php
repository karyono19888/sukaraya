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
                            <a class="nav-link active px-0 float-end" href="<?= base_url('Pages/Data/Pengajar');?>">
                                <i data-acorn-icon="arrow-left" class="me-2" data-acorn-size="17"></i>
                                <span class="align-middle">Kembali</span>
                            </a>
							<h1 class="mb-0 pb-0 display-4" id="title">Tambah Pengajar Baru</h1>
							<nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
								<ul class="breadcrumb pt-0">
									<li class="breadcrumb-item"><a href="#">Pages</a></li>
									<li class="breadcrumb-item"><a href="#">Data</a></li>
									<li class="breadcrumb-item"><a href="#">Pengajar</a></li>
									<li class="breadcrumb-item"><a href="#">Tambah Pengajar Baru</a></li>
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
														<div class="d-flex align-items-center lh-1-25">Total Pengajar</div>
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
                                NO ID : <b><?= $kode; ?></b>
                            </div>
							<div class="card-body">
                            <form method="POST" id="formModalUser">
								<div class="mb-1">
									<label class="form-label">Nama</label>
									<input type="text" class="form-control" id="pengajar_nama" name="pengajar_nama"
										placeholder="Nama Lengkap" />
									<input type="hidden" class="form-control" id="pengajar_id_card" name="pengajar_id_card" value="<?= $kode; ?>" />
								</div>
								<div class="mb-1">
									<label class="form-label">Jenis Kelamin</label>
									<select id="pengajar_jk" name="pengajar_jk" class="form-control" select2>
										<option value="">- Pilih -</option>
										<option value="Laki-laki">Laki-laki</option>
										<option value="Perempuan">Perempuan</option>
									</select>
								</div>
								<div class="mb-1">
									<label class="form-label">Kelompok</label>
									<select id="pengajar_kelompok" name="pengajar_kelompok" class="form-control" select2>
										<option value="">- Pilih -</option>
									</select>
								</div>
								<div class="mb-1">
									<label class="form-label">Nomor HP Wali</label>
									<input type="Number" class="form-control" id="pengajar_no_tlpn" name="pengajar_no_tlpn"
									placeholder="contoh : 08123456789" />
								</div>
								<div class="mb-1">
									<label class="form-label">Status</label>
									<select id="pengajar_status" name="pengajar_status" class="form-control">
										<option selected value="Aktif">Aktif</option>
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
                                    <button type="button" class="btn btn-primary" id="ModalButtonSimpan">Simpan</button>
                                    <a href="<?= base_url('Pages/Data/Pengajar');?>" class="btn btn-dark" type="button" id="Kembali" onclick="Kembali()">Kembali</a>
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
		$("#pengajar_kelompok").select2({
			theme: "bootstrap4",
			ajax: {
				url: '<?= base_url('Pages/Data/Pengajar/Kelompok') ?>',
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
                url: '<?= site_url('Pages/Data/Pengajar/Tambah') ?>',
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
                        window.location.assign('<?= site_url("Pages/Data/Pengajar") ?>');
                    }, 2000);
                }
            });
        }
    });

    function validasi() {
        let pengajar_nama = document.getElementById("pengajar_nama").value;
        let pengajar_jk = document.getElementById("pengajar_jk").value;
        let pengajar_kelompok = document.getElementById("pengajar_kelompok").value;
        let pengajar_no_tlpn = document.getElementById("pengajar_no_tlpn").value;
        let pengajar_status = document.getElementById("pengajar_status").value;
        if ((pengajar_nama == "") || (pengajar_jk == "")  || (pengajar_kelompok =="") || (pengajar_no_tlpn =="") || (pengajar_status =="")) {
            if (pengajar_status == "") {
                notif("Status");
            }
            if (pengajar_no_tlpn == "") {
                notif("Nomor Hp");
            }
            if (pengajar_kelompok == "") {
                notif("kelompok");
            }
            if (pengajar_jk == "") {
                notif("Jenis Kelamin");
            }
            if (pengajar_nama == "") {
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