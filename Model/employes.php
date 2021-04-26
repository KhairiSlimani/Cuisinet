<?php
    class Employe {
        private  string $nom;
        private  string $prenom;
        private  int $age;
        private  string $sexe;
        private  string $titreEmploi;
        private  int $salaire;
        private  int $numeroTelephone;
        private  string $photo;

        public function __construct($nom, $prenom, $age, $sexe, $titreEmploi, $salaire, $numeroTelephone, $photo){
            //$this->idEmploye = $id;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->age = $age;
            $this->sexe = $sexe;
            $this->titreEmploi = $titreEmploi;
            $this->salaire = $salaire;
            $this->numeroTelephone = $numeroTelephone;
            $this->photo = $photo;

        }

        public function getIdEmploye () {
            return $this->idEmploye;
        }

        public function getNom (){
            return $this->nom ;
        }

        public function getPrenom (){
            return $this->prenom ;
        }

        public function getAge (){
            return $this->age ;
        }

        public function getSexe () {
            return $this->sexe;
        }

        public function getTitreEmploi(){
            return $this->titreEmploi ;
        }

        public function getSalaire(){
            return $this->salaire ;
        }

        public function getNumeroTelephone(){
            return $this->numeroTelephone ;
        }

        public function getPhoto(){
            return $this->photo ;
        }


        public function setIdEmploye ($idEmploye){
            $this->idEmploye = $idEmploye;
        }

        public function setNom ($nom){
            $this->nom = $nom;
        }

        public function setPrenom ($prenom){
            $this->prenom = $prenom;
        }

        public function setAge ($age){
            $this->age = $age;
        
        }

        public function setSexe($sexe){
            $this->sexe = $sexe;
        }

        public function setTitreEmploi ($titreEmploi){
            $this->titreEmploi = $titreEmploi;
        }

        public function setSalaire ($salaire){
            $this->salaire = $salaire;
        }

        public function setNumeroTelephone ($numeroTelephone){
            $this->numeroTelephone = $numeroTelephone;
        }

        public function setPhoto ($photo){
            $this->photo = $photo;
        }

        

    }