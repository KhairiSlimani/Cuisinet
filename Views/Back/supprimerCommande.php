<?php
    include "../../Controller/commandeC.php";

    $commandeC = new commandeC();

    if (isset($_POST['idcommande'])) 
    {
        $commandeC->supprimerCommande($_POST['idcommande']);
        header('location: afficherCommande.php');
    }
    else
    {
        echo 'Erreur : try again';
        echo $_POST['idcommande'];
    }
?>