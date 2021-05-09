<?php
include '../../Controller/commandeC.php';
include '../../Model/commande.php';

   $commandeC = new CommandeC();
    $nom_client = $_POST['nomclient'];
    $adresse = $_POST['adresse'];
    $numerotel = $_POST['numerotel'];
    $id_plat = $_POST['idPlat'];
    $commande  = new commande($nom_client,$adresse,$numerotel,$id_plat);
    $commandeC->ajouterCommande($commande);
    echo '<script type="text/javascript">
       window.location = "afficherCommande.php"
     </script>';
?>
