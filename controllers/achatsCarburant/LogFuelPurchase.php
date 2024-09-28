<?php
include '../../config/db_connect.php';
include '../../functions/AchatsCarburant/recordFuelPurchase.php';

header('Content-Type: application/json');

// Check if the request method is GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Ensure all necessary parameters are provided
    if (isset($_GET['VehiculeID'], $_GET['ChauffeurID'], $_GET['DateAchat'])) {
        $VehiculeID = $_GET['VehiculeID'];
        $ChauffeurID = $_GET['ChauffeurID'];
        $DateAchat = $_GET['DateAchat'];

        // Call the recordFuelPurchase function and output the result
        $result = recordFuelPurchase($VehiculeID, $ChauffeurID, $DateAchat);

        if ($result) {
            echo json_encode(['success' => 'Fuel purchase log exists for the given details']);
        } else {
            echo json_encode(['error' => 'No fuel purchase log found for the given details']);
        }
    } else {
        echo json_encode(['error' => 'Missing required parameters (VehiculeID, ChauffeurID, DateAchat)']);
    }
} else {
    echo json_encode(['error' => 'Invalid request method. Please use GET']);
}
