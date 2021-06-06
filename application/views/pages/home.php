<?= $header ?>

<div class="container">
	<h1 class="my-5 text-center">Hotels</h1>
	<?php foreach($hotel as $h) {?>
		<div class="card mb-3 p-0 col-12">
			<div class="row">
				<div class="col-md-3">
					<img src="<?= base_url('assets/images/profile/veren.png') ?>" class="card-img img-fluid" alt="...">
				</div>
				<div class="col-md-8">
					<div class="card-body">
						<a href="<?= base_url('index.php/hotel/detail/'.$h['id_hotel'])?>" style="text-decoration: none; color: black;">
							<h5 class="card-title"><?= $h['nama'] ?></h5>
						</a>
						<p class="card-text"><small class="text-muted"><?= $h['lokasi'] ?></small></p>
						<p class="card-text">Rp <?= number_format($h['harga'], 2) ?>/malam</p>
						<div class="row" style="width: fit-content;">
							<!-- <div class="col">
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
							</div> -->
							<div class="col">
								<a href="<?= base_url('index.php/hotel/detail/'.$h['id_hotel'])?>" class="btn btn-warning">
									Detail Hotel
								</a>
							</div>
							<div class="col">
								<button class="btn btn-success">
									Book Now
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
