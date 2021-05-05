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
include_once '../../Controller/employeC.php';
include_once '../../Model/employes.php';


$employeC = new employeC();
if (

    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["age"]) &&
    isset($_POST["sexe"]) &&
    isset($_POST["titreEmploi"]) &&
    isset($_POST["salaire"]) &&
    isset($_POST["numeroTelephone"]) &&
    isset($_POST["photo"])

) {
    if (
        !empty($_POST["nom"]) &&
        !empty($_POST["prenom"]) &&
        !empty($_POST["age"]) &&
        !empty($_POST["sexe"]) &&
        !empty($_POST["titreEmploi"]) &&
        !empty($_POST["salaire"]) &&
        !empty($_POST["numeroTelephone"]) &&
        !empty($_POST["photo"])
    ) {
        $Employe = new Employe(

            $_POST["nom"],
            $_POST['prenom'],
            $_POST['age'],
            $_POST['sexe'],
            $_POST['titreEmploi'],
            $_POST["salaire"],
            $_POST['numeroTelephone'],
            $_POST['photo']

        );
        $employeC->modifierEmploye($Employe, $_GET['idEmploye']);
        header('refresh:2;url=afficherEmployes.php');
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

    <title>Modifier Employé</title>

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

                <!-- Topbar -->
                    <?php $usr=$_SESSION["username"]; include "topbar.php"; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->

                <?php
                if (isset($_GET['idEmploye'])) {
                    $employe = $employeC->recupererEmploye($_GET['idEmploye']);
                ?>


                <div class="container-fluid">

                    <form method="post" action="" id="form">

                        <div class="form-group">
                            <label for="nom">Entrer le nom de l'employé</label>
                            <input type="text" class="form-control" name="nom" id="nom" value="<?PHP echo $employe['nom']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="prenom">Entrer le prenom de l'employé</label>
                            <input type="text" class="form-control" name="prenom" id="prenom" value="<?PHP echo $employe['prenom']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="age">Entrer l'age de l'employé</label>
                            <input type="text" class="form-control" name="age" id="age" value="<?PHP echo $employe['age']; ?>" required>
                        </div>

                        <div class="form-group">
                            Sexe:
                            <label for="homme">Homme</label>                           
                            <input type="radio" name="sexe" id="sexe" value="homme" checked>
                            <label for="femme">Femme</label>
                            <input type="radio" name="sexe" id="sexe" value="femme">
                        </div>

                        <div class="form-group">
                            Titre d'emploi
                            <select name="titreEmploi" id="titreEmploi">
                                <option value="select">Select</option>
                                <option value="chef">Chef</option>
                                <option value="aide-cuisinier">Aide-cuisinier</option>
                                <option value="serveur">Serveur</option>
                                <option value="livreur">Livreur</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="salaire">Entrer le salaire de l'employé</label>
                            <input type="number" class="form-control" name="salaire" id="salaire" value="<?PHP echo $employe['salaire']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="numeroTelephone">Numero de téléphone</label>
                            <input type="tel" name="numeroTelephone" id="numeroTelephone" value="<?PHP echo $employe['numeroTelephone']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="photo">Entrer le photo de l'employé</label>
                            <input type="file" name="photo" id="photo" value="<?PHP echo $employe['photo']; ?>" required>
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
                    echo "errorrrr ";
                }
?>
</body>

</html>