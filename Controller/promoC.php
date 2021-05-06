
<?php
    
 
     class PromoC {

        public function ajouterPromo($promo)
        {
            $sql = "INSERT INTO promotions (nomPromo, pourcentage, id_plat) 
            VALUES (:nom, :pourcentage, :plat)";
    
            $db = config::getConnexion();
            try {
                $query = $db->prepare($sql);
    
                $query->execute([
                    'nom' => $promo->getNomPromo(),
                    'pourcentage' => $promo->getPourcentage(),
                    'plat' => $promo->getIdPlat()
    
                ]);
            } catch (Exception $e) {
                echo 'Erreur: ' . $e->getMessage();
            }
        }

        public function afficherPromo()
        {
    
            $sql = "SELECT * FROM plats p LEFT JOIN promotions prm ON p.idPlat = prm.id_plat";
            $db = config::getConnexion();
            try {
                $liste = $db->query($sql);
                return $liste;
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }

   

        public function supprimerPromo($id)
        {
            $sql = "DELETE FROM promotions WHERE id = :id";
            $db = config::getConnexion();
            $req = $db->prepare($sql);
            $req->bindValue(':id', $id);
            try {
                $req->execute();
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }

        public function modifierPromo($promo, $id)
        {
            $db = config::getConnexion();
            try {

               
                $query = $db->prepare(
                    'UPDATE promotions SET 
                            nomPromo = :nom, 
                            pourcentage = :pourcentage,
                            id_plat = :plat
                        WHERE id = :id'
                );
                    $query->execute([
                    'nom' => $promo->getNomPromo(),
                    'pourcentage' => $promo->getPourcentage(),
                    'plat' => $promo->getIdPlat(),
                    'id' =>  $id                                 
                ]);

                echo $query->rowCount() . " records UPDATED successfully <br>";
                   
            } catch (PDOException $e) {
                $e->getMessage();
               
            }
        }

        public function recupererPromo($id)
        {
            $sql = "SELECT * from promotions where id=$id";
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
            $sql = "SELECT * FROM promotions LIMIT {$start},{$perPage}";
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

    

    


        
    }