<?php
    include "C://xampp/htdocs/Cuisinet/config.php";

    class commandeC {

        public function ajouterCommande($commande)
        {
            $sql = "INSERT INTO commande (nomclient, adresse, numerotel, idPlat) 
            VALUES (:nomclient, :adresse, :numerotel, :idPlat)";
    
            $db = config::getConnexion();
            try {
                $query = $db->prepare($sql);
    
                $query->execute([
                    'nomclient' => $commande->getNomclient(),
                    'adresse' => $commande->getAdresse(),
                    'numerotel' => $commande->getNumerotel(),
                    'idPlat' => $commande->getidPlat(),

    
                ]);
            } catch (Exception $e) {
                echo 'Erreur: ' . $e->getMessage();
            }
        }

        public function afficherCommande()
        {
    
            $sql = "SELECT * FROM commande";
            $db = config::getConnexion();
            try {
                $liste = $db->query($sql);
                return $liste;
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }


        public function supprimerCommande($idcommande)
        {
            $sql = "DELETE FROM commande WHERE idcommande = :idcommande";
            $db = config::getConnexion();
            $req = $db->prepare($sql);
            $req->bindValue(':idcommande', $idcommande);
            try {
                $req->execute();
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }

        public function modifierCommande($commande, $idcommande)
        {
            $db = config::getConnexion();
            try {
                
                $query = $db->prepare(
                    'UPDATE commande SET 
                            nomclient = :nomclient, 
                            adresse= :adresse,
                            numerotel = :numerotel,
                            idPlat = :idPlat

                        WHERE idcommande = :idcommande'
                );
                $query->execute([
                    'idcommande' =>  $idcommande,
                    'nomclient' => $commande->getNomclient(),
                    'adresse' => $commande->getAdresse(),
                    'numerotel' => $commande->getNumerotel(),
                    'idPlat' => $commande->getIdPlat()

                                 
                ]);
                echo $query->rowCount() . " records UPDATED successfully <br>";
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function recupererCommande($idcommande)
        {
            $sql = "SELECT * from commande where idcommande=$idcommande";
            $db = config::getConnexion();
            try {
                $query = $db->prepare($sql);
                $query->execute();
    
                $user = $query->fetch();
                return $user;
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }

    
        public function recherche($search_value)
        {
            $sql="SELECT * FROM commande where idcommande like '$search_value' or nomclient like '%$search_value%' ";
    
            //global $db;
            $db =Config::getConnexion();
    
            try{
                $result=$db->query($sql);
    
                return $result;
    
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }

        public function pagination($page, $perPage)
        {
            $start = ($page > 1) ? ($page * $perPage) - $perPage : 0;
            $sql = "SELECT * FROM commande LIMIT {$start},{$perPage} ";
            $db = config::getConnexion();
            try {
                $liste = $db->prepare($sql);
                $liste->execute();
                $liste = $liste->fetchAll(PDO::FETCH_ASSOC);
                return $liste;
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }

        public function trieCroissant($page, $perPage)
        {
            $start = ($page > 1) ? ($page * $perPage) - $perPage : 0;
            $sql = "SELECT * FROM commande order by idcommande LIMIT {$start},{$perPage} ";
            $db = config::getConnexion();
            try {
                $liste = $db->prepare($sql);
                $liste->execute();
                $liste = $liste->fetchAll(PDO::FETCH_ASSOC);
                return $liste;
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }

    
    
        public function calcTotalRows($perPage)
        {
            $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM commande";
            $db = config::getConnexion();
            try {
    
                $liste = $db->query($sql);
                $total = $db->query("SELECT FOUND_ROWS() as total")->fetch()['total'];
                $pages = ceil($total / $perPage);
                return $pages;
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }


       
        public function getPlatById($idplat)
        {
 
             $sql = "SELECT  * FROM plats where idPlat=$idplat";
             $db = config::getConnexion();
             try{
                $query = $db->prepare($sql);
                $query->execute();
    
                $plat = $query->fetch();
                return $plat;
             }
             catch (Exception $e){
                 die('Erreur: '.$e->getMessage());
             }
             
 
 
         }
    
         public function getPlats()
         {
             $sql = "SELECT * FROM Plats ";
             $db = config::getConnexion();
             try {
                 $liste = $db->query($sql);
                 return $liste;
             } catch (Exception $e) {
                 die('Erreur: ' . $e->getMessage());
             }
         }

    


        
    }