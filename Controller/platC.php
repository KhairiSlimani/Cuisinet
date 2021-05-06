<?php
    include "C://xampp/htdocs/Cuisinet/config.php";

    class PlatC {

        public function ajouterPlat($plat)
        {
            $sql = "INSERT INTO plats (nom, description, prix, type, photo) 
            VALUES (:nom, :description, :prix, :type, :photo)";
    
            $db = config::getConnexion();
            try {
                $query = $db->prepare($sql);
    
                $query->execute([
                    'nom' => $plat->getNom(),
                    'description' => $plat->getDescription(),
     'prix' => $plat->getprix(),
                   
                    'type' => $plat->getType(),
                    'photo' => $plat->getPhoto()
    
                ]);
            } catch (Exception $e) {
                echo 'Erreur: ' . $e->getMessage();
            }
        }

        public function afficherPlat()
        {
    
            $sql = "SELECT * FROM plats p LEFT JOIN promotions prm ON p.idPlat = prm.id_plat";
            $db = config::getConnexion();
            try {
                $liste = $db->query($sql);
                $liste = $liste->fetchAll(PDO::FETCH_ASSOC);
                return $liste;
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }

        public function afficherPlatSansPromo()
        {
    
            $sql = "SELECT * FROM plats p LEFT JOIN promotions prm ON p.idPlat = prm.id_plat where prm.id is null";
            $db = config::getConnexion();
            try {
                $liste = $db->query($sql);
                return $liste;
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }

        public function supprimerPlat($id)
        {

            $sql = "DELETE FROM Plats WHERE idPlat = :idPlat";
            $db = config::getConnexion();
            $req = $db->prepare($sql);
            $req->bindValue(':idPlat', $id);
            try {
                $req->execute();
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }

        public function modifierPlat($plat, $id)
        {
            $db = config::getConnexion();
            try {
                
                $query = $db->prepare(
                    'UPDATE plats SET 
                            nom = :nom, 
                            description = :description,
                            prix = :prix,
                            type = :type,
                            photo = :photo 
                        WHERE idPlat = :idPlat'
                );
                $query->execute([
                    'idPlat' =>  $id,
                    'nom' => $plat->getNom(),
                    'description' => $plat->getDescription(),
                    
                    'prix' => $plat->getPrix(),
'type' => $plat->getType(),
                    'photo' => $plat->getPhoto()
                                 
                ]);
                echo $query->rowCount() . " records UPDATED successfully <br>";
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function recupererPlat($id)
        {
            $sql = "SELECT * from plats where idPlat=$id";
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
            $sql="SELECT * FROM plats where idPlat like '$search_value' or nom like '%$search_value%' ";
    
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
            $sql = "SELECT * FROM plats LIMIT {$start},{$perPage}";
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
            $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Plats";
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

    

        public function checkPlatWithCategorie($cat)
        {
            $sql = "SELECT * FROM plats where type = '$cat' ";
            $db = config::getConnexion();
            try {
                $liste = array();
                $liste = $db->query($sql);
                $liste = $liste->fetchAll(PDO::FETCH_ASSOC);
                if($liste){
                    return true;
                }
                return false;
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }


    public function trieCroissant($page, $perPage)
    {
        $start = ($page > 1) ? ($page * $perPage) - $perPage : 0;
        $sql = "SELECT * FROM plats order by prix LIMIT {$start},{$perPage} ";
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
}