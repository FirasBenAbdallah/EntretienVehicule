<?php
function deleteVehicule($VehiculeID)
{
    global $pdo;

    try {
        // Check if the vehicle exists
        $stmt = $pdo->prepare("SELECT * FROM vehicule WHERE VehiculeID = :VehiculeID");
        $stmt->execute(['VehiculeID' => $VehiculeID]);
        if ($stmt->rowCount() === 0) {
            return json_encode(['error' => 'Vehicle not found']);
        }

        // Proceed to delete the vehicle
        $stmt = $pdo->prepare("DELETE FROM vehicule WHERE VehiculeID = :VehiculeID");
        if ($stmt->execute(['VehiculeID' => $VehiculeID])) {
            return json_encode(['success' => 'Vehicle deleted successfully']);
        } else {
            return json_encode(['error' => 'Failed to delete vehicle']);
        }
    } catch (Exception $e) {
        return json_encode(['error' => 'Query failed: ' . $e->getMessage()]);
    }
}
