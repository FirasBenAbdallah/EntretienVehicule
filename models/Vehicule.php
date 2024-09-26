<?php
class Vehicule
{
    public $VehiculeID;
    public $Immatriculation;
    public $Marque;
    public $Modele;
    public $Annee;

    public function __construct($VehiculeID, $Immatriculation, $Marque, $Modele, $Annee)
    {
        $this->VehiculeID = $VehiculeID;
        $this->Immatriculation = $Immatriculation;
        $this->Marque = $Marque;
        $this->Modele = $Modele;
        $this->Annee = $Annee;
    }
}
