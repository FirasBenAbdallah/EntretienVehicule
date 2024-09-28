<?php
include '../../config/db_connect.php';
include '../../functions/AchatsCarburant/deleteAchatsCarburant.php';

header('Content-Type: application/json');

// Check if the request method is DELETE or GET
if ($_SERVER['REQUEST_METHOD'] === 'DELETE' || $_SERVER['REQUEST_METHOD'] === 'GET') {
    // Check if the AchatID is provided in the query string
    if (isset($_GET['AchatID'])) {
        $AchatID = $_GET['AchatID'];

        // Call the deleteAchatsCarburant function
        echo deleteAchatsCarburant($AchatID);
    } else {
        echo json_encode(['error' => 'AchatID parameter is required']);
    }
} else {
    echo json_encode(['error' => 'Invalid request method. Please use DELETE or GET']);
}
