<?php
include '../../config/db_connect.php';
include '../../models/Nettoyages.php';
include '../../functions/nettoyages/getAllNettoyages.php';

header('Content-Type: application/json');

// Check if the request method is GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Call the getAllNettoyages function
    echo getAllNettoyages();
} else {
    echo json_encode(['error' => 'Invalid request method. Please use GET']);
}
