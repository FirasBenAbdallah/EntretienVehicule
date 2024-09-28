<?php
include '../../config/db_connect.php';
include '../../functions/nettoyages/AddNettoyages.php';

header('Content-Type: application/json');

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the input data
    $data = json_decode(file_get_contents('php://input'), true);

    // Check if all required parameters are provided
    if (isset($data['VehiculeID'], $data['ChauffeurID'], $data['DateNettoyage'], $data['PhotoAvant'], $data['PhotoApres'])) {
        // Call the AddNettoyages function
        echo AddNettoyages($data['VehiculeID'], $data['ChauffeurID'], $data['DateNettoyage'], $data['PhotoAvant'], $data['PhotoApres']);
    } else {
        echo json_encode(['error' => 'Missing required parameters']);
    }
} else {
    echo json_encode(['error' => 'Invalid request method. Please use POST']);
}
