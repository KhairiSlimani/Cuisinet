<?php
    class Commande {
        
        
        private   $nomclient;
        private  $adresse;
        private   $numerotel;
        private  $idPlat;
       

        public function __construct($nomclient, $adresse, $numerotel, $idPlat){
           
            $this->nomclient = $nomclient;
            $this->adresse = $adresse;
            $this->numerotel = $numerotel;
            $this->idPlat = $idPlat;

        }

        public function getIdCommande () {
            return $this->idCommande;
        }
        public function getNomclient (){
            return $this->nomclient ;
        }

        public function getAdresse (){
            return $this->adresse ;
        }

        public function getNumerotel (){
            return $this->numerotel ;
        }
        public function getIdPlat(){
            return $this->idPlat ;
        }


        public function setIdCommande ($idcommande){
            $this->idcommande = $idcommande;
        }

        public function setNomclient ($nomclient){
            $this->nomclient = $nomclient;
        }

        public function setAdresse ($adresse){
            $this->adresse = $adresse;
        }


        public function setNumeroTelephone ($numerotel){
            $this->numerotel = $numerotel;
        } 
        
        public function setIdPlat ($idPlat){
            $this->idPlat = $idPlat;
        }

        

    }