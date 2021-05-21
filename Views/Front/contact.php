

<?php
  session_start(); 
  
  include_once '../../Controller/clientC.php';
  include_once '../../Model/clients.php';
?>

<?php

  if (

  isset($_POST["username"]) &&
  isset($_POST["email"]) &&
  isset($_POST["subject"]) &&
  isset($_POST["body"]) 

  ) {
  if (
      !empty($_POST["username"]) &&
      !empty($_POST["email"]) &&
      !empty($_POST["subject"]) &&
      !empty($_POST["body"]) 
  ) {
      $email = $_POST["email"];
      $subject = $_POST["subject"];
      mail("cuisinet.restaurant@gmail.com" , "$email ($subject)" , $_POST["body"] , "From: $email");    
  } else
      echo "Informations manquantes!";
  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Cuisinet - Nous contacter</title>
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
		<?php $page="Nous contacter"; include "header.php"; ?>
	<!-- END header -->

<section class="ftco-section contact-section bg-light">
  <div class="container">
    <div class="row d-flex contact-info">
      <div class="col-md-12">
        <h2 class="h4 font-weight-bold">Coordonnées</h2>
      </div>
      <div class="w-100"></div>
      <div class="col-md-3 d-flex">
       <div class="dbox">
         <p><span>Adresse:</span> 1, 2 rue André Ampère - 2083 - Pôle Technologique - El Ghazala.</p>
       </div>
     </div>
     <div class="col-md-3 d-flex">
       <div class="dbox">
         <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
       </div>
     </div>
     <div class="col-md-3 d-flex">
       <div class="dbox">
         <p><span>Email:</span> <a href="mailto:info@cuisinet.com">info@cuisinet.com</a></p>
       </div>
     </div>
     <div class="col-md-3 d-flex">
       <div class="dbox">
         <p><span>Website</span> <a href="#">www.cuisinet.com</a></p>
       </div>
     </div>
   </div>
 </div>
</section>
<section class="ftco-section ftco-no-pt contact-section">
 <div class="container">
  <div class="row d-flex align-items-stretch no-gutters">
   <div class="col-md-6 p-5 order-md-last">
    <h2 class="h4 mb-5 font-weight-bold">Contact Us</h2>
    <?PHP

        $clientC = new clientC();
        $client = $clientC->recupererClientUS($_SESSION['username']);
        $sq=$_SESSION['username'];
      
							
		?>

    <form id="myForm" method="post">
      <div class="form-group">
        <input type="text" class="form-control" name="username" id="username" value="<?PHP echo $sq; ?>">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="email" id="email" value="<?PHP echo $client['email']; ?>">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
      </div>
      <div class="form-group">
        <textarea cols="30" rows="7" name="body" id="body" class="form-control" placeholder="Message"></textarea>
      </div>
      <div class="form-group">
        <button type="submit" value="Envoyer" class="btn btn-primary py-3 px-5">Envoyer</button>
      </div>
    </form>


  </div>
  <div class="col-md-6 d-flex align-items-stretch">
    <div id="map">
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