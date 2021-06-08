<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $title ?></title>
	<?= $style ?>
	<style>
		.nav-link{
			color: #F4E9CD !important;
			text-transform: uppercase;
			font-size: 0.9rem;
			font-weight: bold;
		}
		.nav-item:hover { background: #F4E9CD !important;}
		.nav-link:hover { color: #77ACA2 !important;}
		.navbar-toggler{
			background: #F4E9CD;
			border: 0;
		}
	</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background: #468189;">
	<div class="container">
		<a class="navbar-brand" href="<?= base_url() ?>"><img src="<?= base_url('assets/images/logo/hoteloka_white.png')?>" alt="Hoteloka" height="55rem"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="<?= base_url() ?>">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Reservasi</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">About Us</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('index.php/Admin_hotel/daftar_hotel') ?>">Admin_Hotel</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('index.php/Admin_hotel/daftar_pemesan') ?>">Admin_Pemesanan</a>
				</li>
			</ul>
			<ul class="nav navbar-nav justify-content-end">
					<?php if (isset($_SESSION['name'])) { ?>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle  a-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
								<ul class="list-inline">
									<li class="list-inline-item" style="text-transform: none;"><small>Welcome,</small></li>
									<li class="list-inline-item"><?= ucwords($_SESSION['name']) ?></li>
								</ul>
							</a>
							<div class="dropdown-menu p-0">
								<a class="dropdown-item a-effect text-dark px-0 py-2" href="<?php echo base_url("index.php/Login/logout") ?>">Log Out</a>
							</div>
						</li>
					<?php } else { ?>
						<li class="nav-item">
							<a class="nav-link a-effect" href="<?php echo base_url("index.php/login") ?>">Login</a>
						</li>
						<li class="nav-item">
							<a class="nav-link a-effect" href="<?php echo base_url("index.php/register") ?>">Sign Up</a>
						</li>
					<?php } ?>
				</ul>
		</div>
	</div>
</nav>
