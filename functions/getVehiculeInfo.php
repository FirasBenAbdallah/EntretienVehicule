<?php
function getVehiculeInfo($VehiculeID)
{
    global $pdo;

    try {
        // Updated table name to lowercase 'vehicule'
        $stmt = $pdo->prepare("SELECT * FROM vehicule WHERE VehiculeID = :VehiculeID");
        $stmt->execute(['VehiculeID' => $VehiculeID]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            // Return vehicle data
            $vehicule = new Vehicule(
                $row['VehiculeID'],
                $row['Immatriculation'],
                $row['Marque'],
                $row['Modele'],
                $row['Annee']
            );
            return json_encode($vehicule);
        } else {
            return json_encode(['error' => 'Vehicle not found']);
        }
    } catch (Exception $e) {
        return json_encode(['error' => 'Query failed: ' . $e->getMessage()]);
    }
}
