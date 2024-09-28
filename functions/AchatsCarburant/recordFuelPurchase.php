<?php
function recordFuelPurchase($VehiculeID, $ChauffeurID, $DateAchat)
{
    global $pdo;

    try {
        // Check if a fuel purchase already exists for the given details
        $stmt = $pdo->prepare("
            SELECT * FROM achatscarburant 
            WHERE VehiculeID = :VehiculeID AND ChauffeurID = :ChauffeurID AND DateAchat = :DateAchat
        ");
        $stmt->execute(['VehiculeID' => $VehiculeID, 'ChauffeurID' => $ChauffeurID, 'DateAchat' => $DateAchat]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row ? true : false;
    } catch (Exception $e) {
        return false;
    }
}
