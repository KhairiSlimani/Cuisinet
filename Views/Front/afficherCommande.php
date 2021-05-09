<?php 
     session_start();
	include "../../Controller/commandeC.php";

	$commandeC = new commandeC();
	$listeCommandes = $commandeC->afficherCommande();

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
		<?php $page="Commande"; include "header.php"; ?>
	<!-- END header -->
	
	<section class="ftco-section bg-light">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-2">
				<div class="col-md-7 text-center heading-section ftco-animate">
					<span class="subheading">Commande</span>
					<h2 class="mb-4">Vos Commandes</h2>
				</div>
			</div>	
			<p>votre avis est important pour nous.</p>

				
				<input type="submit" name="Message" value="Message" onclick="myFunction()" class="btn btn-danger">

				<p id="demo"></p>

				<script>
				function myFunction() {
				var person = prompt("S'il vous plaît entrez votre nom", "Cuisinet");
				if (person != null) {
					document.getElementById("demo").innerHTML =
					"Bonjour " + person + "!  plus que jamais, pour sauver des vies, restez chez vous et prendre plaisir de  nos plats?";
				}
				}
				</script>
			<div class="row">

				<?PHP
					foreach ($listeCommandes as $row) {
				?>

				<div class="col-md-6 col-lg-3 ftco-animate">
					<div class="staff">
					
						<div class="text px-4 pt-2">
							
							<div class="faded">
                                <p>Nom:<?PHP echo  $_SESSION['username']; ?></p>
                                <p>Numero de Telephone: <?PHP echo $row['numerotel']; ?></p>
								<p>Adresse: <?PHP echo $row['adresse']; ?></p>
                                <p>commande: <?PHP echo $row['idPlat']; ?></p>
								<p>  <form method="POST" action="supprimerCommande.php">
                                 <input type="submit" name="supprimer" value="supprimer" class="btn btn-danger">
                                 <input type="hidden" value="<?PHP echo $row['idcommande']; ?>" name="idcommande">
                                  </form>
								</p>
								<p>  
								<a  class="btn btn-primary" href="modifierCommande.php?idcommande=<?PHP echo $row['idcommande']; ?>&idPlat=<?PHP echo $row['idPlat'];?>"> Modifier </a>
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