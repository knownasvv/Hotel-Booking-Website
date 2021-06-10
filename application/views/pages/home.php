<?= $header ?>
<style>
	.card-header, .card-footer, .modal-header, .modal-footer{ background: #77ACA2; color: #F5F5F5; }
	#big-body, .modal-body { background: #F4E9CD;}
	.card-img-top { width: 100%; height: 13rem; object-fit: fill; cursor: pointer;}
	#hotels { background: #77ACA2; color: white !important; border-radius: 0 }
	#hotels .card-title { color: white; font-weight: bold;}
	.buttons{ background: #9DBEBB; color: #031926; height: 100%; border-radius: 0; }
	#reservasi{ border-bottom: 2px solid #77ACA2; }
	.buttons:hover{ background: #468189; color: #F5F5F5; }
	.fa-tags, .fa-map-marker-alt{ color: #031926; }
	#all { background: #9DBEBB; }
</style>
<div class="container">
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Filter Hotel</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php echo form_open('hotel')?>
					<div class="form-group row">
                        <label class="col-sm-3 col-form-label">Harga Tertinggi :</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control"  name="harga1" placeholder="Harga">
                        </div>
                    </div>
					<div class="form-group row">
                        <label class="col-sm-3 col-form-label">Harga Termurah :</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control"  name="harga2" placeholder="Harga">
                        </div>
                    </div>
					<div class="form-group row">
                        <label class="col-sm-3 col-form-label">Lokasi :</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control"  name="lokasi" placeholder="Lokasi">
                        </div>
                    </div>
					<div class="form-group row">
                        <label class="col-sm-3 col-form-label">Bintang :</label>
                        <div class="col-sm-9">
							<select name="bintang">
								<option value="0">0</option>
								<option value="2">1</option>
								<option value="4">2</option>
								<option value="6">3</option>
								<option value="8">4</option>
								<option value="10">5</option>
							</select>
                        </div>
                    </div>
			</div>
			<div class="modal-footer">
					<button type="submit" class="btn btn-success">Search</button>
					<?php echo form_close()?>
			</div>
			</div>
		</div>
	</div>
	<div class="card my-5" id="all">
		<div class="card-header">
			<h1 class="my-2 text-center" style="color: #F4E9CD;">HOTEL LIST</h1>
		</div>
		<div class="card-body pb-0 px-0" id="big-body">
			<?php echo form_open('hotel')?>
				<div class="container">
					<div class="row justify-content-center no-gutters">
						<div class="col-lg-6 col-md-12">
							<input type="text" name="cari" class="form-control" placeholder="Search Hotel">
						</div>
						<div class="col-lg-2 col-md-4">
							<button type="submit" class="btn btn-primary w-100">
								<i class="fa fa-search"></i> Search
							</button>
						</div>
						<div class="col-lg-2 col-md-4">
							<button type="button" class="btn btn-warning w-100" data-toggle="modal" data-target="#myModal">
								<i class="fa fa-filter"></i> Filter
							</button>
						</div>
						<div class="col-lg-2 col-md-4">
							<a class="btn btn-danger w-100" href="<?= base_url() ?>">
								<i class="fa fa-times"></i> Reset
							</a>
						</div>
					</div>
				</div>
			<?php echo form_close()?>
		</div>
		<div class="card-body p-3 pt-0" id="big-body">
			<?php foreach($hotel as $h) {?>
				<div class="card mb-2 p-0 col-12" id="hotels">
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
						<div class="col-md-3 card-body py-0" >
							<a href="<?= base_url('index.php/Hotel/Booking/'. $h['id_hotel']) ?>">
								<button id="reservasi" class="btn buttons w-100 h-50">
									<h5><i class="fa fa-plus"></i> Booking</h5>
								</button>
							</a>
							<a href="<?= base_url('index.php/Hotel/Detail/'. $h['id_hotel']) ?>">
								<button id="detail" class="btn buttons w-100 h-50">
									<h5><i class="fa fa-search"></i> Detail</h5>
								</button>
							</a>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
<script src="<?= base_url('assets/js/jquery-3.3.1.min.js'); ?>"></script>
<script>
	$('.card-img-top').click(function() {
		window.location.href = "<?= base_url('index.php/hotel/detail/'.$h['id_hotel']) ?>";
	});
</script>
<?= $footer ?>
