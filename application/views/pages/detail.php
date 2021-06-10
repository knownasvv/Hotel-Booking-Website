<?= $header ?>
<style>
	.card-header, .card-footer{ background: #77ACA2; color: #F5F5F5; }
	.btn-primary { background: #468189; color: #F5F5F5;  border-style: solid; border-color: #468189; }
	.btn-primary:hover { background: #F4E9CD; color: #031926;border-style: solid; border-color: #F4E9CD; }
	.left-side, .right-side{ background: #F4E9CD; border-radius: 0; }
	ul#fasilitas { list-style: none; padding: 0; }
	li#fasilitas { padding-left: 1.3em; }
	li#fasilitas:before {
		content: "\f0a4";
		font-family: "Font Awesome 5 Free";
		display: inline-block;
		margin-left: -1.5em;
		width: 1.3em;
	}
</style>
<div class="container my-5">

<?php foreach($hotel as $h) {?>
<div class="card text-center">
	<div class="card-header">
		<a href="javascript:history.go(-1)" class="btn btn-danger float-left"><i class="fa fa-chevron-left"></i> Back</a>
		<h5 class="text-center"><?= $h['nama'] ?></h5>
	</div>
	<div class="card-body p-0">
		<div class="container">
			<div class="row">
				<div class="card col-lg-6 left-side p-3 text-center">
					<p class="card-text"><i class="fa fa-map-marker-alt"></i> <?= $h['alamat'] ?>, <?= $h['kota']?></p>
					<p class="card-text"><i class="fa fa-tags"></i> <span style="font-size: 1.5rem;">Rp <?= number_format($h['harga'], 2) ?></span> <small>PER NIGHT</small></p>
					<p class="card-text">Tersedia <?= $h['jumlah_kamar'] ?> kamar.</p>
					<div class="mb-2" style="color: #468189; font-size: 1.2em;">
						<?php 
							$rating = $h['rating']/2;
							for ($i = 1; $i <= 5; $i++) {
								if (round($rating - .25 ) >= $i) echo "<i class='fa fa-star'></i>";
								else if (round($rating + .25 ) >= $i) echo "<i class='fa fa-star-half-alt'></i>"; 
								else echo "<i class='far fa-star'></i>";
							}
							echo " <b>" . $h['rating'] ."</b>";
						?>
					</div>
				</div>
				<div class="card col-lg-6 right-side py-3 px-5">
					<h5 class="mb-2"><b>FASILITAS</b></h5>
					<ul id="fasilitas" class="row mt-2 pl-5">
						<?php foreach($fasilitas as $f) { 
							if($f['id_hotel'] == $h['id_hotel']) {?>
							<li id="fasilitas" class="col-sm-6 col-xs-12 my-1 text-left">
									<?= $f['nama_fasilitas'] ?>
							</li>
						<?php }} ?>
					<ul>
				</div>
			</div>
		</div>
	</div>
	<div class="card-footer text-muted">
	<a href="<?= base_url('index.php/Hotel/Booking/'. $h['id_hotel']);?>" class="btn btn-primary"><i class="fa fa-plus"></i> Booking</a>
	</div>
</div>
<?php } ?>
</div>
<?= $footer ?>
