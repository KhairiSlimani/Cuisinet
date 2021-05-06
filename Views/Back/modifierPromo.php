<?php //require_once 'topbar.php'?>

<?php
session_start(); 

	if( $_SESSION["connecter"] != 1)
	{
		echo "<script type='text/javascript'>";
            echo "alert('Connectez-vous!');
            window.location.href='login.php';";
		echo "</script>";
		
	}

include_once '../../Controller/platC.php';
include_once '../../Controller/promoC.php';
include_once '../../Model/promotions.php';



$error = "";

// create plat
$plat = null;

// create an instance of the controller
$platC = new platC();
$promoC = new promoC();
$listePlats = $platC->afficherPlat();

if (

 isset($_POST["nom"]) &&
    isset($_POST["pourcentage"]) &&
    isset($_POST["plat"])



) {
    if (
       !empty($_POST["nom"]) &&
        !empty($_POST["pourcentage"]) &&
        !empty($_POST["plat"]) 
    ) {
       

          
           $promo = new Promotion(
            $_POST["nom"],
            $_POST['pourcentage'],
            $_POST['plat']);


                
        $promoC->modifierPromo($promo, $_GET['id']);
        header('refresh:2;url=afficherPromos.php');
        
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

    <title>Modifier Promo</title>

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

                <!-- Begin Page Content -->
 <!-- Topbar -->
                    <?php $usr=$_SESSION["username"]; include "topbar.php"; ?>
                <!-- End of Topbar -->

                <div id="error">
                    <?php echo $error; ?>
                </div>

                <?php
                if (isset($_GET['id'])) {
                    $promo = $promoC->recupererPromo($_GET['id']);
                ?>


                <div class="container-fluid">

                    <form method="post" action="">

                        <div class="form-group">
                            <label for="nom">Entrer le nom de la promotion</label>
                            <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom" required>
                        </div>

                        <div class="form-group">
                            <label for="prenom">Entrer le pourcentage</label>
                            <input type="text" class="form-control" name="pourcentage" id="pourcentage" placeholder="Pourcentage" required>
                        </div>

                       

                       

                      <div class="form-group">
                            Liste des plats
                        
                            <select name="plat" id="plat" required="true">
<?PHP
                    foreach ($listePlats as $row) {

                ?>


                                <option value="<?PHP echo $row['idPlat']; ?>"><?PHP echo $row['nom']; ?></option>

                                <?PHP
                }
                ?>
                            </select>
                        </div>

                       


                        <button type="submit" value="Envoyer" class="btn btn-primary">Modifier</button>

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
<?php
                } else {
                    echo "errorrrr ";
                }
?>
</body>

</html>