<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cuisinet</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/animate.css">
	
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">

	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="css/jquery.timepicker.css">

	
	<link rel="stylesheet" href="css/flaticon.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

	<!-- header -->
		<?php $page="Accueil"; include "header.php"; ?>
	<!-- END header -->

	<section class="hero-wrap">
		<div class="home-slider owl-carousel js-fullheight">
			<div class="slider-item js-fullheight" style="background-image:url(images/bg_1.jpg);">
				<div class="overlay"></div>
				<div class="container">
					<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
						<div class="col-md-12 ftco-animate">
							<div class="text w-100 mt-5 text-center">
								<span class="subheading">Restaurant Cuisinet</h2></span>
								<h1>Cuisine Depuis</h1>
								<span class="subheading-2">2021</span>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="slider-item js-fullheight" style="background-image:url(images/bg_2.jpg);">
				<div class="overlay"></div>
				<div class="container">
					<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
						<div class="col-md-12 ftco-animate">
							<div class="text w-100 mt-5 text-center">
								<span class="subheading">Restaurant Cuisinet</h2></span>
								<h1>Meilleure Qualité</h1>
								<span class="subheading-2 sub">Nourritures</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<section class="ftco-section ftco-intro" style="background-image: url(images/bg_3.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row ">
				<div class="col-md-12 text-center heading-section ftco-animate">
					<span>RÉSERVEZ MAINTENANT</span>
					<h2>Dîners privés &amp; Heures heureuses</h2>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section ftco-no-pt ftco-no-pb mt-5">
		<div class="container">
			<div class="row d-flex">
				<div class="col-md-6 d-flex">
					<div class="img img-2 w-100 mr-md-2" style="background-image: url(images/bg_6.jpg);"></div>
					<div class="img img-2 w-100 ml-md-2" style="background-image: url(images/bg_4.jpg);"></div>
				</div>
				<div class="col-md-6 ftco-animate makereservation p-4 p-md-5">
					<div class="heading-section ftco-animate mb-5">
						<span class="subheading">Ce sont nos secrets</span>
						<h2 class="mb-4">Plats parfaits et bon service</h2>
						<p>Nous utilisons de nombreux ingrédients exquis et rares dans nos plats et faisons en sorte que le client se sente comme chez lui
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section bg-light">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-2">
				<div class="col-md-7 text-center heading-section ftco-animate">
					<span class="subheading">Notre restaurant</span>
					<h2 class="mb-4">Photos de notre restaurant</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 ftco-animate">
					<div class="blog-entry">
						<div class="block-20" style="background-image: url('images/image_1.jpg');">
						</div>
					</div>
				</div>
				<div class="col-md-4 ftco-animate">
					<div class="blog-entry">
					<div href="blog-single.html" class="block-20" style="background-image: url('images/image_2.jpg');">
						</div>
					</div>
				</div>
				<div class="col-md-4 ftco-animate">
					<div class="blog-entry">
						<div href="blog-single.html" class="block-20" style="background-image: url('images/image_3.jpg');">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/bg_4.jpg);" data-stellar-background-ratio="0.5">
		<div class="container">
		<div class="row d-md-flex align-items-center justify-content-center">
		<div class="col-lg-10">
			<div class="row d-md-flex align-items-center">
			<div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
				<div class="block-18">
				<div class="text">
					<strong class="number" data-number="100">0</strong>
					<span>Plats délicieux</span>
				</div>
				</div>
			</div>
			<div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
				<div class="block-18">
				<div class="text">
					<strong class="number" data-number="30">0</strong>
					<span>Tables</span>
				</div>
				</div>
			</div>
			<div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
				<div class="block-18">
				<div class="text">
					<strong class="number" data-number="10000">0</strong>
					<span>Clients satisfaits</span>
				</div>
				</div>
			</div>
			</div>
		</div>
		</div>
		</div>
	</section>


	<section class="ftco-section ftco-no-pt ftco-no-pb ftco-intro bg-primary">
		<div class="container py-5">
			<div class="row py-2">
				<div class="col-md-12 text-center">
					<h2>Nous fabriquons &amp; des aliments délicieux et nutritifs</h2>
				</div>
			</div>
		</div>
	</section>

	<!-- footer -->
		<?php require_once "footer.php"; ?>				
	<!-- END footer -->


	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-migrate-3.0.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/jquery.animateNumber.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/jquery.timepicker.min.js"></script>
	<script src="js/scrollax.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
	<script src="js/google-map.js"></script>
	<script src="js/main.js"></script>
		
	</body>
	</html>