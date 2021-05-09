<?php
    class Reservation {
        private $numerotel;
        private $date;
        private $temps;
        private $nombre;
        private $idclient;
        

        public function __construct($numerotel, $date, $temps,  $nombre,$idclient){
            
            $this->numerotel = $numerotel;
            $this->date = $date;
            $this->temps = $temps;
            $this->nombre = $nombre;
            $this->idclient = $idclient;

        }

        public function getIdReservation () {
            return $this->idres;
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
        public function getIdClient()
        {
            return $this->idclient;
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
        public function setIdClient($idclient)
    {
        $this->idclient = $idclient;
    }


        

    }
