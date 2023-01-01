<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<style type="text/css">
	body {
		font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
	}

	@page {
		margin-top: 5pt;
		margin-bottom: 5pt;
		margin-left: 5pt;
		margin-right: 5pt;
	}

	#front {
		background-image: url('assets/img/kartu/front.png');
		width: 50%;
		height: 320px;
		background-repeat: no-repeat;
		background-size: cover;
		float: left;
		border-radius: 5px;
		box-shadow: 0 0px 0px 0 rgba(0, 0, 0, 0.1), 0 0px 9px 0 rgba(0, 0, 0, 0.2);
		text-align: center;
	}

	#back {
		width: 49%;
		height: 320px;
		background-image: url('assets/img/kartu/back.png');
		background-repeat: no-repeat;
		background-size: cover;
		float: right;
		border-radius: 5px;
		box-shadow: 0 0px 0px 0 rgba(0, 0, 0, 0.1), 0 0px 9px 0 rgba(0, 0, 0, 0.2);
		text-align: center;
	}

	#p {
		font-size: 8px;
		text-align: center;
		font-weight: bold;
	}

	div .name {
		margin-top: 10px;
		text-align: center;
		margin-bottom: 10px;
	}
	</style>
</head>

<body>
	<section>
		<div id="front">
			<div style="position: absolute;">
				<img src="upload/pengajar/<?= $card['pengajar_image']; ?>"
					style="width: 80px; height: 100px; margin-top:55px; border: 1px solid #4BB39A;  padding: 4px;" />
			</div>
			<div class="name">
				<b class="nama-karyawan" style="font-size:12px;"><?= $card['pengajar_nama']; ?></b><br>
				<small class="jabatan" style="font-size:8px; letter-spacing:3px;">PENGAJAR</small>
			</div>
			<small style="font-size:6px; letter-spacing:3px; margin-top:10px;">ID :
				<?= $card['pengajar_id_card']; ?></small>
			<div>
				<div class="background">
					<img src="<?= base_url('upload'); ?>/barcode/<?= $card['pengajar_barcode']; ?>" alt="barcode"
						style="width: 80px; height: 80px;">
				</div>
			</div>
		</div>

		<div id="back"></div>
	</section>

</body>

</html>