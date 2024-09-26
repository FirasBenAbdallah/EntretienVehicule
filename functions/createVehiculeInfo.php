<?php
function createVehiculeInfo($Immatriculation, $Marque, $Modele, $Annee)
{
    global $pdo;

    try {
        // Prepare the SQL query to insert a new row into the vehicule table
        $stmt = $pdo->prepare("
            INSERT INTO vehicule (Immatriculation, Marque, Modele, Annee) 
            VALUES (:Immatriculation, :Marque, :Modele, :Annee)
        ");

        // Bind the parameters
        $stmt->bindParam(':Immatriculation', $Immatriculation);
        $stmt->bindParam(':Marque', $Marque);
        $stmt->bindParam(':Modele', $Modele);
        $stmt->bindParam(':Annee', $Annee);

        // Execute the query
        if ($stmt->execute()) {
            return json_encode(['success' => 'Vehicle added successfully']);
        } else {
            return json_encode(['error' => 'Failed to add vehicle']);
        }
    } catch (Exception $e) {
        return json_encode(['error' => 'Query failed: ' . $e->getMessage()]);
    }
}
