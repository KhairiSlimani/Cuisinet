<?php
    class Commande {
        
        
        private   $nomclient;
          private  $adresse;
        private   $numerotel;
        private  $commande;
       

        public function __construct($nomclient, $adresse, $numerotel, $commande){
           
            $this->nomclient = $nomclient;
            $this->adresse = $adresse;
            $this->numerotel = $numerotel;
            $this->commande = $commande;

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


        public function getCommande(){
            return $this->commande ;
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

        public function setCommande ($commande){
            $this->commande = $commande;
        }

        

    }