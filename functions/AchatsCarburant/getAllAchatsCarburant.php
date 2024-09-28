<?php
function getAllAchatsCarburant()
{
    global $pdo;

    try {
        $stmt = $pdo->prepare("
            SELECT a.*, v.*, c.*
            FROM achatscarburant a
            JOIN vehicule v ON a.VehiculeID = v.VehiculeID
            JOIN chauffeurs c ON a.ChauffeurID = c.ChauffeurID
            ORDER BY a.AchatID
        ");
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($rows) {
            $achatsList = [];
            foreach ($rows as $row) {
                $achat = new AchatsCarburant(
                    $row['AchatID'],
                    $row['DateAchat'],
                    $row['Montant'],
                    $row['Litres'],
                    $row['Facture'],
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
                $achatsList[] = $achat;
            }
            return json_encode($achatsList);
        } else {
            return json_encode(['error' => 'No fuel purchases found']);
        }
    } catch (Exception $e) {
        return json_encode(['error' => 'Query failed: ' . $e->getMessage()]);
    }
}
