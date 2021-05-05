<?php
    include "../../Controller/adminC.php";

    $adminC = new adminC();

    if (isset($_POST['id'])) 
    {
        $adminC->supprimerAdmin($_POST['id']);
        
        session_start();

        session_unset();

        session_destroy();

        header('refresh:1;url=login.php');
    }
    else
    {
        echo 'Erreur : try again';
        echo $_POST['id'];
    }
?>