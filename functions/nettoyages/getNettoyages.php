<?php
function getNettoyages($NettoyageID)
{
    global $pdo;

    try {
        // Get details about the specific nettoyage record, including related vehicle and chauffeur details
        $stmt = $pdo->prepare("
            SELECT n.*, v.*, c.*
            FROM nettoyages n
            JOIN vehicule v ON n.VehiculeID = v.VehiculeID
            JOIN chauffeurs c ON n.ChauffeurID = c.ChauffeurID
            WHERE n.NettoyageID = :NettoyageID
        ");
        $stmt->execute(['NettoyageID' => $NettoyageID]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $nettoyage = new Nettoyages(
                $row['NettoyageID'],
                $row['DateNettoyage'],
                $row['PhotoAvant'],
                $row['PhotoApres'],
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
            return json_encode($nettoyage);
        } else {
            return json_encode(['error' => 'Nettoyage not found']);
        }
    } catch (Exception $e) {
        return json_encode(['error' => 'Query failed: ' . $e->getMessage()]);
    }
}
