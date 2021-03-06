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
    require_once "../../Controller/employeC.php"; 
?>

<!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Afficher Employés</title>

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">

    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <?php 
                require_once 'sidebar.php';
            ?>

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                        <?php $usr=$_SESSION["username"]; include "topbar.php"; ?>
                    <!-- End of Topbar -->

                    <!-- Begin of container-fluid -->
                    <div class="container-fluid">

                        <?PHP

                            //pagination
                            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                            $perpage = isset($GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 3 ;
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

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">

                                <tr>
                                    <th>
                                        <h6 class="m-0 font-weight-bold text-primary">Tableau des Employés</h6>
                                    </th>
                                </tr>
                                
                            </div>
                            <div class="card-body">

                                <div class="table-responsive">

                                    <div class="row">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nom</th>
                                                    <th>Prenom</th>
                                                    <th>Age</th>
                                                    <th>Sexe</th>
                                                    <th>Titre d'emploi</th>
                                                    <th>Salaire</th>
                                                    <th>Numéro de téléphone</th>
                                                    <th>Photo</th>
                                                    <th colspan="2">
                                                        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="get" action="afficherEmployes.php">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                                                        aria-label="Search" aria-describedby="basic-addon2" name="recherche">
                                                                    <div class="input-group-append">
                                                                        <button class="btn btn-primary" type="submit" value="Chercher">
                                                                            <i class="fas fa-search fa-sm"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                        </form>
                                                    </th>
                                                    <th>
                                                        <form method="get" action="afficherEmployes.php">
                                                            <button type="submit" class="btn btn-primary" name="trie">Trie</button>
                                                        </form>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?PHP
                                                    foreach ($listeEmployes as $row) {
                                                ?>

                                                <tr>
                                                    <td><?PHP echo $row['idEmploye'];?></td>
                                                    <td><?PHP echo $row['nom']; ?></td>
                                                    <td><?PHP echo $row['prenom']; ?></td>
                                                    <td><?PHP echo $row['age']; ?></td>
                                                    <td><?PHP echo $row['sexe']; ?></td>
                                                    <td><?PHP echo $row['titreEmploi']; ?></td>
                                                    <td><?PHP echo $row['salaire']; ?></td>
                                                    <td><?PHP echo $row['numeroTelephone']; ?></td>                                
                                                    <td><img width="100" src="../front/images/<?PHP echo $row['photo']; ?> "> </td>

                                                    <td>
                                                        <form method="POST" action="supprimerEmploye.php">
                                                            <input type="submit" name="supprimer" value="supprimer" class="btn btn-danger">
                                                            <input type="hidden" value="<?PHP echo $row['idEmploye']; ?>" name="idEmploye">
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <a  class="btn btn-primary" href="modifierEmploye.php?idEmploye=<?PHP echo $row['idEmploye']; ?>"> Modifier </a>
                                                    </td>
                                                </tr>

                                                <?PHP
                                                    }
                                                ?>                                           
                                            </tbody>

                                        </table>
                                    </div>

                                    <div class="row">
                                        <nav>
                                            <ul class="pagination">
                                                <?php
                                                    for ($x = 1; $x <= $totalP; $x++) :
                                                ?>
                                                
                                                <li class="page-item">
                                                    <a class="page-link" href="?page=<?php echo $x; ?>&per-page=<?php echo $perpage; ?>"><?php echo $x; ?></a><?php endfor; ?>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>

                                    <form action="printEmployes">
                                        <button class="btn btn-danger" type="submit">Print</button> 
                                    </form>

                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- End of container-fluid -->

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

    </body>

</html>