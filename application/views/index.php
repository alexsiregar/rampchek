<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/stylehome.css">
	<link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Teko" rel="stylesheet">

	<title><?= $title; ?></title>
</head>

<body>
	<!-- Navbar  -->

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
			<a class="navbar-brand" href="<?= base_url('/') ?>"><img src="<?= base_url(); ?>assets/img/logo.png" alt="" height="54x" /></a>
			<div>
				<h1>Terminal Giri Adipuro</h1>
				<h2>Kabupaten Wonogiri</h2>
			</div>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav ml-auto">
					<a class="text-white nav-item nav-link active" href="<?= base_url('/'); ?>">Beranda</a>
					<a class="text-white nav-item nav-link" href="<?= base_url('home/pengecekan'); ?>">Rampcheck</a>
					<a class="text-white nav-item nav-link" href="<?= base_url('home/laporan'); ?>">Data Rampcheck</a>
					<a class="text-white nav-item nav-link" href="<?= base_url('home/edit'); ?>">Profil</a>
					<a class="text-white nav-item nav-link" href="<?= base_url('auth/regulasi'); ?>">Regulasi</a>
					<a class="nav-item btn btn-primary" href="<?= base_url('auth/login'); ?>"><?php if ($this->session->userdata('email')) {
																																											echo "<p>" . $user['username'] . "</p>";
																																										} else echo '<p>Masuk</p>'  ?>
					</a>
				</div>
			</div>
		</div>
	</nav>

	<!-- Akhir navbar -->
	<!-- jumbotron -->
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h3>Selamat Datang di Aplikasi<br>
				Rampcheck Kendaraan </h3>
			<h2>Terminal Giri Adipura Kabupaten Wonogiri<br><a class="nav-item btn btn-primary <?php if ($this->session->userdata('email')) {
																																														echo 'd-none';
																																													} ?>" href="<?= base_url('auth/login'); ?>">Silahkan Masuk <i class="fas fa-user-circle"></i></a></h2>

		</div>
	</div>
	<!-- Site footer -->
	<footer class="site-footer">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<h6>About</h6>
					<p class="text-justify">Rampcheck <i>Kabupaten Wonogiri </i> adalah sebuah platform yang digunakan untuk melakukan pengecekan kelayakan jalan pada angkutan umum di Terminal Giri Adipuro Kabupaten Wonogiri.<br></p>
				</div>

				<div class="col-xs-6 col-md-3">
					<h6>Categories</h6>
					<ul class="footer-links">
						<li><a href="http://scanfcode.com/category/c-language/">C</a></li>
						<li><a href="http://scanfcode.com/category/front-end-development/">UI Design</a></li>
						<li><a href="http://scanfcode.com/category/back-end-development/">PHP</a></li>
						<li><a href="http://scanfcode.com/category/java-programming-language/">Java</a></li>
						<li><a href="http://scanfcode.com/category/android/">Android</a></li>
						<li><a href="http://scanfcode.com/category/templates/">Templates</a></li>
					</ul>
				</div>

				<div class="col-xs-6 col-md-3">
					<h6>Quick Links</h6>
					<ul class="footer-links">
						<li><a href="http://scanfcode.com/about/">About Us</a></li>
						<li><a href="http://scanfcode.com/contact/">Contact Us</a></li>
						<li><a href="http://scanfcode.com/contribute-at-scanfcode/">Contribute</a></li>
						<li><a href="http://scanfcode.com/privacy-policy/">Privacy Policy</a></li>
						<li><a href="http://scanfcode.com/sitemap/">Sitemap</a></li>
					</ul>
				</div>
			</div>
			<hr>
		</div>
		<div class="container">
			<div class="row">



			</div>
		</div>
	</footer>
	<div class="footer">
		<div class="row"></div>
		<p>Copyright © Rampcheck - 2021</p>
	</div>



	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/popper.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>