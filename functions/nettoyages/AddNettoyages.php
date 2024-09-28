<?php
function AddNettoyages($VehiculeID, $ChauffeurID, $DateNettoyage, $PhotoAvant, $PhotoApres)
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

        // Insert new nettoyage record
        $stmt = $pdo->prepare("
            INSERT INTO nettoyages (VehiculeID, ChauffeurID, DateNettoyage, PhotoAvant, PhotoApres) 
            VALUES (:VehiculeID, :ChauffeurID, :DateNettoyage, :PhotoAvant, :PhotoApres)
        ");
        $stmt->bindParam(':VehiculeID', $VehiculeID);
        $stmt->bindParam(':ChauffeurID', $ChauffeurID);
        $stmt->bindParam(':DateNettoyage', $DateNettoyage);
        $stmt->bindParam(':PhotoAvant', $PhotoAvant);
        $stmt->bindParam(':PhotoApres', $PhotoApres);

        if ($stmt->execute()) {
            return json_encode(['success' => 'Nettoyage added successfully']);
        } else {
            return json_encode(['error' => 'Failed to add nettoyage']);
        }
    } catch (Exception $e) {
        return json_encode(['error' => 'Query failed: ' . $e->getMessage()]);
    }
}
