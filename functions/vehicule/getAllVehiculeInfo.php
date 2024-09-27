<?php
function getAllVehiculeInfo()
{
    global $pdo;

    try {
        // Fetch all vehicles from the vehicule table
        $stmt = $pdo->prepare("SELECT * FROM vehicule");
        $stmt->execute();

        // Fetch all records as associative array
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // If rows are found, map them to Vehicule objects
        if ($rows) {
            $vehicules = [];
            foreach ($rows as $row) {
                $vehicule = new Vehicule(
                    $row['VehiculeID'],
                    $row['Immatriculation'],
                    $row['Marque'],
                    $row['Modele'],
                    $row['Annee']
                );
                $vehicules[] = $vehicule;
            }
            // Return the array of vehicules as JSON
            return json_encode($vehicules);
        } else {
            return json_encode(['error' => 'No vehicles found']);
        }
    } catch (Exception $e) {
        return json_encode(['error' => 'Query failed: ' . $e->getMessage()]);
    }
}
