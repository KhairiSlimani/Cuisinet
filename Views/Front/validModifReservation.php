<?php
include '../../Controller/reservationC.php';
include '../../Model/reservation.php';

      $idres=$_GET["idres"];
      $reservationC = new ReservationC();
      $id_client = $_POST['idclient'];
      $num_tel = $_POST['numerotel'];
      $date = $_POST['date'];
      $temps = $_POST['temps'];
      $nombre = $_POST['nombre'];
      $reservation  = new reservation($num_tel,$date,$temps,$nombre,$id_client);
      $reservationC->modifierReservation($reservation,$idres);
      echo '<script type="text/javascript">
            window.location = "afficheReservation.php"
      </script>';
?>
