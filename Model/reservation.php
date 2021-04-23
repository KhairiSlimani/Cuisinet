<?php
    class Reservation {
        private  $nomclient;
        private  $numerotel;
        private   $date;
        private   $temps;
        private  $nombre;
        

        public function __construct($nomclient, $numerotel, $date, $temps,  $nombre){
            
            $this->nomclient= $nomclient;
            $this->numerotel = $numerotel;
            $this->date = $date;
            $this->temps = $temps;
            $this->nombre = $nombre;

        }

        public function getIdReservation () {
            return $this->idres;
        }

        public function getNomclient (){
            return $this->nomclient ;
        }

        public function getNumerotel (){
            return $this->numerotel ;
        }

        public function getDate (){
            return $this->date ;
        }

        public function getTemps () {
            return $this->temps;
        }

        

        public function getNombre(){
            return $this->nombre ;
        }


        public function setIdReservation ($idres){
            $this->idres = $idres;
        }

        public function setNom ($nomclient){
            $this->nomclient = $nomclient;
        }

        public function setNumerotel ($numerotel){
            $this->numerotel = $numerotel;
        }

        public function setDate ($date){
            $this->date = $date;
        
        }

        public function setTemps($temps){
            $this->temps = $temps;
        }

       

        public function setNombre ($nombre){
            $this->nombre = $nombre;
        }

        

    }
