<?php
function logCleaning($VehiculeID, $ChauffeurID, $DateNettoyage)
{
    global $pdo;

    try {
        // Check if a cleaning record exists for the given parameters
        $stmt = $pdo->prepare("
            SELECT * FROM nettoyages 
            WHERE VehiculeID = :VehiculeID AND ChauffeurID = :ChauffeurID AND DateNettoyage = :DateNettoyage
        ");
        $stmt->execute(['VehiculeID' => $VehiculeID, 'ChauffeurID' => $ChauffeurID, 'DateNettoyage' => $DateNettoyage]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row ? true : false;
    } catch (Exception $e) {
        return false;
    }
}
