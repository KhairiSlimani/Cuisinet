<?php
include '../../Controller/commandeC.php';
include '../../Model/commande.php';

      $idcommande=$_GET["idcommande"];
      $commandeC = new  CommandeC();
      $nom_client = $_POST['nomclient'];
      $adresse = $_POST['adresse'];
      $num_tel = $_POST['numerotel'];
      $idPlat = $_POST['idPlat'];
      $commande  = new commande($nom_client,$adresse,$num_tel,$idPlat);
      $commandeC->modifierCommande($commande,$idcommande);
      echo '<script type="text/javascript">
           window.location = "afficherCommande.php"
      </script>';
?>
