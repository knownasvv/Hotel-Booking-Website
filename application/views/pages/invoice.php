<?= $header ?>
<style>
	label{ text-align: left !important; }
	.card-header, .card-footer{ background: #77ACA2; color: #F5F5F5; }
	.btn-primary { background: #468189; color: #F5F5F5;  border-style: solid; border-color: #468189; }
	.btn-primary:hover { background: #F4E9CD; color: #031926;border-style: solid; border-color: #F4E9CD; }
	.left-side, .right-side{ background: #F4E9CD; border-radius: 0; }
	.form-control, .input-group-text { border: 0; box-shadow: none !important; background: #F4E9CD !important; cursor: context-menu; }

	.panel-body { border-top-left-radius : 0; border-top-right-radius : 0; border: 0;}

	a:hover, a:focus { text-decoration: none; outline: none; } 
	#accordion .panel { border: none; border-radius: 5px; box-shadow: none; margin-bottom: 5px; } 
	#accordion .panel-heading { padding: 0; border: none; border-radius: 5px 5px 0 0; } 
	#accordion .panel-title a { display: block; padding: 20px 30px; background: #77ACA2; font-size: 17px; font-weight: bold; letter-spacing: 1px; color: #F4E9CD; border: 1px solid #F4E9CD; border-radius: 5px 5px 0 0; position: relative; vertical-align: middle; } #accordion .panel-title a.collapsed { border-color: #e0e0e0; border-radius: 5px; } #accordion .panel-title a:before, #accordion .panel-title a.collapsed:before, #accordion .panel-title a:after, #accordion .panel-title a.collapsed:after { content: "\f103"; font-family: "Font Awesome 5 Free"; font-weight: 900; width: 30px; height: 30px; line-height: 30px; border-radius: 5px; background: #F4E9CD; font-size: 20px; color: #77ACA2; text-align: center; position: absolute; top: 15px; right: 30px; opacity: 1; transform: scale(1); transition: all 0.3s ease 0s; } 
	#accordion .panel-title a:after, #accordion .panel-title a.collapsed:after { content: "\f101"; opacity: 0; transform: scale(0); }
	#accordion .panel-title a.collapsed:before { opacity: 0; transform: scale(0); } 
	#accordion .panel-title a.collapsed:after { opacity: 1; transform: scale(1); }
	#accordion .panel-body { margin: 0; padding: 0; border-top: none; font-size: 15px; line-height: 28px; letter-spacing: 1px; border-radius: 0 0 5px 5px; }

</style>
<div class="container my-5">
<h1 class="my-5 text-center">INVOICES LIST</h1>

<?php if(!is_null($invoice) && count($invoice) > 0) {
	$index = 1;
foreach($invoice as $i) {
	foreach($hotel as $h) {
		if($h['id_hotel'] == $i['id_hotel']) {?>
			<div class="panel-group container" id="accordion" role="tablist" aria-multiselectable="true">
				<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="heading<?php echo $index; ?>">
						<h4 class="panel-title text-left m-0">
							<a role="button" data-toggle="collapse" data-parent="#accordion" href="#<?php echo "acc".$index; ?>" aria-expanded="false" aria-controls="<?php echo "acc".$index; ?>">
								<b style="text-transform: uppercase;">#<?= $index; ?> Booking Date-Time:</b> <?= date_format(date_create($i['jam_dan_tanggal_booking']), DATE_COOKIE) ?>
							</a>
						</h4>
					</div>
					<div id="<?php echo "acc".$index; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $index; ?>">
						<div class="panel-body m-0 p-0 card text-center justify-content-center">
							<div class="card-body p-0 m-0">
								<div class="container">
									<div class="row">
										<div class="card col-lg-8 right-side p-4">
											<h5 class="mt-2 mb-3"><b>Data Formulir</b></h5><hr>
											<div class="form-group row">
												<?= form_label('ID Invoice', 'id_invoice', ['class'=>'col-md-4 col-form-label', 'style' => 'font-weight: bold;']); ?>
												<div class="col-md-8">
													<?= form_input([
														'name' => 'id_invoice', 
														'class'=>'form-control', 
														'value' => $i['id_invoice'],
														'readonly' => 'readonly']); ?>
												</div>
											</div>
											<div class="form-group row">
												<?= form_label('Nomor Telepon', 'notelp_tamu', ['class'=>'col-md-4 col-form-label', 'style' => 'font-weight: bold;']); ?>
												<div class="col-md-8">
													<?= form_input([
														'name' => 'notelp_tamu', 
														'class'=>'form-control', 
														'value' => $i['notelp_tamu'],
														'readonly' => 'readonly']); ?>
												</div>
											</div>
											<div class="form-group row">
												<?= form_label('Email', 'email_tamu', ['class'=>'col-md-4 col-form-label', 'style' => 'font-weight: bold;']); ?>
												<div class="col-md-8">
													<?= form_input([
														'name' => 'email_tamu', 
														'class'=>'form-control', 
														'value' => $i['email_tamu'],
														'readonly' => 'readonly']); ?>
												</div>
											</div>
											<div class="form-group row">
												<?= form_label('Jumlah Kamar', 'jumlah_kamar', ['class'=>'col-md-4 col-form-label', 'style' => 'font-weight: bold;']); ?>
												<div class="col-md-8">
													<?= form_input([
														'name' => 'jumlah_kamar', 
														'class'=>'form-control', 
														'value' => $i['jumlah_kamar'],
														'readonly' => 'readonly']); ?>
												</div>
											</div>
											<div class="form-group row">
												<?= form_label('Tanggal Check-in', 'tanggal_check_in', ['class'=>'col-md-4 col-form-label', 'style' => 'font-weight: bold;']); ?>
												<div class="col-md-8">
													<?= form_input([
														'name' => 'tanggal_check_in', 
														'class'=>'form-control', 
														'type' => 'date',
														'value' => $i['tanggal_check-in'],
														'readonly' => 'readonly']); ?>
												</div>
											</div>
											<div class="form-group row">
												<?= form_label('Tanggal Check-out', 'tanggal_check_out', ['class'=>'col-md-4 col-form-label', 'style' => 'font-weight: bold;']); ?>
												<div class="col-md-8">
													<?= form_input([
														'name' => 'tanggal_check_out', 
														'class'=>'form-control', 
														'type' => 'date',
														'value' => $i['tanggal_check-out'],
														'readonly' => 'readonly']); ?>
												</div>
											</div>
											<div class="form-group row">
												<?= form_label('Harga', 'harga', ['class'=>'col-md-4 col-form-label', 'style' => 'font-weight: bold;']); ?>
												<div class="input-group col-8">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1">Rp</span>
													</div>
													<?= form_input([
														'name' => 'harga', 
														'class'=>'form-control', 
														'readonly' => 'readonly',
														'value' => number_format($i['harga'],2)]); ?>
												</div>
											</div>
										</div>
										<div class="card col-lg-4 left-side p-4">
											<h5 class="mt-2 mb-3"><b>Data Hotel</b></h5><hr>
											<p class="card-text"><i class="fa fa-map-marker-alt"></i> <?= $h['alamat'] ?>, <?= $h['kota']?></p>
											<p class="card-text"><i class="fa fa-tags"></i> <span style="font-size: 1.5rem;">Rp <?= number_format($h['harga'], 2) ?></span> <small>PER NIGHT</small></p>
											<p class="card-text">Tersedia <?= $h['jumlah_kamar'] ?> kamar.</p>
											<div class="mb-2" style="color: #468189; font-size: 1.2em;">
												<?php 
													$rating = $h['rating']/2;
													for ($int = 1; $int <= 5; $int++) {
														if (round($rating - .25 ) >= $int) echo "<i class='fa fa-star'></i>";
														else if (round($rating + .25 ) >= $int) echo "<i class='fa fa-star-half-alt'></i>"; 
														else echo "<i class='fa fa-star'></i>";
													}
													echo " <b>" . $h['rating'] ."</b>";
												?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
<?php $index++; 
	}}}} else { ?> 
			<div class="bg-white"><a href='<?php if(isset($deleteItem)) echo base_url(); else echo 'javascript:history.go(-1)';?>'><button class='btn btn-outline-danger w-100'><h5><b>Anda belum melakukan reservasi (booking) hotel. </b></h5>Tekan tombol ini untuk kembali.</button></a></div>
	<?php } ?>
</div>

<?= $footer ?>
