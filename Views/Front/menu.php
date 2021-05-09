<?php 
session_start();
	include "../../Controller/platC.php";

	$platC = new platC();
	$listePlats = $platC->afficherPlat();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Taste.it - Free Bootstrap 4 Template by Colorlib</title>
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
		<?php $page="Menu"; include "header.php"; ?>
	<!-- END header -->
	
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-2">
				<div class="col-md-7 text-center heading-section ftco-animate">
					<span class="subheading">Spécialités</span>
					<h2 class="mb-4">Notre Menu</h2>
				</div>
			</div>
			<div class="row">

			
<?php if ($platC->checkPlatWithCategorie("PETIT-DEJEUNER")): 
	?>
	

				<div class="col-md-6 col-lg-4">
					<div class="menu-wrap">
						<div class="heading-menu text-center ftco-animate">
							<h3>PETIT-DÉJEUNER</h3>
						</div>
<?PHP
					foreach ($listePlats as $row) {
						if ($row['type'] == "PETIT-DEJEUNER" ) {
				?>
						<div class="menus d-flex ftco-animate">

							<div class="menu-img img" style="background-image: url(images/<?PHP echo $row['photo']; ?>);"></div>
							 <div class="text">
								<div class="d-flex">
									<div class="one-half">
										<h3><?PHP echo $row['nom']; ?></h3>
									</div>
									
									<?php if ($row['pourcentage'] == null): ?>
									<div class="one-forth"  >
										<span class="price"> $ <?PHP echo $row['prix']; ?> </span>
									</div>
									<?php endif ?>
									<?php if ($row['pourcentage'] != null): ?>
									<div class="one-forth" >
										<span class="price" style="text-decoration: line-through;">
										
										 $ <?PHP echo $row['prix']; ?> 
										
									</span>
									<br>
									<span class="price">
											$ <?PHP echo
										 ($row['prix'] - ($row['prix']*$row['pourcentage'])/100); ?> 
										
										  </span>
								
									</div>

									
									<?php endif ?>
								
								</div>
								<p><span><?PHP echo $row['description']; ?></span></p>
							</div> 
							<a  href="commanderPlats.php?idPlat=<?PHP echo $row['idPlat']; ?>"><input id="bt" type="button" value="Commander" class="btn btn-white "></a>
						</div>

<?PHP
				}	}
?>
						
						<span class="flat flaticon-wine" style="left: 0;"></span>
						<span class="flat flaticon-wine-1" style="right: 0;"></span>
					</div>
				</div>

<?php endif ;
 if ($platC->checkPlatWithCategorie("DEJEUNER")):
?>

				<div class="col-md-6 col-lg-4">
					<div class="menu-wrap">
						<div class="heading-menu text-center ftco-animate">
							<h3>DÉJEUNER</h3>
						</div>
<?PHP
					foreach ($listePlats as $row) {
						if ($row['type']== "DEJEUNER" ) {
				?>
						<div class="menus d-flex ftco-animate">

							<div class="menu-img img" style="background-image: url(images/<?PHP echo $row['photo']; ?>);"></div>
							<div class="text">
								<div class="d-flex">
									<div class="one-half">
										<h3><?PHP echo $row['nom']; ?></h3>
									</div>

									<?php if ($row['pourcentage'] == null): ?>
									<div class="one-forth"  >
										<span class="price"> $ <?PHP echo $row['prix']; ?> </span>
									</div>
									<?php endif ?>

									<?php if ($row['pourcentage'] != null): ?>
									<div class="one-forth" >
										<span class="price" style="text-decoration: line-through;">
										
										 $ <?PHP echo $row['prix']; ?> 
										
									</span>
									<br>
									<span class="price">
											$ <?PHP echo
										 ($row['prix'] - ($row['prix']*$row['pourcentage'])/100); ?> 
										
										  </span>
								
									</div>
									<?php endif ?>
								
								</div>
								<p><span><?PHP echo $row['description']; ?></span></p>
							</div>
							<a  href="commanderPlats.php?idPlat=<?PHP echo $row['idPlat']; ?>"><input id="bt" type="button" value="Commander" class="btn btn-white "></a>
						</div>

<?PHP
				}	}
?>
						
						<span class="flat flaticon-wine" style="left: 0;"></span>
						<span class="flat flaticon-wine-1" style="right: 0;"></span>
					</div>
				</div>

<?php endif ;
 if ($platC->checkPlatWithCategorie("DINER")):
?>

				<div class="col-md-6 col-lg-4">
					<div class="menu-wrap">
						<div class="heading-menu text-center ftco-animate">
							<h3>DINER</h3>
						</div>
<?PHP
					foreach ($listePlats as $row) {
						if ($row['type'] == "DINER" ) {
				?>
						<div class="menus d-flex ftco-animate">

							<div class="menu-img img" style="background-image: url(images/<?PHP echo $row['photo']; ?>);"></div>
							<div class="text">
								<div class="d-flex">
									<div class="one-half">
										<h3><?PHP echo $row['nom']; ?></h3>
									</div>

									<?php if ($row['pourcentage'] == null): ?>
									<div class="one-forth"  >
										<span class="price"> $ <?PHP echo $row['prix']; ?> </span>
									</div>
									<?php endif ?>

									<?php if ($row['pourcentage'] != null): ?>
									<div class="one-forth" >
										<span class="price" style="text-decoration: line-through;">
										
										 $ <?PHP echo $row['prix']; ?> 
										
									</span>
									<br>
									<span class="price">
											$ <?PHP echo
										 ($row['prix'] - ($row['prix']*$row['pourcentage'])/100); ?> 
										
										  </span>
								
									</div>
									<?php endif ?>
								
								</div>
								<p><span><?PHP echo $row['description']; ?></span></p>
							</div> 
							<a  href="commanderPlats.php?idPlat=<?PHP echo $row['idPlat']; ?>"><input id="bt" type="button" value="Commander" class="btn btn-white "></a>
						</div>

<?PHP
				}	}
?>
						
						<span class="flat flaticon-wine" style="left: 0;"></span>
						<span class="flat flaticon-wine-1" style="right: 0;"></span>
					</div>
				</div>
<?php endif ;
 if ($platC->checkPlatWithCategorie("DESSERTS")):
?>

				<div class="col-md-6 col-lg-4">
					<div class="menu-wrap">
						<div class="heading-menu text-center ftco-animate">
							<h3>DESSERT</h3>
						</div>
<?PHP
					foreach ($listePlats as $row) {
						if ($row['type'] == "DESSERTS" ) {
				?>
						<div class="menus d-flex ftco-animate">

							<div class="menu-img img" style="background-image: url(images/<?PHP echo $row['photo']; ?>);"></div>
							<div class="text">
								<div class="d-flex">
									<div class="one-half">
										<h3><?PHP echo $row['nom']; ?></h3>
									</div>

									<?php if ($row['pourcentage'] == null): ?>
									<div class="one-forth"  >
										<span class="price"> $ <?PHP echo $row['prix']; ?> </span>
									</div>
									<?php endif ?>

									<?php if ($row['pourcentage'] != null): ?>
									<div class="one-forth" >
										<span class="price" style="text-decoration: line-through;">
										
										 $ <?PHP echo $row['prix']; ?> 
										
									</span>
									<br>
									<span class="price">
											$ <?PHP echo
										 ($row['prix'] - ($row['prix']*$row['pourcentage'])/100); ?> 
										
										  </span>
								
									</div>
									<?php endif ?>
								
								</div>
								<p><span><?PHP echo $row['description']; ?></span></p>
							</div>
							<a  href="commanderPlats.php?idPlat=<?PHP echo $row['idPlat']; ?>"><input id="bt" type="button" value="Commander" class="btn btn-white "></a>
						</div>

<?PHP
				}	}
?>
						
						<span class="flat flaticon-wine" style="left: 0;"></span>
						<span class="flat flaticon-wine-1" style="right: 0;"></span>
					</div>
				</div>

<?php endif ;
 if ($platC->checkPlatWithCategorie("BOISSONS et THE")):
?>
				<div class="col-md-6 col-lg-4">
					<div class="menu-wrap">
						<div class="heading-menu text-center ftco-animate">
							<h3>BOISSONS ET THE</h3>
						</div>
<?PHP
					foreach ($listePlats as $row) {
						if ($row['type'] == "BOISSONS et THE" ) {
				?>
						<div class="menus d-flex ftco-animate">

							<div class="menu-img img" style="background-image: url(images/<?PHP echo $row['photo']; ?>);"></div>
							<div class="text">
								<div class="d-flex">
									<div class="one-half">
										<h3><?PHP echo $row['nom']; ?></h3>
									</div>

									<?php if ($row['pourcentage'] == null): ?>
									<div class="one-forth"  >
										<span class="price"> $ <?PHP echo $row['prix']; ?> </span>
									</div>
									<?php endif ?>

									<?php if ($row['pourcentage'] != null): ?>
									<div class="one-forth" >
										<span class="price" style="text-decoration: line-through;">
										
										 $ <?PHP echo $row['prix']; ?> 
										
									</span>
									<br>
									<span class="price">
											$ <?PHP echo
										 ($row['prix'] - ($row['prix']*$row['pourcentage'])/100); ?> 
										
										  </span>
								
									</div>
									<?php endif ?>
								
								</div>
								<p><span><?PHP echo $row['description']; ?></span></p>
							</div>
							<a  href="commanderPlats.php?idPlat=<?PHP echo $row['idPlat']; ?>"><input id="bt" type="button" value="Commander" class="btn btn-white "></a>
						</div>

<?PHP
				}	}
?>
						
						<span class="flat flaticon-wine" style="left: 0;"></span>
						<span class="flat flaticon-wine-1" style="right: 0;"></span>
					</div>
				</div>

				<?php endif; ?>
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
		<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script> -->
		<!--<script src="js/google-map.js"></script> -->
		<script src="js/main.js"></script>
		
	</body>
	</html>