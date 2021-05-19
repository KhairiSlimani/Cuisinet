
<?php
session_start();



include_once '../../Controller/clientC.php';
include_once '../../Model/clients.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cuisinet - Profil</title>
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
        <?php $page="Profil"; include "header.php"; ?>
	<!-- END header -->
	
	<section class="ftco-section ftco-wrap-about ftco-no-pb ftco-no-pt">
		<div class="container">
			<div class="row no-gutters">
				<div class="col-sm-4 p-4 p-md-5 d-flex align-items-center justify-content-center bg-primary">
					<?PHP

						$clientC = new clientC();
						$client = $clientC->recupererClient($_SESSION['id']);

					?>


					<form id="ff" action="includes/logoutinc.php" class="appointment-form" method="">
						<h3 class="mb-3">PROFIL <?php $i = $client['idAdmin']; if ($i != 0) {echo "(Créer par l'admin de l'ID: $i)";} ?></h3>
						<div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="name" name="username" class="form-control" value="<?PHP echo $client['username']; ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="password" class="form-control" value="<?PHP echo $client['password']; ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" value="<?PHP echo $client['email']; ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="phone" class="form-control" value="<?PHP echo $client['phone']; ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-12">
								<div class="form-group">
									<a href="modifierProfil.php?id=<?PHP echo $client['id']; ?>"><input id="bt" type="button" value="Modifier les informations" class="btn btn-white py-3 px-4"></a>
								</div>
							</div>

                            <div class="col-md-12">
								<div class="form-group">
									<input id="logout" type="submit" href="index.php" value="Logout" name="logout" class="btn btn-white py-3 px-4">
								</div>
							</div>

						</div>
					</form>
  				</div>
  				<div class="col-sm-8 wrap-about py-5 ftco-animate img" style="background-image: url(images/about.jpg);">
  					<div class="row pb-5 pb-md-0">
  						<div class="col-md-12 col-lg-7">
  							<div class="heading-section mt-5 mb-4">
  								<div class="pl-lg-3 ml-md-5">
  									<span class="subheading">A propos</span>
  									<h2 class="mb-4">Bienvenue sur Cuisinet</h2>
  								</div>
  							</div>
  							<div class="pl-lg-3 ml-md-5">
  								<p>C'est ce qui nous distingue des autres restaurants
									Nous sommes un merveilleux restaurant. Nous nous efforçons toujours de faire de nos précieux clients des invités, pas des clients
									Et cela à travers le type d'hospitalité, le style de réception, et la sélection des travailleurs de groupe dans toutes les catégories, grandes et petites, en plus de nos prix distinctifs et bien pensés.
								</p>
			          		</div>
			        	</div>
			     	</div>
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