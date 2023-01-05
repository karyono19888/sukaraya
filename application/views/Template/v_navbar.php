<div id="nav" class="nav-container d-flex">
	<div class="nav-content d-flex">
		<!-- Logo Start -->
		<div class="logo position-relative">
			<a href="<?= base_url(); ?>">
				<!-- Logo can be added directly -->
				<h1 style="color: white;"><span style="font-size: 42px; font-weight:bold;">𝕾</span>𝖚𝖐𝖆𝖗𝖆𝖞𝖆
				</h1>

			</a>
		</div>
		<!-- Logo End -->

		<!-- User Menu Start -->
		<div class="user-container d-flex">
			<a href="#" class="d-flex user position-relative" data-bs-toggle="dropdown" aria-haspopup="true"
				aria-expanded="false">
				<?php $img = $this->db->get_where('users', ['user_id' => $this->session->userdata('user_id')])->row_array(); ?>
				<img class="profile" alt="profile" src="<?= $img['user_image']; ?>" />
				<div class="name"><?= $this->session->userdata('user_nama'); ?></div>
			</a>
			<div class="dropdown-menu dropdown-menu-end user-menu wide">
				<div class="row mb-1 ms-0 me-0">
					<div class="col-6 ps-1 pe-1">
						<ul class="list-unstyled">
							<li>
								<a href="<?= base_url('Profile'); ?>"
									class="<?= $this->uri->segment(1) == "Profile"  ? 'active' : '' ?>">
									<i data-acorn-icon="user" class="me-2" data-acorn-size="17"></i>
									<span class="align-middle">Profile</span>
								</a>
							</li>
						</ul>
					</div>
					<div class="col-6 pe-1 ps-1">
						<ul class="list-unstyled">
							<li>
								<a href="#" onclick="Logout()">
									<i data-acorn-icon="logout" class="me-2" data-acorn-size="17"></i>
									<span class="align-middle">Logout</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- User Menu End -->

		<!-- Icons Menu Start -->
		<ul class="list-unstyled list-inline text-center menu-icons">
			<li class="list-inline-item">
				<a href="#" id="colorButton">
					<i data-acorn-icon="light-on" class="light" data-acorn-size="18"></i>
					<i data-acorn-icon="light-off" class="dark" data-acorn-size="18"></i>
				</a>
			</li>
		</ul>
		<!-- Icons Menu End -->

		<!-- Menu Start -->
		<div class="menu-container flex-grow-1">
			<?php $user_role = $this->session->userdata('user_role'); ?>
			<ul id="menu" class="menu">
				<li>
					<a href="<?= base_url('Dashboards') ?>" data-href="#"
						class="<?= $this->uri->segment(1) == "Dashboards"  ? 'active' : '' ?>">
						<i data-acorn-icon="home" class="icon" data-acorn-size="18"></i>
						<span class="label">Dashboards</span>
					</a>
				</li>
				<?php if ($user_role == 1) : ?>
				<li>
					<a href="#apps" data-href="#" class="<?= $this->uri->segment(1) == "Master"  ? 'active' : '' ?>">
						<i data-acorn-icon="screen" class="icon" data-acorn-size="18"></i>
						<span class="label">Master</span>
					</a>
					<ul id="apps">
						<li>
							<a href="<?= base_url('Master/Users') ?>"
								class="<?= $this->uri->segment(2) == "Users"  ? 'active' : '' ?>">
								<span class=" label">Users</span>
							</a>
						</li>
						<li>
							<a href="<?= base_url('Master/Kelas') ?>"
								class="<?= $this->uri->segment(2) == "Kelas"  ? 'active' : '' ?>">
								<span class="label">Kelas</span>
							</a>
						</li>
						<li>
							<a href="<?= base_url('Master/Pendidikan') ?>"
								class="<?= $this->uri->segment(2) == "Pendidikan"  ? 'active' : '' ?>">
								<span class="label">Pendidikan</span>
							</a>
						</li>
						<li>
							<a href="<?= base_url('Master/Kelompok') ?>"
								class="<?= $this->uri->segment(2) == "Kelompok"  ? 'active' : '' ?>">
								<span class="label">Kelompok</span>
							</a>
						</li>
						<li>
							<a href="<?= base_url('Master/Dapuan') ?>"
								class="<?= $this->uri->segment(2) == "Dapuan"  ? 'active' : '' ?>">
								<span class="label">Da'puan</span>
							</a>
						</li>
						<li>
							<a href="#Kartu" data-href="#" class="<?= $this->uri->segment(2) == "Kartu"  ? 'active' : '' ?>">
								<span class="label">Kartu ID</span>
							</a>
							<ul id="Kartu">
								<li>
									<a href="<?= base_url('Master/Kartu/Murid'); ?>"
										class="<?= $this->uri->segment(3) == "Murid"  ? 'active' : '' ?>">
										<span class="label">Murid</span>
									</a>
								</li>
								<li>
									<a href="<?= base_url('Master/Kartu/Pengajar'); ?>"
										class="<?= $this->uri->segment(3) == "Pengajar"  ? 'active' : '' ?>">
										<span class="label">Pengajar</span>
									</a>
								</li>
								<li>
									<a href="<?= base_url('Master/Kartu/Pengurus'); ?>"
										class="<?= $this->uri->segment(3) == "Pengurus"  ? 'active' : '' ?>">
										<span class="label">Pengurus</span>
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</li>
				<?php endif; ?>
				<?php if ($user_role == 1 || $user_role == 2) : ?>
				<li>
					<a href="#Pages" data-href="#" class="<?= $this->uri->segment(1) == "Pages"  ? 'active' : '' ?>">
						<i data-acorn-icon="notebook-1" class="icon" data-acorn-size="18"></i>
						<span class="label">Pages</span>
					</a>
					<ul id="Pages">
						<li>
							<a href="#data" data-href="#" class="<?= $this->uri->segment(2) == "Data"  ? 'active' : '' ?>">
								<span class="label">Data</span>
							</a>
							<ul id="data">
								<li>
									<a href="<?= base_url('Pages/Data/Murid'); ?>"
										class="<?= $this->uri->segment(3) == "Murid"  ? 'active' : '' ?>">
										<span class="label">Murid</span>
									</a>
								</li>
								<?php if ($user_role == 1) : ?>
								<li>
									<a href="<?= base_url('Pages/Data/Pengajar'); ?>"
										class="<?= $this->uri->segment(3) == "Pengajar"  ? 'active' : '' ?>">
										<span class="label">Pengajar</span>
									</a>
								</li>
								<li>
									<a href="<?= base_url('Pages/Data/Pengurus'); ?>"
										class="<?= $this->uri->segment(3) == "Pengurus"  ? 'active' : '' ?>">
										<span class="label">Pengurus</span>
									</a>
								</li>
								<?php endif; ?>
							</ul>
						</li>
						<li>
							<a href="#laporan" data-href="#"
								class="<?= $this->uri->segment(2) == "Laporan"  ? 'active' : '' ?>">
								<span class="label">Laporan</span>
							</a>
							<ul id="laporan">
								<li>
									<a href="<?= base_url('Pages/Laporan/Absensi'); ?>"
										class="<?= $this->uri->segment(3) == "Absensi"  ? 'active' : '' ?>">
										<span class="label">Absensi</span>
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</li>
				<li>
					<a href="#Absen_scan" data-href="#" class="<?= $this->uri->segment(1) == "Scan"  ? 'active' : '' ?>">
						<i data-acorn-icon="alarm" class="icon" data-acorn-size="18"></i>
						<span class="label">Scan Absensi</span>
					</a>
					<ul id="Absen_scan">
						<li>
							<a href="<?= base_url('Scan/ScanBarcode'); ?>" data-href="#"
								class="<?= $this->uri->segment(2) == "ScanBarcode"  ? 'active' : '' ?>">
								<span class="label">Scan Barcode</span>
							</a>
						</li>
					</ul>
				</li>
				<?php endif; ?>
				<li>
					<a href="#" data-href="#" onclick="Logout()">
						<i data-acorn-icon="logout" class="icon" data-acorn-size="18"></i>
						<span class="label">Logout</span>
					</a>
				</li>
			</ul>
		</div>
		<!-- Menu End -->

		<!-- Mobile Buttons Start -->
		<div class="mobile-buttons-container">
			<!-- Scrollspy Mobile Button Start -->
			<a href="#" id="scrollSpyButton" class="spy-button" data-bs-toggle="dropdown">
				<i data-acorn-icon="menu-dropdown"></i>
			</a>
			<!-- Scrollspy Mobile Button End -->

			<!-- Scrollspy Mobile Dropdown Start -->
			<div class="dropdown-menu dropdown-menu-end" id="scrollSpyDropdown"></div>
			<!-- Scrollspy Mobile Dropdown End -->

			<!-- Menu Button Start -->
			<a href="#" id="mobileMenuButton" class="menu-button">
				<i data-acorn-icon="menu"></i>
			</a>
			<!-- Menu Button End -->
		</div>
		<!-- Mobile Buttons End -->
	</div>
	<div class="nav-shadow"></div>
</div>