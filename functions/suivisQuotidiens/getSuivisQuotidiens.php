<?php
function geSuivisQuotidiens($SuiviID)
{
    global $pdo;

    try {
        $stmt = $pdo->prepare("
            SELECT s.*, v.*, c.*
            FROM suivisquotidiens s
            JOIN vehicule v ON s.VehiculeID = v.VehiculeID
            JOIN chauffeurs c ON s.ChauffeurID = c.ChauffeurID
            WHERE s.SuiviID = :SuiviID
        ");
        $stmt->execute(['SuiviID' => $SuiviID]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $suivi = new SuivisQuotidiens(
                $row['SuiviID'],
                $row['DateSuivi'],
                $row['Kilometrage'],
                $row['VolumeCarburant'],
                $row['Preuve'],
                [
                    'Immatriculation' => $row['Immatriculation'],
                    'Marque' => $row['Marque'],
                    'Modele' => $row['Modele'],
                    'Annee' => $row['Annee']
                ],
                [
                    'Nom' => $row['Nom'],
                    'Prenom' => $row['Prenom'],
                    'NumeroPermis' => $row['NumeroPermis'],
                    'DateEmbauche' => $row['DateEmbauche']
                ]
            );
            return json_encode($suivi);
        } else {
            return json_encode(['error' => 'Suivi not found']);
        }
    } catch (Exception $e) {
        return json_encode(['error' => 'Query failed: ' . $e->getMessage()]);
    }
}
