<?php
    include "../../Controller/adminC.php";

    $adminC = new adminC();

    if (isset($_POST['id'])) 
    {
        $adminC->supprimerAdmin($_POST['id']);
        header('location: afficherAdmin.php');
    }
    else
    {
        echo 'Erreur : try again';
        echo $_POST['id'];
    }
?>