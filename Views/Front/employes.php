<?php 
	session_start(); 
	
	include "../../Controller/employeC.php";

	//pagination
	$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
	$perpage = isset($GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 4 ;
	$employeC = new employeC();
	$totalP = $employeC->calcTotalRows($perpage);
	$listeEmployes = $employeC->pagination($page, $perpage);
	

	//recherche
	if(isset($_GET['recherche']))
	{
		$search_value=$_GET["recherche"];
		$listeEmployes=$employeC->recherche($search_value);
	}

	//trie
	if(isset($_GET['trie']))
	{
		$listeEmployes = $employeC->trieCroissant($page, $perpage);
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cuisinet - Employes</title>
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
		<?php $page="Employés"; include "header.php"; ?>
	<!-- END header -->
	
	<section class="ftco-section bg-light">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-2">
				<div class="col-md-7 text-center heading-section ftco-animate">
					<span class="subheading">Employés</span>
					<h2 class="mb-4">Notre Employés</h2>
				</div>
			</div>	

			<form method="get" action="employes.php">
                <button  type="submit" class="btn btn-primary" name="trie">Trie</button>
            </form>
			<br>
			<table  style="border: none;">
					<form method="get" action="employes.php">
						<th>
							<input type="text" name="recherche" placeholder="Rechercher...">
						</th>
						<th>
							<button class="btn btn-primary" type="submit" value="Chercher">
								Chercher
							</button>
						</th>

					</form>

			</table>

			<br>

			<div class="row">

				<?PHP
					foreach ($listeEmployes as $row) {
				?>

				<div class="col-md-6 col-lg-3 ftco-animate">
					<div class="staff">
						<div class="img" style="background-image: url(images/<?PHP echo $row['photo']; ?>);"></div>
						<div class="text px-4 pt-2">
							<h3><?PHP echo $row['nom']; ?> <?PHP echo $row['prenom']; ?></h3>
							<span class="position mb-2"><?PHP echo $row['titreEmploi']; ?></span>
							<div class="faded">
								<p>Age: <?PHP echo $row['age']; ?></p>
								<p>Tel: <?PHP echo $row['numeroTelephone']; ?></p>
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

			<div class="row no-gutters my-5">
				<div class="col text-center">
					<div class="block-27">
						<ul>
							<?php
                                for ($x = 1; $x <= $totalP; $x++) :
                            ?>
							<li style="margin:3px;" ><a href="?page=<?php echo $x; ?>&per-page=<?php echo $perpage; ?>"><?php echo $x; ?></a><?php endfor; ?></li>
						</ul>
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