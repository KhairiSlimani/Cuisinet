<?php
    include "C://xampp/htdocs/Cuisinet/config.php";

    class clientC {

        public function ajouterClient($client)
        {
            $sql = "INSERT INTO clients (username, password, email, phone, idAdmin) 
            VALUES (:username, :password, :email, :phone, :idAdmin)";
    
            $db = config::getConnexion();
            try {
                $query = $db->prepare($sql);
    
                $query->execute([
                    'username' => $client->getUsername(),
                    'password' => $client->getPassword(),
                    'email' => $client->getEmail(),
                    'phone' => $client->getPhone(),
                    'idAdmin' => $client->getIdAdmin()
    
                ]);
            } catch (Exception $e) {
                echo 'Erreur: ' . $e->getMessage();
            }
        }

        public function verifierClient($username)
        {
            $sql = "SELECT * from clients where username='$username' ";
            $db = config::getConnexion();
            try {
                $query = $db->prepare($sql);
                $query->execute();
                $result = $query->rowCount();
                return $result;
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }

        public function connecterClient($username , $password)
        {
            $sql = "SELECT * from clients where username='$username' and password='$password' ";
            $db = config::getConnexion();
            try {
                $query = $db->prepare($sql);
                $query->execute();
    
                $user = $query->fetch();
                return $user;
            } catch (Exception $e) {
                return false;
            }
        }



        public function afficherClient()
        {
    
            $sql = "SELECT * FROM clients";
            $db = config::getConnexion();
            try {
                $liste = $db->query($sql);
                return $liste;
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }

        public function supprimerClient($id)
        {
            $sql = "DELETE FROM clients WHERE id = :id";
            $db = config::getConnexion();
            $req = $db->prepare($sql);
            $req->bindValue(':id', $id);
            try {
                $req->execute();
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }

        public function modifierClient($client, $id)
        {
            $db = config::getConnexion();
            try {
                
                $query = $db->prepare(
                    'UPDATE clients SET 
                            username = :username,
                            password = :password,
                            email = :email,
                            phone = :phone,
                            idAdmin = :idAdmin
                        WHERE id = :id'
                );
                $query->execute([
                    'id' =>  $id,
                    'username' =>  $client->getUsername(),
                    'password' => $client->getPassword(),
                    'email' => $client->getEmail(),
                    'phone' => $client->getPhone(),
                    'idAdmin' => $client->getIdAdmin()
                                 
                ]);
                echo $query->rowCount() . " records UPDATED successfully <br>";
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function recupererClient($id)
        {
            $sql = "SELECT * from clients where id=$id";
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

        public function recupererClientUS($username)
        {
            $sql = "SELECT * from clients where username='$username' ";
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

        public function recupererClientEmail($email)
        {
            $sql = "SELECT * from clients where email='$email' ";
            $db = config::getConnexion();
            try {
                $query = $db->prepare($sql);
                $query->execute();
    
                $user = $query->fetch();
                return $user;
            } catch (Exception $e) {
                return false;
            }
        }

        public function recherche($search_value)
        {
            $sql="SELECT * FROM clients where username like '$search_value' ";
    
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
            $sql = "SELECT * FROM clients LIMIT {$start},{$perPage}";
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
            $sql = "SELECT * FROM clients order by username LIMIT {$start},{$perPage}";
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
            $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM clients";
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