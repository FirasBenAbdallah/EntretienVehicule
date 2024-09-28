<?php
include '../../config/db_connect.php';
include '../../functions/suivisQuotidiens/AddSuivisQuotidiens.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure the files directory exists
    $target_dir = "../../uploads/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Upload file for 'Preuve'
    $PreuvePath = null;
    if (isset($_FILES['Preuve']) && $_FILES['Preuve']['error'] == UPLOAD_ERR_OK) {
        $preuveName = basename($_FILES["Preuve"]["name"]);
        $PreuvePath = $target_dir . uniqid() . "_" . $preuveName;

        // Move the uploaded file to the target directory
        if (!move_uploaded_file($_FILES["Preuve"]["tmp_name"], $PreuvePath)) {
            echo json_encode(['error' => 'Failed to upload Preuve']);
            exit;
        }
    } else {
        echo json_encode(['error' => 'Preuve upload error: ' . ($_FILES['Preuve']['error'] ?? 'File not set')]);
        exit;
    }

    // Get other POST data
    $VehiculeID = $_POST['VehiculeID'] ?? null;
    $ChauffeurID = $_POST['ChauffeurID'] ?? null;
    $DateSuivi = $_POST['DateSuivi'] ?? null;
    $Kilometrage = $_POST['Kilometrage'] ?? null;
    $VolumeCarburant = $_POST['VolumeCarburant'] ?? null;

    // Validate input data
    if ($VehiculeID && $ChauffeurID && $DateSuivi && $Kilometrage && $VolumeCarburant && $PreuvePath) {
        // Call AddSuivisQuotidiens function
        echo AddSuivisQuotidiens($VehiculeID, $ChauffeurID, $DateSuivi, $Kilometrage, $VolumeCarburant, $PreuvePath);
    } else {
        echo json_encode(['error' => 'Missing required parameters']);
    }
} else {
    echo json_encode(['error' => 'Invalid request method. Please use POST']);
}

// include '../../config/db_connect.php';
// include '../../functions/suivisQuotidiens/AddSuivisQuotidiens.php';

// header('Content-Type: application/json');

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// $data = json_decode(file_get_contents('php://input'), true);

// if (isset($data['VehiculeID'], $data['ChauffeurID'], $data['DateSuivi'], $data['Kilometrage'], $data['VolumeCarburant'], $data['Preuve'])) {
// echo AddSuivisQuotidiens($data['VehiculeID'], $data['ChauffeurID'], $data['DateSuivi'], $data['Kilometrage'], $data['VolumeCarburant'], $data['Preuve']);
// } else {
// echo json_encode(['error' => 'Missing required parameters']);
// }
// } else {
// echo json_encode(['error' => 'Invalid request method']);
// }