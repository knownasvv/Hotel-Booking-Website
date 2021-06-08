<?= $header ?>
<style>
	.card-img-top { width: 100%; height: 13rem; object-fit: fill; cursor: pointer;}
	.card {
		background: #77ACA2;
		color: white !important;
		border-radius: 0;
	}
	.card-title { color: white; font-weight: bold;}
	#reservasi{
		background: #F4E9CD;
		color: #031926;
		height: 100%;
		border-radius: 0;
	}
	#reservasi:hover{
		background: #468189;
		color: #F5F5F5;
	}
	.fa-tags, .fa-map-marker-alt{
		color: #031926;
	}
</style>
<div class="container my-5">
	<h1 class="mb-5 text-center" style="font-weight: bold;">HOTEL LIST</h1>
	<?php foreach($hotel as $h) {?>
		<div class="card mb-3 p-0 col-12">
			<div class="row no-gutters pr-0">
				<div class="col-md-3 text-center align-middle">
					<img src="<?= base_url('assets/images/hotel/'. $h['gambar']) ?>" class="card-img-top img-fluid" alt="<?= $h['nama'] ?>" height="50px">
				</div>
				<div class="col-md-6">
					<div class="card-body">
						<a href="<?= base_url('index.php/hotel/detail/'.$h['id_hotel'])?>" style="text-decoration: none !important;">
							<h5 class="card-title"><?= $h['nama'] ?></h5>
						</a>
						
						<div class="mb-2" style="color: #F4E9CD; font-size: 1.2em;">
							<?php 
								$rating = $h['rating']/2;
								for ($i = 1; $i <= 5; $i++) {
									if (round($rating - .25 ) >= $i) echo "<i class='fa fa-star'></i>";
									else if (round($rating + .25 ) >= $i) echo "<i class='fa fa-star-half-alt'></i>"; 
									else echo "<i class='fa fa-star'></i>";
								}
								echo " <b>" . $h['rating'] ."</b>";
							?>
						</div>
						<div class="card-text mb-1"><i class="fa fa-map-marker-alt"></i> <?= $h['kota'] ?></div>
						<div class="card-text mb-2">
							<i class="fa fa-tags"></i> 
							<span style="color: #F4E9CD; font-size: 1.5rem;">Rp <?= number_format($h['harga'], 2) ?></span> <small> PER NIGHT</small>
						</div>
					</div>
				</div>
				<div id="buttons" class="col-md-3 card-body py-0" style="border-left: 1px;">
					<a id="reservasi" class="btn col-12" href="<?= base_url('index.php/Hotel/Booking/'. $h['id_hotel']) ?>">
						<h5 class="align-middle"><i class="fa fa-plus"></i> Booking</h5>
					</a>
				</div>
			</div>
		</div>
		
	<?php } ?>
</div>
<script src="<?= base_url('assets/js/jquery-3.3.1.min.js'); ?>"></script>
<script>
	$('.card-img-top').click(function() {
		window.location.href = "<?= base_url('index.php/hotel/detail/'.$h['id_hotel']) ?>";
	});
</script>
<?= $footer ?>
