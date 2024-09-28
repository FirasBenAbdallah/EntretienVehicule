<?php
include '../../config/db_connect.php';
include '../../functions/AchatsCarburant/AddAchatsCarburant.php';

header('Content-Type: application/json');

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the input data
    $data = json_decode(file_get_contents('php://input'), true);

    // Check if all required parameters are provided
    if (isset($data['VehiculeID'], $data['ChauffeurID'], $data['DateAchat'], $data['Montant'], $data['Litres'], $data['Facture'])) {
        // Call the AddAchatsCarburant function
        echo AddAchatsCarburant($data['VehiculeID'], $data['ChauffeurID'], $data['DateAchat'], $data['Montant'], $data['Litres'], $data['Facture']);
    } else {
        echo json_encode(['error' => 'Missing required parameters']);
    }
} else {
    echo json_encode(['error' => 'Invalid request method. Please use POST']);
}
