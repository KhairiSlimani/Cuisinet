<?php
    class Employe {
        private   $nom;
        private   $prenom;
        private   $age;
        private   $sexe;
        private   $titreEmploi;
        private   $salaire;
        private   $numeroTelephone;
        private   $photo;

        public function __construct($nom, $prenom, $age, $sexe, $titreEmploi, $salaire, $numeroTelephone, $photo){
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->age = $age;
            $this->sexe = $sexe;
            $this->titreEmploi = $titreEmploi;
            $this->salaire = $salaire;
            $this->numeroTelephone = $numeroTelephone;
            $this->photo = $photo;

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