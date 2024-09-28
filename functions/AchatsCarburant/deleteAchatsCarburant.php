<?php
function deleteAchatsCarburant($AchatID)
{
    global $pdo;

    try {
        // Check if the fuel purchase exists
        $stmt = $pdo->prepare("SELECT * FROM achatscarburant WHERE AchatID = :AchatID");
        $stmt->execute(['AchatID' => $AchatID]);
        if ($stmt->rowCount() === 0) {
            return json_encode(['error' => 'Fuel purchase not found']);
        }

        // Proceed to delete the fuel purchase
        $stmt = $pdo->prepare("DELETE FROM achatscarburant WHERE AchatID = :AchatID");
        if ($stmt->execute(['AchatID' => $AchatID])) {
            return json_encode(['success' => 'Fuel purchase deleted successfully']);
        } else {
            return json_encode(['error' => 'Failed to delete fuel purchase']);
        }
    } catch (Exception $e) {
        return json_encode(['error' => 'Query failed: ' . $e->getMessage()]);
    }
}
