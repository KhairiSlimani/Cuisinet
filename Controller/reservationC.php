<?php
    include "C://xampp/htdocs/Cuisinet/config.php";

    class reservationC {

        public function ajouterReservation($reservation)
        {
            $sql = "INSERT INTO reservation (nomclient, numerotel, date, temps, nombre) 
            VALUES (:nomclient, :numerotel, :date, :temps, :nombre)";
    
            $db = config::getConnexion();
            try {
                $query = $db->prepare($sql);
    
                $query->execute([
                    'nomclient' => $reservation->getNomclient(),
                    'numerotel' => $reservation->getNumerotel(),
                    'date' => $reservation->getDate(),
                    'temps' => $reservation->getTemps(),
                    
                    'nombre' => $reservation->getNombre()
    
                ]);
            } catch (Exception $e) {
                echo 'Erreur: ' . $e->getMessage();
            }
        }

        public function afficherReservation()
        {
    
            $sql = "SELECT * FROM reservation";
            $db = config::getConnexion();
            try {
                $liste = $db->query($sql);
                return $liste;
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }

        public function supprimerReservation($idres)
        {
            $sql = "DELETE FROM reservation WHERE idres = :idres";
            $db = config::getConnexion();
            $req = $db->prepare($sql);
            $req->bindValue(':idres', $idres);
            try {
                $req->execute();
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }

        public function modifierReservation($reservation, $idres)
        {
            $db = config::getConnexion();
            try {
                
                $query = $db->prepare(
                    'UPDATE reservation SET 
                            nomclient = :nomclient, 
                            numerotel= :numerotel,
                            date = :date,
                            temps = :temps,
                            nombre = :nombre 
                        WHERE idres = :idres'
                );
                $query->execute([
                    'idres' =>  $idres,
                    'nomclient' => $reservation->getNomclient(),
                    'numerotel' => $reservation->getNumerotel(),
                    'date' => $reservation->getDate(),
                    'temps' => $reservation->getTemps(),
                    
                    'nombre' => $reservation->getNombre()
                                 
                ]);
                echo $query->rowCount() . " records UPDATED successfully <br>";
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function recupererReservation($idres)
        {
            $sql = "SELECT * from reservation where idres=$idres";
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
            $sql="SELECT * FROM reservation where idres like '$search_value' or nom like '%$search_value%' ";
    
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
            $sql = "SELECT * FROM reservation LIMIT {$start},{$perPage}";
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
            $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM reservation";
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