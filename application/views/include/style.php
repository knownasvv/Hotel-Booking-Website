<link rel="icon" type="image/png" href="<?= base_url('assets/images/logo/hoteloka_green.png')?>"/>
<link rel="stylesheet" href="<?= base_url('assets/bootstrap/bootstrap.min.css'); ?>"/>
<link rel="stylesheet" href="<?= base_url('assets/datatables/datatables.bootstrap4.min.css')?>"/>
<link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.css'); ?>"/>

<?php if(isset($crud)) 
	foreach ($crud['css_files'] as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
