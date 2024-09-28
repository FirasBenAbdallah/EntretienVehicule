<?php
include '../../config/db_connect.php';
include '../../models/AchatsCarburant.php';
include '../../functions/AchatsCarburant/getAllAchatsCarburant.php';

header('Content-Type: application/json');

// Check if the request method is GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Call the getAllAchatsCarburant function
    echo getAllAchatsCarburant();
} else {
    echo json_encode(['error' => 'Invalid request method. Please use GET']);
}
