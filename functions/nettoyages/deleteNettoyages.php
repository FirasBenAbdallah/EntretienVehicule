<?php
function deleteNettoyages($NettoyageID)
{
    global $pdo;

    try {
        // Check if the nettoyage exists
        $stmt = $pdo->prepare("SELECT * FROM nettoyages WHERE NettoyageID = :NettoyageID");
        $stmt->execute(['NettoyageID' => $NettoyageID]);
        if ($stmt->rowCount() === 0) {
            return json_encode(['error' => 'Nettoyage not found']);
        }

        // Proceed to delete the nettoyage
        $stmt = $pdo->prepare("DELETE FROM nettoyages WHERE NettoyageID = :NettoyageID");
        if ($stmt->execute(['NettoyageID' => $NettoyageID])) {
            return json_encode(['success' => 'Nettoyage deleted successfully']);
        } else {
            return json_encode(['error' => 'Failed to delete nettoyage']);
        }
    } catch (Exception $e) {
        return json_encode(['error' => 'Query failed: ' . $e->getMessage()]);
    }
}
