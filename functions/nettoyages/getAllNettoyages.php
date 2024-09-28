<?php
function getAllNettoyages()
{
    global $pdo;

    try {
        // Get all records from the nettoyages table
        $stmt = $pdo->prepare("
            SELECT n.*, v.*, c.*
            FROM nettoyages n
            JOIN vehicule v ON n.VehiculeID = v.VehiculeID
            JOIN chauffeurs c ON n.ChauffeurID = c.ChauffeurID
            ORDER BY n.NettoyageID 
        ");
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($rows) {
            $nettoyagesList = [];
            foreach ($rows as $row) {
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
                $nettoyagesList[] = $nettoyage;
            }
            return json_encode($nettoyagesList);
        } else {
            return json_encode(['error' => 'No records found']);
        }
    } catch (Exception $e) {
        return json_encode(['error' => 'Query failed: ' . $e->getMessage()]);
    }
}
