<?php
	session_start(); 

	if( $_SESSION["connecter"] != 1)
	{
		echo "<script type='text/javascript'>";
            echo "alert('Connectez-vous!');
            window.location.href='login.php';";
		echo "</script>";
		
	}

    require_once "../../Controller/adminC.php"; 
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
        <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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

                            $adminC = new adminC();
                            $Profile = $adminC->recupererAdminUS($_SESSION["username"]);                      
                            
                        ?> 

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
                            </div>
                            <div class="card-body">

                                <div class="table-responsive">

                                    <div class="row">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nom d'utilisateur</th>
                                                    <th>Mot de passe</th>
                                                    <th colspan="2">Options</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td><?PHP echo $Profile['id'];?></td>
                                                    <td><?PHP echo $Profile['username'];?></td>
                                                    <td><?PHP echo $Profile['password']; ?></td>
                                                    <td>
                                                        <form method="POST" action="supprimerProfil.php">
                                                            <input type="submit" name="supprimer" value="supprimer" class="btn btn-danger">
                                                            <input type="hidden" value="<?PHP echo $Profile['id']; ?>" name="id">
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <a   class="btn btn-primary text-center" href="modifierProfil.php?id=<?PHP echo $Profile['id']; ?>"> Modifier </a>
                                                    </td>
                                                </tr>

                                            </tbody>


                                        </table>



                                    </div>

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