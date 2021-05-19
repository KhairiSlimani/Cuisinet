<!-- wrap -->
<div class="wrap">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-12 col-md d-flex align-items-center">
					<p class="mb-0 phone"><span class="mailus">Numero de téléphone:</span> <a href="#">+21699521445</a> ou <span class="mailus">Envoyez-nous un email:</span> <a href="#">cuisinet@gmail.com</a></p>
				</div>
				<div class="col-12 col-md d-flex justify-content-md-end">
					<p class="mb-0">Lundi - Mardi / 9:00-21:00, Samedi - Dimanche / 10:00-20:00</p>
					<!--<div class="social-media">
						<p class="mb-0 d-flex">
							<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
							<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
							<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
							<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a>
						</p>
					</div>-->
				</div>
			</div>
		</div>
	</div>
<!-- END wrap -->
    
<!-- nav -->
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.php"><img src="images/logo.png" style="width: 10%;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item <?php if($page == 'Accueil'){echo 'active';}?>" ><a href="index.php" class="nav-link">Accueil</a></li>
                <li class="nav-item <?php if($page == 'Employés'){echo 'active';}?>" ><a href="employes.php" class="nav-link">Employés</a></li>
                <li class="nav-item <?php if($page == 'Menu'){echo 'active';}?>"><a href="menu.php" class="nav-link">Menu</a></li>
                
				<?php if(!empty($_SESSION["etat"]) ) { ?>
				<li class="nav-item <?php if($page == "Reservation"){echo 'active';}?>"><a href="reservation.php" class="nav-link">Reservation</a></li>
				<li class="nav-item <?php if($page == "Profil"){echo 'active';}?>"><a href="profil.php" class="nav-link">Profil</a></li>
				<li class="nav-item <?php if($page == "Nous contacter"){echo 'active';}?>"><a href="contact.php" class="nav-link">Contact</a></li>
                <?php 
				}
				else
				{ 
				?>
				<li class="nav-item <?php if($page == "S'inscrire"){echo 'active';}?>"><a href="s'inscrire.php" class="nav-link">S'inscrire</a></li>
				<?php }?>

                
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->

<?php if($page != "Accueil") {?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_5.jpg');" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-end justify-content-center">
				<div class="col-md-9 ftco-animate text-center mb-5">
					<h1 class="mb-2 bread"><?php echo "$page"; ?></h1>
					<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Accueil <i class="fa fa-chevron-right"></i></a></span><?php echo "$page"; ?> <span><i class="fa fa-chevron-right"></i></span></p>
				</div>
			</div>
		</div>
</section>

<?php }?>
