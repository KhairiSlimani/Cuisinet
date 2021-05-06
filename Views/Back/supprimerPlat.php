<?php
    include "../../Controller/platC.php";
	session_start(); 

	if( $_SESSION["connecter"] != 1)
	{
		echo "<script type='text/javascript'>";
            echo "alert('Connectez-vous!');
            window.location.href='login.php';";
		echo "</script>";
		
	}

    $platC = new platC();

    if (isset($_POST['idPlat'])) 
    {
        $platC->supprimerPlat($_POST['idPlat']);
        header('location:afficherPlats.php');
    }
    else
    {
        echo 'Erreur : try again';
        echo $_POST['idPlat'];
    }
?>