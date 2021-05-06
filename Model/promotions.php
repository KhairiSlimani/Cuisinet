<?php

include "plats.php";

class Promotion
{
    private string $nomPromo;
    private float $pourcentage;
    private int $idPlat;
    

    public function getNomPromo()
    {
        return $this->nomPromo;
    }
    public function getPourcentage()
    {
        return $this->pourcentage;
    }
    public function getIdPlat()
    {
        return $this->idPlat;
    }


    public function setNomPromo($nomPromo)
    {
        return $this->nomPromo = $nomPromo;
    }
    public function setPourcentage($pourcentage)
    {
        return $this->pourcentage = $pourcentage;
    }
    public function setIdPlat($idPlat)
    {
        return $this->idPlat = $idPlat;
    }

    public function __construct($nomPromo , $pourcentage , $idPlat)
    {
        $this->nomPromo = $nomPromo;
        $this->pourcentage = $pourcentage;
        $this->idPlat = $idPlat;
    }
}
