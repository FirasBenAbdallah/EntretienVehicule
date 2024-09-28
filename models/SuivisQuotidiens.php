<?php
class SuivisQuotidiens
{
    public $SuiviID;
    public $DateSuivi;
    public $Kilometrage;
    public $VolumeCarburant;
    public $Preuve;
    public $VehiculeDetails;
    public $ChauffeurDetails;

    public function __construct($SuiviID, $DateSuivi, $Kilometrage, $VolumeCarburant, $Preuve, $VehiculeDetails = null, $ChauffeurDetails = null)
    {
        $this->SuiviID = $SuiviID;
        $this->DateSuivi = $DateSuivi;
        $this->Kilometrage = $Kilometrage;
        $this->VolumeCarburant = $VolumeCarburant;
        $this->Preuve = $Preuve;
        $this->VehiculeDetails = $VehiculeDetails;
        $this->ChauffeurDetails = $ChauffeurDetails;
    }
}
