<?php
include '../../config/db_connect.php';
include '../../functions/suivisQuotidiens/AddSuivisQuotidiens.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['VehiculeID'], $data['ChauffeurID'], $data['DateSuivi'], $data['Kilometrage'], $data['VolumeCarburant'], $data['Preuve'])) {
        echo AddSuivisQuotidiens($data['VehiculeID'], $data['ChauffeurID'], $data['DateSuivi'], $data['Kilometrage'], $data['VolumeCarburant'], $data['Preuve']);
    } else {
        echo json_encode(['error' => 'Missing required parameters']);
    }
} else {
    echo json_encode(['error' => 'Invalid request method']);
}
