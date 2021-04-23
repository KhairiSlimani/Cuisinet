<?php
    include "reservationC.php";

    $reservationC = new reservationC();

    if (isset($_POST['idres'])) 
    {
        $reservationC->supprimerReservation($_POST['idres']);
        header('location:../Views/Back/afficherReservation.php');
    }
    else
    {
        echo 'Erreur : try again';
        echo $_POST['idres'];
    }
?>