<?php
    class Plat {
        private  $idPlat;
        private  $nom;
        private  $description;
        private  $prix;
        private  $type;
        private  $photo;

        public function __construct($nom, $description, $prix, $type ,$photo){
            //$this->idPlat = $id;
            $this->nom = $nom;
            $this->description = $description;
            $this->prix = $prix;
            $this->type = $type;
            $this->photo = $photo;

        }

        public function getIdPlat () {
            return $this->idPlat;
        }

        public function getNom (){
            return $this->nom ;
        }

        public function getDescription (){
            return $this->description ;
        }
        

        public function getPrix (){
            return $this->prix ;
        }
public function getType (){
            return $this->type ;
        }
    

        public function getPhoto(){
            return $this->photo ;
        }


        public function setIdPlat ($idPlat){
            $this->idPlat = $idPlat;
        }

        public function setNom ($nom){
            $this->nom = $nom;
        }

        public function setDescription ($description){
            $this->description = $description;
        }
      

        public function setPrix ($prix){
            $this->prix = $prix;
        
        }
  public function setType ($type){
            $this->type = $type;
        }

        public function setPhoto ($photo){
            $this->photo = $photo;
        }

        

    }