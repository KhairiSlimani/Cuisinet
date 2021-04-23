<?php
    include "clientC.php";

    $clientC = new clientC();

    if (isset($_POST['id'])) 
    {
        $clientC->supprimerClient($_POST['id']);
        header('location:../Views/Back/afficherClients.php');
    }
    else
    {
        echo 'Erreur : try again';
        echo $_POST['id'];
    }
?>