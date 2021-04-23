<?php
    include "C://xampp/htdocs/Cuisinet/config.php";

    class commandeC {

        public function ajouterCommande($commande)
        {
            $sql = "INSERT INTO commande (nomclient, adresse, numerotel,commande) 
            VALUES (:nomclient, :adresse, :numerotel,:commande)";
    
            $db = config::getConnexion();
            try {
                $query = $db->prepare($sql);
    
                $query->execute([
                    'nomclient' => $commande->getNomclient(),
                    'adresse' => $commande->getAdresse(),
                    'numerotel' => $commande->getNumerotel(),
                    'commande' => $commande->getCommande()
    
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

        public function supprimerCommande($id)
        {
            $sql = "DELETE FROM commande WHERE idcommande = :idcommande";
            $db = config::getConnexion();
            $req = $db->prepare($sql);
            $req->bindValue(':idcommande', $id);
            try {
                $req->execute();
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }

        public function modifierCommande($commande, $id)
        {
            $db = config::getConnexion();
            try {
                
                $query = $db->prepare(
                    'UPDATE commande SET 
                            nomclient = :nomclient, 
                            adresse= :adresse,
                            numerotel = :numerotel,
                            commande = :commande 
                        WHERE idcommande = :idcommande'
                );
                $query->execute([
                    'idcommande' =>  $id,
                    'nomclient' => $commande->getNomclient(),
                    'adresse' => $commande->getAdresse(),
                    'numerotel' => $commande->getNumerotel(),
                    'commande' => $commande->getCommande()
                                 
                ]);
                echo $query->rowCount() . " records UPDATED successfully <br>";
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function recupererCommande($id)
        {
            $sql = "SELECT * from commande where idcommande=$id";
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
            $sql="SELECT * FROM commande where idcommande like '$search_value' or nom like '%$search_value%' ";
    
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
            $sql = "SELECT * FROM commande LIMIT {$start},{$perPage}";
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

    

    


        
    }