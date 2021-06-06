<?= $header ?>

<div class="container my-5">

<?php foreach($hotel as $h) {?>
<div class="card text-center">
	<div class="card-header">
<a href="javascript:history.go(-1)" class="btn btn-danger float-left">Back</a>
		
		<h5 class="text-center">
		<?= $h['nama'] ?>
		</h5>
	</div>
	<div class="card-body">
		<p class="card-text"><small class="text-muted"><?= $h['lokasi'] ?></small></p>
		<p class="card-text">Rp <?= number_format($h['harga'], 2) ?>/malam</p>
		<p class="card-text">Tersedia <?= $h['jumlah_kamar'] ?> kamar.</p>
		<p class="card-text">Rating <?= $h['rating'] ?>	</p>
		<div class="col">
			<div class="dropdown">
				<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Fasilitas
				</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<?php foreach($fasilitas as $f) { 
						if($f['id_hotel'] == $h['id_hotel']) {?>
							<a class="dropdown-item" href="#"><?= $f['nama_fasilitas'] ?></a>
					<?php }} ?>
				</div>
			</div>
		</div>
		<br>
		<a href="#" class="btn btn-success">Book Now</a>
	</div>
	<div class="card-footer text-muted">
		
	</div>
</div>
<?php } ?>
</div>
<?= $footer ?>
