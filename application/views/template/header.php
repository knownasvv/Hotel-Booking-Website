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
		body {
			background: #F5F5F5;
			max-width: 100%;
		}
		#welcome {
			color: #031926 !important;
			background: #9DBEBB !important; 
			cursor: context-menu;
		}
		#welcome:hover {
			color: #031926 !important;
			background: #9DBEBB !important; 
		}
		#welcome-split:hover {
			color: #77ACA2 !important;
			background: #F4E9CD !important; 
		}
		.dropdown-item:hover {
			color: #031926 !important;
			background: #F4E9CD;
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
				<?php if($_SESSION['salt'] == 'user') { ?>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('index.php/Hotel/Invoice')?>">Invoice</a>
					</li>
				<?php } ?>
				<li class="nav-item">
					<a class="nav-link" href="#">About Us</a>
				</li>
				<?php if($_SESSION['salt'] == 'admin') { ?>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('index.php/Admin_hotel/daftar_hotel') ?>">Admin_Hotel</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('index.php/Admin_hotel/daftar_pemesan') ?>">Admin_Pemesanan</a>
					</li>
				<?php } ?>
			</ul>
			<ul class="navbar-nav ml-auto">
				<?php if(!isset($_SESSION['salt'])) { ?>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('index.php/Login') ?>"><i class="fa fa-sign-in-alt"></i> Login</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('index.php/Register') ?>"><i class="fa fa-user-plus"></i> Sign Up</a>
					</li>
				<?php } else { ?>
					<div class="btn-group col-12 px-0">
						<li class="nav-item nav-link px-2 w-100" id="welcome"><small>Welcome, </small><?= ucwords($_SESSION['name']) ?></li>
						<button id="welcome-split" type="button" class="btn dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: #9DBEBB;">
							<span class="sr-only">Toggle Dropdown</span>
						</button>
						<div class="dropdown-menu p-0 " style="background: #9DBEBB;">
							<a class="dropdown-item nav-item nav-link py-2 pr-0 text-center" href="<?= base_url('index.php/Login/logout') ?>"><i class="fa fa-sign-out-alt"></i> Log Out</a>
						</div>
					</div>
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>
