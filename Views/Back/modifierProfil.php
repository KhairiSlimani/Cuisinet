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
include_once '../../Controller/adminC.php';
include_once '../../Model/admin.php';


$error = "";

$admin = null;

// create an instance of the controller
$adminC = new adminC();
if (

    isset($_POST["username"]) &&
    isset($_POST["password"]) 

) {
    if (
        !empty($_POST["username"]) &&
        !empty($_POST["password"]) 
    ) {
        $Admin = new Admin(

            $_POST['username'],
            $_POST['password']
        );

        $adminC->modifierAdmin($Admin, $_GET['id']);
        $_SESSION['username'] = $_POST['username'];
        header('refresh:2;url=profil.php');
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

    <title>Modifier Employé</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="//cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>
    <script src="js/controleSaisieAdmin.js"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php require_once 'sidebar.php';?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                    <?php $usr=$_SESSION["username"]; include "topbar.php"; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->

                <?php
                    if (isset($_GET['id'])) {
                        $admin = $adminC->recupererAdmin($_GET['id']);
                    
                ?>


                <div class="container-fluid">

                    <form method="post" action="" id="form">

                        <div class="form-group">
                            <label for="nom">Entrer le nom d'utilisateur de l'admin</label>
                            <input type="text" class="form-control" name="username" id="username" value="<?PHP echo $admin['username']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="prenom">Entrer le mot de passe de l'admin</label>
                            <input type="text" class="form-control" name="password" id="password"  value="<?PHP echo $admin['password']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="prenom">Retapez le mot de passe</label>
                            <input type="text" class="form-control" name="confirmation" id="confirmation"  value="<?PHP echo $admin['password']; ?>" required>
                        </div>

                        <button type="submit" value="Envoyer" class="btn btn-primary" onclick="verif();">Modifier</button>

                    </form>
                    <br>
                    <div id="error" style="color: red;"></div>

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
    <?php require_once 'logoutModal.php';?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <?php
        } else {
            echo "error ";
        }
    ?>
</body>

</html>