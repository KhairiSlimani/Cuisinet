<?php
    include "C://xampp/htdocs/Cuisinet/config.php";

    class employeC {

        public function ajouterEmploye($employe)
        {
            $sql = "INSERT INTO employes (nom, prenom, age, sexe, titreEmploi, salaire, numeroTelephone, photo) 
            VALUES (:nom, :prenom, :age, :sexe, :titreEmploi, :salaire, :numeroTelephone, :photo)";

            $db = config::getConnexion();

            try {
                $query = $db->prepare($sql);
    
                $query->execute([
                    'nom' => $employe->getNom(),
                    'prenom' => $employe->getPrenom(),
                    'age' => $employe->getAge(),
                    'sexe' => $employe->getSexe(),
                    'titreEmploi' => $employe->getTitreEmploi(),
                    'salaire' => $employe->getSalaire(),
                    'numeroTelephone' => $employe->getNumeroTelephone(),
                    'photo' => $employe->getPhoto()
    
                ]);
            } catch (Exception $e) {
                echo 'Erreur: ' . $e->getMessage();
            }
        }

        public function afficherEmploye()
        {
    
            $sql = "SELECT * FROM employes";
            $db = config::getConnexion();
            try {
                $liste = $db->query($sql);
                return $liste;
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }


        public function supprimerEmploye($id)
        {
            $sql = "DELETE FROM employes WHERE idEmploye = :idEmploye";
            $db = config::getConnexion();
            $req = $db->prepare($sql);
            $req->bindValue(':idEmploye', $id);
            try {
                $req->execute();
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }

        public function modifierEmploye($employe, $id)
        {
            $db = config::getConnexion();
            try {
                
                $query = $db->prepare(
                    'UPDATE employes SET 
                            nom = :nom, 
                            prenom= :prenom,
                            age = :age,
                            sexe = :sexe,
                            titreEmploi = :titreEmploi, 
                            salaire= :salaire,
                            numeroTelephone = :numeroTelephone,
                            photo = :photo 
                        WHERE idEmploye = :idEmploye'
                );
                $query->execute([
                    'idEmploye' =>  $id,
                    'nom' => $employe->getNom(),
                    'prenom' => $employe->getPrenom(),
                    'age' => $employe->getAge(),
                    'sexe' => $employe->getSexe(),
                    'titreEmploi' => $employe->getTitreEmploi(),
                    'salaire' => $employe->getSalaire(),
                    'numeroTelephone' => $employe->getNumeroTelephone(),
                    'photo' => $employe->getPhoto()
                                 
                ]);
                echo $query->rowCount() . " records UPDATED successfully <br>";
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function recupererEmploye($id)
        {
            $sql = "SELECT * from employes where idEmploye=$id";
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
            $sql="SELECT * FROM employes where idEmploye like '$search_value' or nom like '%$search_value%' ";
    
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
            $sql = "SELECT * FROM employes LIMIT {$start},{$perPage} ";
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
            $sql = "SELECT * FROM employes order by age LIMIT {$start},{$perPage} ";
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
            $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM employes";
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