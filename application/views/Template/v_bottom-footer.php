</div>


<!-- Vendor Scripts Start -->
<script src="<?= base_url('assets');?>/js/vendor/jquery-3.5.1.min.js"></script>
<script src="<?= base_url('assets');?>/js/vendor/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets');?>/js/vendor/OverlayScrollbars.min.js"></script>
<script src="<?= base_url('assets');?>/js/vendor/autoComplete.min.js"></script>
<script src="<?= base_url('assets');?>/js/vendor/clamp.min.js"></script>

<script src="<?= base_url('assets');?>/icon/acorn-icons.js"></script>
<script src="<?= base_url('assets');?>/icon/acorn-icons-interface.js"></script>

<!-- Vendor Scripts End -->

<!-- Template Base Scripts Start -->
<script src="<?= base_url('assets');?>/js/base/helpers.js"></script>
<script src="<?= base_url('assets');?>/js/base/globals.js"></script>
<script src="<?= base_url('assets');?>/js/base/nav.js"></script>
<script src="<?= base_url('assets');?>/js/base/search.js"></script>
<script src="<?= base_url('assets');?>/js/base/settings.js"></script>
<!-- Template Base Scripts End -->
<!-- Sweetalert2 -->
<script src="<?= base_url('assets');?>/vendor/sweetalert2/sweetalert2.all.min.js"></script>

<script src="<?= base_url('assets');?>/js/cs/charts.extend.js"></script>

<script src="<?= base_url('assets');?>/js/common.js"></script>
<script src="<?= base_url('assets');?>/js/scripts.js"></script>
<!-- Page Specific Scripts End -->

<script>
function Logout() {
	Swal.fire({
		title: 'Logout?',
		text: "Yakin mau logout?",
		icon: 'question',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes'
	}).then((result) => {
		if (result.isConfirmed) {
			window.location.assign('<?= base_url('Auth/logout') ?>');
		}
	})
}
</script>

<?php if ($this->session->flashdata('success')) : ?>
<script>
Swal.fire({
	icon: 'success',
	title: 'Success',
	text: '<?php echo $this->session->flashdata('success'); ?>',
	showConfirmButton: false,
	timer: 1500
})
</script>
<?php endif;
unset($_SESSION['success']); ?>