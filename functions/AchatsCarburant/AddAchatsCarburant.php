<?php
function AddAchatsCarburant($VehiculeID, $ChauffeurID, $DateAchat, $Montant, $Litres, $Facture)
{
    global $pdo;

    try {
        // Check if VehiculeID exists
        $stmt = $pdo->prepare("SELECT * FROM vehicule WHERE VehiculeID = :VehiculeID");
        $stmt->execute(['VehiculeID' => $VehiculeID]);
        if ($stmt->rowCount() === 0) {
            return json_encode(['error' => 'VehiculeID does not exist']);
        }

        // Check if ChauffeurID exists
        $stmt = $pdo->prepare("SELECT * FROM chauffeurs WHERE ChauffeurID = :ChauffeurID");
        $stmt->execute(['ChauffeurID' => $ChauffeurID]);
        if ($stmt->rowCount() === 0) {
            return json_encode(['error' => 'ChauffeurID does not exist']);
        }

        // Insert the new fuel purchase record
        $stmt = $pdo->prepare("
            INSERT INTO achatscarburant (VehiculeID, ChauffeurID, DateAchat, Montant, Litres, Facture) 
            VALUES (:VehiculeID, :ChauffeurID, :DateAchat, :Montant, :Litres, :Facture)
        ");
        $stmt->bindParam(':VehiculeID', $VehiculeID);
        $stmt->bindParam(':ChauffeurID', $ChauffeurID);
        $stmt->bindParam(':DateAchat', $DateAchat);
        $stmt->bindParam(':Montant', $Montant);
        $stmt->bindParam(':Litres', $Litres);
        $stmt->bindParam(':Facture', $Facture);

        if ($stmt->execute()) {
            return json_encode(['success' => 'Fuel purchase recorded successfully']);
        } else {
            return json_encode(['error' => 'Failed to record fuel purchase']);
        }
    } catch (Exception $e) {
        return json_encode(['error' => 'Query failed: ' . $e->getMessage()]);
    }
}
