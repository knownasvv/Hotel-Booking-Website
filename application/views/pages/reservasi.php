<?= $header ?>
<style>
	body { overflow-x: hidden; }
	.card-header, .card-footer{ background: #77ACA2; color: #F5F5F5; }
	.card-body { background: #F4E9CD; color: #031926; }
	.btn-primary {
		background: #468189; color: #F5F5F5; 
		border-style: solid;
		border-color: #468189;
	}
	.btn-primary:hover {
		background: #F4E9CD;
		color: #031926;border-style: solid;
		border-color: #F4E9CD;
	}
	.btn-warning {
		background: #F4E9CD;
		color: #031926;border-style: solid;
		border-color: #F4E9CD;
	}
	.btn-warning:hover {
		background: #468189; color: #F5F5F5; 
		border-style: solid;
		border-color: #468189;
	}
</style>

<div class="container-fluid p-5">
	<div class="row px-5 pb-5">
		<div class="col-lg-4 col-md-12">
		<?php $id_hotel = '';
		foreach($hotel as $h) { $id_hotel = $h['id_hotel']; ?>
			<div class="card">
				<div class="card-header">
					<a href="<?= base_url('index.php/hotel/detail/'.$id_hotel)?>" class="btn float-left btn-warning mr-1"><i class="fa fa-search"></i> Detail</a>
					<h5 class="text-center"><?= $h['nama'] ?></h5>
				</div>
				<div class="card-body p-0">
					<img src="<?= base_url('assets/images/hotel/'. $h['gambar']) ?>" class="card-img-top img-fluid" alt="<?= $h['nama'] ?>" height="50px">
					<div class="container py-3">
						<p class="card-text"><i class="fa fa-map-marker-alt"></i> <?= $h['alamat'] ?>, <?= $h['kota']?></p>
						<p class="card-text"><i class="fa fa-tags"></i> <span style="font-size: 1.5rem;">Rp <?= number_format($h['harga'], 2) ?></span> <small>PER NIGHT</small></p>
						
					</div>
				</div>
				<div class="card-footer text-center">
					<p class="card-text">Tersedia <b><?= $h['jumlah_kamar'] ?></b> kamar.</p>
				</div>
			</div>
		<?php } ?>
		</div>
		<div class="col-lg-8 col-md-12">
			<div class="card">
				<h4 class="card-header text-center py-3">Formulir Booking Hotel</h4>
				<div class="card-body m-0">
					<?= form_open_multipart('hotel/validate_booking/'. $id_hotel); ?>
					<!-- Nama Lengkap Tamu -->
					<div class="form-group row">
						<?= form_label('Nama Lengkap', 'nama_lengkap', ['class'=>'col-md-3 col-form-label', 'style' => 'font-weight: bold;']); ?>
						<div class="col-md-9">
							<?= form_input([
								'name' => 'nama_lengkap', 
								'class'=>'form-control', 
								'id' => 'nama_lengkap', 
								'placeholder' => 'Nama Lengkap',
								'value' => set_value('nama_lengkap')]); ?>
							<?= form_error('nama_lengkap');?>
						</div>
					</div>

					<!-- Nomor Telepon Tamu -->
					<div class="form-group row">
						<?= form_label('Nomor Telepon', 'nomor_telepon', ['class'=>'col-md-3 col-form-label', 'style' => 'font-weight: bold;']); ?>
						<div class="col-lg-5 col-md-6 col-sm-12">
							<?= form_input([
								'name' => 'nomor_telepon', 
								'class'=>'form-control', 
								'id' => 'nomor_telepon', 
								'placeholder' => 'Nomor Telepon',
								'value' => set_value('nomor_telepon')]); ?>
							<?= form_error('nomor_telepon');?>
						</div>
					</div>

					<!-- Email Tamu -->
					<div class="form-group row">
						<?= form_label('Email', 'email', ['class'=>'col-md-3 col-form-label', 'style' => 'font-weight: bold;']); ?>
						<div class="col-md-9">
							<?= form_input([
								'name' => 'email', 
								'type' => 'email',
								'class'=>'form-control ', 
								'id' => 'email', 
								'placeholder' => 'Email',
								'value' => set_value('email')]); ?>
							<?= form_error('email');?>
						</div>
					</div>

					<!-- Jumlah Kamar -->
					<div class="form-group row">
						<?=  form_label('Jumlah Kamar', 'jumlah_kamar', ['class'=>'col-md-3 col-form-label', 'style' => 'font-weight: bold;']); ?>
						<div class="col-lg-5 col-md-6 col-sm-12">
							<?= form_input([
								'name' => 'jumlah_kamar', 
								'type'=>'number', 
								'class'=>'form-control ', 
								'id' => 'jumlah_kamar', 
								'placeholder' => 'Jumlah Kamar',
								'value' => set_value('jumlah_kamar')]); ?>
							<?= form_error('jumlah_kamar');?>
						</div>
					</div>
					
					<!-- Tanggal Check-in -->
					<div class="form-group row">
						<?= form_label('Tanggal Check-in', 'tgl_check_in', ['class'=>'col-md-3 col-form-label', 'style' => 'font-weight: bold;']); ?>
						<div class="col-lg-5 col-md-6 col-sm-12">
							<?= form_input([
								'name' => 'tgl_check_in', 
								'type' => 'date',
								'class'=>'form-control ', 
								'id' => 'tgl_check_in', 
								'placeholder' => 'Tanggal Check-in',
								'value' => set_value('tgl_check_in')]); ?>
							<?= form_error('tgl_check_in');?>
						</div>
					</div>

					<!-- Tanggal Check-out -->
					<div class="form-group row">
						<?= form_label('Tanggal Check-out', 'tgl_check_out', ['class'=>'col-md-3 col-form-label', 'style' => 'font-weight: bold;']); ?>
						<div class="col-lg-5 col-md-6 col-sm-12">
							<?= form_input([
								'name' => 'tgl_check_out', 
								'type' => 'date',
								'class'=>'form-control ', 
								'id' => 'tgl_check_out', 
								'placeholder' => 'Tanggal Check-out',
								'value' => set_value('tgl_check_out')]); ?>
							<?= form_error('tgl_check_out');?>
						</div>
					</div>

					<!-- Harga -->
					<div class="form-group row">
						<?= form_label('Harga', 'harga', ['class'=>'col-md-3 col-form-label', 'style' => 'font-weight: bold;']); ?>
						<div class="input-group col-md-6 col-sm-12">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1">Rp</span>
							</div>
							<?= form_input([
								'name' => 'harga', 
								'class'=>'form-control', 
								'id' => 'harga', 
								'placeholder' => 'Harga',
								'readonly' => 'readonly',
								'value' => 0]); ?>
						</div>
					</div>
				</div>
				<!-- BUTTON  -->
				<div class="form-group text-center card-footer m-0">
					<button type="submit" id="submit" class="btn btn-primary">
						<i class="fa fa-check"></i> Booking
					</button>
					<a class="btn btn-danger" href="<?= base_url(); ?>"><i class="fa fa-times"></i> Cancel</a>
				</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
<script src="<?= base_url('assets/js/jquery-3.3.1.min.js'); ?>"></script>
<script>
	$(document).ready(function(){
		tgl_check_out = new Date($('#tgl_check_out').val()).getTime();
		tgl_check_in = new Date($('#tgl_check_in').val()).getTime();
		if(tgl_check_out > tgl_check_in) diffDays = Math.abs((tgl_check_out - tgl_check_in) / (1000 * 3600 * 24));	
		else diffDays = 1;
		// alert("Tgl Check Out : " + tgl_check_out + "\nTgl Check In : " + tgl_check_in + "\nDiffDays : " + diffDays);

		total = $('#jumlah_kamar').val() * <?= $hotel[0]['harga'] ?> * diffDays;

		$('#harga').val(formatCurrency(total));

		$('#harga').on('change keyup paste', function(){
			alert("Hello");
			$("#harga").val($('#jumlah_kamar').val());
		});
	});

	function formatCurrency(total) {
		var neg = false;
		if(total < 0) {
			neg = true;
			total = Math.abs(total);
		}
		return (neg ? "-" : '') + parseFloat(total, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString();
	}
</script>
<?= $footer ?>
