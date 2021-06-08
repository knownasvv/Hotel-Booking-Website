<?= $header ?>
<style>
	.card-img-top { width: 100%; height: 13rem; object-fit: fill; }
</style>
<div class="container">
	<h1 class="my-5 text-center">HOTEL LIST</h1>
	<?php foreach($hotel as $h) {?>
		<div class="card mb-3 p-0 col-12">
			<div class="row no-gutters">
				<div class="col-md-3 p-2 text-center align-middle">
					<img src="<?= base_url('assets/images/hotel/'. $h['gambar']) ?>" class="card-img-top img-fluid" alt="<?= $h['nama'] ?>" height="50px">
				</div>
				<div class="col-md-8">
					<div class="card-body">
						<a href="<?= base_url('index.php/hotel/detail/'.$h['id_hotel'])?>" style="text-decoration: none; color: black;">
							<h5 class="card-title"><?= $h['nama'] ?></h5>
						</a>
						<div class="mb-2" style="color: #FCB142; font-size: 1.2em;">
							<?php 
								$rating = $h['rating']/2;
								for ($i = 1; $i <= 5; $i++) {
									if (round($rating - .25 ) >= $i) echo "<i class='fa fa-star'></i>";
									else if (round($rating + .25 ) >= $i) echo "<i class='fa fa-star-half-alt'></i>"; 
									else echo "<i class='fa fa-star'></i>";
								}
							?>
						</div>
						<div class="card-text mb-1"><i class="fa fa-map-marker-alt"></i> <?= $h['kota'] ?></div>
						<div class="card-text mb-2"><i class="fa fa-tags"></i> Rp <?= number_format($h['harga'], 2) ?>/malam</div>
						
						<div class="row" style="width: fit-content;">
							<div class="col">
								<a href="<?= base_url('index.php/hotel/detail/'.$h['id_hotel'])?>" class="btn btn-warning">
									Detail Hotel
								</a>
							</div>
							<div class="col">
								<button class="btn btn-success">
									<i class="fa fa-plus"></i> Reservasi
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	<?php } ?>
</div>

<?= $footer ?>
