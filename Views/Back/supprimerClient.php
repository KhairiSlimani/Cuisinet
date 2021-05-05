<?php
    include "../../Controller/clientC.php";

    $clientC = new clientC();

    if (isset($_POST['id'])) 
    {
        $clientC->supprimerClient($_POST['id']);
        header('location: afficherClients.php');
    }
    else
    {
        echo 'Erreur : try again';
        echo $_POST['id'];
    }
?>