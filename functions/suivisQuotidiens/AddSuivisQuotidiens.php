<?php
function AddSuivisQuotidiens($VehiculeID, $ChauffeurID, $DateSuivi, $Kilometrage, $VolumeCarburant, $Preuve)
{
    global $pdo;

    try {
        // Validate VehiculeID exists
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM vehicule WHERE VehiculeID = :VehiculeID");
        $stmt->execute(['VehiculeID' => $VehiculeID]);
        if ($stmt->fetchColumn() == 0) {
            return json_encode(['error' => 'VehiculeID does not exist']);
        }

        // Validate ChauffeurID exists
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM chauffeurs WHERE ChauffeurID = :ChauffeurID");
        $stmt->execute(['ChauffeurID' => $ChauffeurID]);
        if ($stmt->fetchColumn() == 0) {
            return json_encode(['error' => 'ChauffeurID does not exist']);
        }

        // Insert the new SuiviQuotidien record
        $stmt = $pdo->prepare("
            INSERT INTO suivisquotidiens (VehiculeID, ChauffeurID, DateSuivi, Kilometrage, VolumeCarburant, Preuve) 
            VALUES (:VehiculeID, :ChauffeurID, :DateSuivi, :Kilometrage, :VolumeCarburant, :Preuve)
        ");
        $stmt->bindParam(':VehiculeID', $VehiculeID);
        $stmt->bindParam(':ChauffeurID', $ChauffeurID);
        $stmt->bindParam(':DateSuivi', $DateSuivi);
        $stmt->bindParam(':Kilometrage', $Kilometrage);
        $stmt->bindParam(':VolumeCarburant', $VolumeCarburant);
        $stmt->bindParam(':Preuve', $Preuve);

        if ($stmt->execute()) {
            return json_encode(['success' => 'SuiviQuotidien added successfully']);
        } else {
            return json_encode(['error' => 'Failed to add SuiviQuotidien']);
        }
    } catch (Exception $e) {
        return json_encode(['error' => 'Query failed: ' . $e->getMessage()]);
    }
}
