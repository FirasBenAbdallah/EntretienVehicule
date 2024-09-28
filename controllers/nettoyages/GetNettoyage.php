<?php
include '../../config/db_connect.php';
include '../../models/Nettoyages.php';
include '../../functions/nettoyages/getNettoyages.php';

header('Content-Type: application/json');

// Check if the request method is GET and VehiculeID is provided
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['NettoyageID'])) {
        $NettoyageID = $_GET['NettoyageID'];

        // Call the getNettoyages function
        echo getNettoyages($NettoyageID);
    } else {
        echo json_encode(['error' => 'NettoyageID parameter is required']);
    }
} else {
    echo json_encode(['error' => 'Invalid request method. Please use GET']);
}
