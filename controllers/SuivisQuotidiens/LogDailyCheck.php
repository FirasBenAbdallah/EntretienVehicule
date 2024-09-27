<?php
include '../../config/db_connect.php';
include '../../functions/suivisQuotidiens/logDailyCheck.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Ensure all necessary parameters are provided
    if (isset($_GET['VehiculeID'], $_GET['ChauffeurID'], $_GET['DateSuivi'])) {
        $VehiculeID = $_GET['VehiculeID'];
        $ChauffeurID = $_GET['ChauffeurID'];
        $DateSuivi = $_GET['DateSuivi'];

        // Call the logDailyCheck function and output the result
        $result = logDailyCheck($VehiculeID, $ChauffeurID, $DateSuivi);

        if ($result) {
            echo json_encode(['success' => 'Daily check log exists for the given details']);
        } else {
            echo json_encode(['error' => 'No daily check log found for the given details']);
        }
    } else {
        // Missing parameters
        echo json_encode(['error' => 'Missing required parameters (VehiculeID, ChauffeurID, DateSuivi)']);
    }
} else {
    // Invalid request method
    echo json_encode(['error' => 'Invalid request method. Please use GET']);
}
