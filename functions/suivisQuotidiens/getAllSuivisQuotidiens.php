<?php
function getAllSuivisQuotidiens()
{
    global $pdo;

    try {
        $stmt = $pdo->prepare("
            SELECT s.*, v.*, c.*
            FROM suivisquotidiens s
            JOIN vehicule v ON s.VehiculeID = v.VehiculeID
            JOIN chauffeurs c ON s.ChauffeurID = c.ChauffeurID
        ");
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($rows) {
            $suivisList = [];
            foreach ($rows as $row) {
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
                $suivisList[] = $suivi;
            }
            return json_encode($suivisList);
        } else {
            return json_encode(['error' => 'No records found']);
        }
    } catch (Exception $e) {
        return json_encode(['error' => 'Query failed: ' . $e->getMessage()]);
    }
}
