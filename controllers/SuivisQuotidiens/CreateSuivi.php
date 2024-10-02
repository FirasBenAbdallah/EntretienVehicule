<?php
include '../../config/cors.php';
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
        // Extract the original file extension
        $fileExtension = pathinfo($_FILES["Preuve"]["name"], PATHINFO_EXTENSION);

        // Create a short and unique file name
        $shortFileName = uniqid("preuve_", true) . "." . $fileExtension; // Example: preuve_605c7b2a34b9d.jpg

        $PreuvePath = $target_dir . $shortFileName;

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
