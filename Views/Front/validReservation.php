<?php

include_once '../../Model/reservation.php';
include_once '../../Controller/reservationC.php';
$idclient= $_GET["idclient"];
$reservationC = new ReservationC();
$Reservation = new Reservation(
    $_POST['numerotel'],
    $_POST['date'],
    $_POST['temps'],
    $_POST['nombre'],
    $idclient
);
$reservationC->ajouterReservation($Reservation);
echo '<script type="text/javascript">
window.location = "reservation.php"
</script>';
?>