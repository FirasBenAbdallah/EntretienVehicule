<?php
class Chauffeur
{
    public $ChauffeurID;
    public $Nom;
    public $Prenom;
    public $NumeroPermis;
    public $DateEmbauche;

    public function __construct($ChauffeurID, $Nom, $Prenom, $NumeroPermis, $DateEmbauche)
    {
        $this->ChauffeurID = $ChauffeurID;
        $this->Nom = $Nom;
        $this->Prenom = $Prenom;
        $this->NumeroPermis = $NumeroPermis;
        $this->DateEmbauche = $DateEmbauche;
    }
}
