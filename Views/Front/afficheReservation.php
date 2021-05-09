<?php 
  session_start();
	include "../../Controller/reservationC.php";

	$reservationC = new reservationC();
	$listeReservations = $reservationC->afficherReservation();

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
		<?php $page="Reservation"; include "header.php"; ?>
	<!-- END header -->
	
	<section class="ftco-section bg-light">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-2">
				<div class="col-md-7 text-center heading-section ftco-animate">
					<span class="subheading">Reservation</span>
					<h2 class="mb-4">Vos Reservations</h2>
				</div>
			</div>	
			<div class="row">

				<?PHP
					foreach ($listeReservations as $row) {
				?>

				<div class="col-md-6 col-lg-3 ftco-animate">
					<div class="staff">
					
						<div class="text px-4 pt-2">
							
							<div class="faded">
                                <p>Nom:<?PHP echo   $_SESSION['username']; ?></p>
                                <p>Numero de Telephone: <?PHP echo $row['numerotel']; ?></p>
								<p>Date: <?PHP echo $row['date']; ?></p>
								<p>Temps: <?PHP echo $row['temps']; ?></p>
                                <p>Nombre: <?PHP echo $row['nombre']; ?></p>
								<p>  <form method="POST" action="supprimerReservation.php">
                                 <input type="submit" name="supprimer" value="supprimer" class="btn btn-danger">
                                 <input type="hidden" value="<?PHP echo $row['idres']; ?>" name="idres">
                                  </form>
								</p>
								<p>  
								<a  class="btn btn-primary" href="modifierReservation.php?idres=<?PHP echo $row['idres']; ?>"> Modifier </a>
								</p>

								<ul class="ftco-social d-flex">
									<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
									<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
									<li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
									<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<?PHP
					}
				?>

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