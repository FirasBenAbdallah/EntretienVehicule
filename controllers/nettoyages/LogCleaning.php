<?php
include '../../config/db_connect.php';
include '../../functions/nettoyages/logCleaning.php';

header('Content-Type: application/json');

// Check if the request method is GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Ensure all necessary parameters are provided
    if (isset($_GET['VehiculeID'], $_GET['ChauffeurID'], $_GET['DateNettoyage'])) {
        $VehiculeID = $_GET['VehiculeID'];
        $ChauffeurID = $_GET['ChauffeurID'];
        $DateNettoyage = $_GET['DateNettoyage'];

        // Call the logCleaning function and output the result
        $result = logCleaning($VehiculeID, $ChauffeurID, $DateNettoyage);

        if ($result) {
            echo json_encode(['success' => 'Cleaning log exists for the given details']);
        } else {
            echo json_encode(['error' => 'No cleaning log found for the given details']);
        }
    } else {
        echo json_encode(['error' => 'Missing required parameters (VehiculeID, ChauffeurID, DateNettoyage)']);
    }
} else {
    echo json_encode(['error' => 'Invalid request method. Please use GET']);
}
