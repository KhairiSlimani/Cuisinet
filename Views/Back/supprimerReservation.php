<?php
    include "../../Controller/reservationC.php";

    $reservationC = new reservationC();

    if (isset($_POST['idres'])) 
    {
        $reservationC->supprimerReservation($_POST['idres']);
        header('location: afficherReservation.php');
    }
    else
    {
        echo 'Erreur : try again';
        echo $_POST['idres'];
    }
?>