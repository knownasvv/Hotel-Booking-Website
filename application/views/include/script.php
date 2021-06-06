<script src="<?= base_url('assets/js/jquery-3.3.1.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/popper.min.js'); ?>"></script>
<script src="<?= base_url('assets/bootstrap/bootstrap.min.js'); ?>"></script>
<script src="<?= base_url('assets/datatables/datatables.bootstrap4.min.js')?>"></script>

<?php if(isset($crud)) foreach ($crud['js_files'] as $file): ?>
	<script src="<?php echo $file; ?>" > </script>
<?php endforeach; ?>
