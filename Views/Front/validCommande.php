<?php

include_once '../../Model/commande.php';
include_once '../../Controller/commandeC.php';
$commandeC = new CommandeC();
$id_plat=$_GET["idPlat"];

$Commande = new Commande(
    $_POST["nomclient"],
    $_POST['adresse'],
    $_POST['numerotel'],
    $id_plat
    

);
$commandeC->ajouterCommande($Commande);
echo '<script type="text/javascript">
window.location = "afficherCommande.php"
</script>';
?>