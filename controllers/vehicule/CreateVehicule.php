<?php
include '../../config/db_connect.php';
include '../../functions/vehicule/createVehiculeInfo.php';

header('Content-Type: application/json');

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the POST data
    $data = json_decode(file_get_contents('php://input'), true);

    // Validate that all required fields are present
    if (isset($data['Immatriculation'], $data['Marque'], $data['Modele'], $data['Annee'])) {
        // Call the function to insert a new vehicle
        echo createVehiculeInfo($data['Immatriculation'], $data['Marque'], $data['Modele'], $data['Annee']);
    } else {
        // Missing parameters
        echo json_encode(['error' => 'Missing required parameters']);
    }
} else {
    // Invalid request method
    echo json_encode(['error' => 'Invalid request method']);
}
