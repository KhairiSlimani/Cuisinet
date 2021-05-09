<?php
	session_start(); 

	if( $_SESSION["connecter"] != 1)
	{
		echo "<script type='text/javascript'>";
            echo "alert('Connectez-vous!');
            window.location.href='login.php';";
		echo "</script>";
		
	}

?>
<?php
include_once '../../Model/reservation.php';
include_once '../../Controller/reservationC.php';
$reservationC = new reservationC();
$clients = $reservationC->getClients();
$error = "";

// create reservation
$employe = null;

// create an instance of the controller
$reservationC = new reservationC();
if (

    isset($_POST["nomclient"]) &&
    isset($_POST["numerotel"]) &&
    isset($_POST["date"]) &&
    isset($_POST["temps"]) &&
    isset($_POST["nombre"])&&
    isset($_POST["idclient"])


) {
    if (
        !empty($_POST["nomclient"]) &&
        !empty($_POST["numerotel"]) &&
        !empty($_POST["date"]) &&
        !empty($_POST["temps"]) &&
        !empty($_POST["nombre"])&&
        !empty($_POST["idclient"])

    ) {
        $Reservation = new Reservation(

            $_POST["nomclient"],
            $_POST['numerotel'],
            $_POST['date'],
            $_POST['temps'],
            $_POST['nombre'],
            $_POST['idclient']

        );
        $reservationC->ajouterReservation($Reservation);
        //header('Location:../front/blogs.php');
    } else
        echo "Missing information";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ajouter Reservation</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


<!-- Custom styles for this template-->
<link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="//cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>
   
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php require_once 'sidebar.php';
        ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php $usr= $_SESSION["username"]; include "topbar.php"; ?>
                <!-- End of Topbar -->


                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <form method="post" action="validAjoutReservation.php" id="form" onsubmit="return verif();">
                        <div class="form-group">
                            <label for="nomclient">Entrer le nom de client</label>
                            <select class="form-control" name="idclient" id="idclient" required>
                                <option value="" selected ></option>
                                <?php 
                                    foreach($clients as $client){
                                ?>
                                <option value="<?php echo $client['id'] ?>"><?php echo $client['username'] ?></option>
                                
                                <?php
                                    }    
                                ?>
                            </select>
                        </div>
                        <label id="labelidclient" name="labelidclient" style="color:#eb1212">  </label>
                        <div class="form-group">
                            <label for="numerotel">Entrer le numero de téléphone</label>
                            <input type="number" class="form-control" name="numerotel" id="numerotel" placeholder="Numerotel" >
                        </div>
                        <label id="labelnumero" name="labelnumero" style="color:#eb1212">  </label>

                        <div class="form-group">
                            <label for="date">Entrer la date </label>
                            <input type="date" class="form-control" name="date" id="date" placeholder="Date"  min="2021-05-02" max="2021-12-31" required>
                        </div>
                        <label id="labeldate" name="labeldate" style="color:#eb1212">  </label>
                        <div class="form-group">
                            <label for="temps">Entrer le temps</label>
                            <input type="time" class="form-control" name="temps" id="temps" placeholder="temps" min="09:00" max="00:00"required>
                        </div>

                        <div class="form-group">
                            <label for="nombre">Entrez le nombre </label>
                            <input type="text" name="nombre" id="nombre" placeholder="1-2-3" required>
                        </div>
                        <label id="labelnombre" name="labelnombre" style="color:#eb1212">  </label>
                      
                        <button id="sbb" type="submit" value="Envoyer" class="btn btn-primary" onclick="verif();" >Ajouter</button>

                    </form>
                    <br>
                    <div id="errors" style="color :red;"></div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->



        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
   <script src="js/controleSaisieReservation.js"></script>
</body>

</html>