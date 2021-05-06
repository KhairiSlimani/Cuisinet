<?php
    require_once "../../Controller/promoC.php";  
include "C://xampp/htdocs/Cuisinet/config.php";
	session_start(); 

	if( $_SESSION["connecter"] != 1)
	{
		echo "<script type='text/javascript'>";
            echo "alert('Connectez-vous!');
            window.location.href='login.php';";
		echo "</script>";
		
	}
    $promoC = new promoC();

    if (isset($_POST['id'])) 
    {
        $promoC->supprimerPromo($_POST['id']);
        header('location:afficherPromos.php');
    }
    else
    {
        echo 'Erreur : try again';
        echo $_POST['id'];
    }
?>