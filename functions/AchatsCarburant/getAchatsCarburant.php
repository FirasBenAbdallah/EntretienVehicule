<?php
function getAchatsCarburant($AchatID)
{
    global $pdo;

    try {
        $stmt = $pdo->prepare("
            SELECT a.*, v.*, c.*
            FROM achatscarburant a
            JOIN vehicule v ON a.VehiculeID = v.VehiculeID
            JOIN chauffeurs c ON a.ChauffeurID = c.ChauffeurID
            WHERE a.AchatID = :AchatID
        ");
        $stmt->execute(['AchatID' => $AchatID]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
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
            return json_encode($achat);
        } else {
            return json_encode(['error' => 'Fuel purchase not found']);
        }
    } catch (Exception $e) {
        return json_encode(['error' => 'Query failed: ' . $e->getMessage()]);
    }
}
