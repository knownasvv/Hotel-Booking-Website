<?= $header ?>
<style>
	label{ text-align: left !important; }
	.card-header, .card-footer{ background: #77ACA2; color: #F5F5F5; }
	.btn-primary { background: #468189; color: #F5F5F5;  border-style: solid; border-color: #468189; }
	.btn-primary:hover { background: #F4E9CD; color: #031926;border-style: solid; border-color: #F4E9CD; }
	.left-side, .right-side{ background: #F4E9CD; border-radius: 0; }
	.form-control, .input-group-text { border: 0; box-shadow: none !important; background: #F4E9CD !important; cursor: context-menu; }
</style>
<div class="container my-5">

<?php if(!is_null($invoice)) {
foreach($invoice as $i) {
	foreach($hotel as $h) {
		if($h['id_hotel'] == $i['id_hotel']) {?>
<div class="card text-center mb-5">
	<div class="card-header">
		<h4 class="text-center"><small>INVOICE ID</small> <b><?= $i['id_invoice'] ?></b></h4>
		<span><b>Booking Date & Time</b> <?= $i['jam_dan_tanggal_booking'] ?></span>
	</div>
	<div class="card-body p-0">
		<div class="container">
			<div class="row">
				<div class="card col-lg-8 right-side pb-3 pt-4 px-5">
					<h5 class="mt-2 mb-3"><b>Data Formulir</b></h5><hr>
					<div class="form-group row">
						<?= form_label('Nama Lengkap', 'nama_lengkap_tamu', ['class'=>'col-md-4 col-form-label', 'style' => 'font-weight: bold;']); ?>
						<div class="col-md-8">
							<?= form_input([
								'name' => 'nama_lengkap_tamu', 
								'class'=>'form-control', 
								'value' => $i['nama_lengkap_tamu'],
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
				<div class="card col-lg-4 left-side p-3 pt-4 text-center align-middle">
					<h5 class=" mb-3"><b>Data Hotel</b></h5><hr>
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
<?php }}}} else { ?> DATA KOSONG <?php } ?>
</div>

<?= $footer ?>
