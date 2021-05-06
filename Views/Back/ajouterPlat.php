<?php 
 
	session_start(); 

	if( $_SESSION["connecter"] != 1)
	{
		echo "<script type='text/javascript'>";
            echo "alert('Connectez-vous!');
            window.location.href='login.php';";
		echo "</script>";
		
	}
include_once '../../Model/plats.php';
include_once '../../Controller/platC.php';




$error = "";

// create plat
$plat = null;

// create an instance of the controller
$platC = new platC();
if (

    isset($_POST["nom"]) &&
    isset($_POST["description"]) &&
    isset($_POST["prix"]) &&
    isset($_POST["type"]) &&
    isset($_POST["photo"])

) {
    if (
        !empty($_POST["nom"]) &&
        !empty($_POST["description"]) &&
        !empty($_POST["prix"]) &&
 !empty($_POST["type"]) &&
        !empty($_POST["photo"])
    ) {
        $Plat = new Plat(
            $_POST["nom"],
            $_POST['description'],
            $_POST['prix'],
            $_POST['type'],
            $_POST['photo']); 
        $platC->ajouterPlat($Plat);
        //header('Location:../front/blogs.php');
    } else
        echo "Le prix doit etre superieur a 0";
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


    <title>Ajouter un Plat</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


<!-- Custom styles for this template-->
<link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="//cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>
    <script src="js/controleSaisieEmploye.js"></script>
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

                <!-- Begin Page Content -->

                <!-- Topbar -->
                    <?php $usr=$_SESSION["username"]; include "topbar.php"; ?>
                <!-- End of Topbar -->
                <div class="container-fluid">

                                        <form method="post" action="" id="form">

                        <div class="form-group">
 
                            <label for="nom">Entrer le nom du plat</label>
                            <input type="text" class="form-control" name="nom" id="nom" placeholder="nom" required>



          </div>

                        <div class="form-group">
                            <label for="description">Entrer la description du plat</label>
                            <input type="text" class="form-control" name="description" id="description" placeholder="Description" required>
                        </div>
<div class="form-group">
                            Type
                            <select name="type" id="type">
                                <option value="select">select</option>
                                <option value="PETIT-DEJEUNER">PETIT-DEJEUNER</option>
                                <option value="DEJEUNER">DEJEUNER</option>
                                <option value="DINER">DINER</option>
                                <option value="DESSERTS">DESSERTS</option>
                                <option value="BOISSONS et THE">BOISSONS et THE</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="prix">Entrer prix du plat</label>
                         

<input type="text" class="form-control" name="prix" id="prix" placeholder="Prix" min="1" max="99" required>
                        </div>


                        <div class="form-group">
                            <label for="photo">Entrer le photo du plat</label>
                            <input type="file" name="photo" id="photo" required>
                        </div>


                    
                        <button id="sbb" type="submit" value="Envoyer" class="btn btn-primary" onclick="verif();">Ajouter</button>


                    </form>
                

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
<script src="script.js"></script>
</body>

</html>