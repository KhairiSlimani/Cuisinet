<?php
    include "../../Controller/employeC.php";

    $employeC = new employeC();

    if (isset($_POST['idEmploye'])) 
    {
        $employeC->supprimerEmploye($_POST['idEmploye']);
        header('location: afficherEmployes.php');
    }
    else
    {
        echo 'Erreur : try again';
        echo $_POST['idEmploye'];
    }
?>