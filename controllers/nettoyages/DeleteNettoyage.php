<?php
include '../../config/db_connect.php';
include '../../functions/nettoyages/deleteNettoyages.php';

header('Content-Type: application/json');

// Check if the request method is DELETE or GET
if ($_SERVER['REQUEST_METHOD'] === 'DELETE' || $_SERVER['REQUEST_METHOD'] === 'GET') {
    // Check if the NettoyageID is provided in the query string
    if (isset($_GET['NettoyageID'])) {
        $NettoyageID = $_GET['NettoyageID'];

        // Call the deleteNettoyages function
        echo deleteNettoyages($NettoyageID);
    } else {
        echo json_encode(['error' => 'NettoyageID parameter is required']);
    }
} else {
    echo json_encode(['error' => 'Invalid request method. Please use DELETE or GET']);
}
