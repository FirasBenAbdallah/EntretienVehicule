<?php
class Nettoyages
{
    public $NettoyageID;
    // public $VehiculeID;
    // public $ChauffeurID;
    public $DateNettoyage;
    public $PhotoAvant;
    public $PhotoApres;
    public $VehiculeDetails;
    public $ChauffeurDetails;

    public function __construct($NettoyageID, $DateNettoyage, $PhotoAvant, $PhotoApres,  $VehiculeDetails = null, $ChauffeurDetails = null)
    {
        $this->NettoyageID = $NettoyageID;
        $this->DateNettoyage = $DateNettoyage;
        $this->PhotoAvant = $PhotoAvant;
        $this->PhotoApres = $PhotoApres;
        $this->VehiculeDetails = $VehiculeDetails;
        $this->ChauffeurDetails = $ChauffeurDetails;
    }
}
