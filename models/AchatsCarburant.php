<?php
class AchatsCarburant
{
    public $AchatID;
    public $DateAchat;
    public $Montant;
    public $Litres;
    public $Facture;
    public $VehiculeDetails;
    public $ChauffeurDetails;

    public function __construct($AchatID, $DateAchat, $Montant, $Litres, $Facture, $VehiculeDetails = null, $ChauffeurDetails = null)
    {
        $this->AchatID = $AchatID;
        $this->DateAchat = $DateAchat;
        $this->Montant = $Montant;
        $this->Litres = $Litres;
        $this->Facture = $Facture;
        $this->VehiculeDetails = $VehiculeDetails;
        $this->ChauffeurDetails = $ChauffeurDetails;
    }
}
