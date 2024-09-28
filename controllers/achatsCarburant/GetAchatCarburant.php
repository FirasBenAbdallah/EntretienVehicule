<?php
include '../../config/db_connect.php';
include '../../models/AchatsCarburant.php';
include '../../functions/AchatsCarburant/getAchatsCarburant.php';

header('Content-Type: application/json');

// Check if the request method is GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['AchatID'])) {
        $AchatID = $_GET['AchatID'];

        // Call the getAchatsCarburant function
        echo getAchatsCarburant($AchatID);
    } else {
        echo json_encode(['error' => 'AchatID parameter is required']);
    }
} else {
    echo json_encode(['error' => 'Invalid request method. Please use GET']);
}
