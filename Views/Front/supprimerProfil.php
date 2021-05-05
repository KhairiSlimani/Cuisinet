<?php
    include "../../Controller/clientC.php";

    $clientC = new clientC();

    if (isset($_POST['id'])) 
    {
        $clientC->supprimerClient($_POST['id']);

        session_start();

        session_unset();

        session_destroy();

        header('refresh:1;url=connecter.php');
    }
    else
    {
        echo 'Erreur : try again';
        echo $_POST['id'];
    }
?>