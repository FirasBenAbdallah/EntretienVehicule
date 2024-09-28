<?php
include '../../config/db_connect.php';
include '../../functions/nettoyages/AddNettoyages.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure the files directory exists
    $target_dir = "../../uploads/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Debugging Step: Print $_FILES and $_POST to see if everything is received
    echo json_encode(['FILES' => $_FILES, 'POST' => $_POST]);
    exit;

    // Upload files
    $PhotoAvantPath = null;
    $PhotoApresPath = null;

    if (isset($_FILES['PhotoAvant']) && $_FILES['PhotoAvant']['error'] == UPLOAD_ERR_OK) {
        $photoAvantName = basename($_FILES["PhotoAvant"]["name"]);
        $PhotoAvantPath = $target_dir . uniqid() . "_" . $photoAvantName;
        if (!move_uploaded_file($_FILES["PhotoAvant"]["tmp_name"], $PhotoAvantPath)) {
            echo json_encode(['error' => 'Failed to upload PhotoAvant']);
            exit;
        }
    } else {
        echo json_encode(['error' => 'PhotoAvant upload error: ' . ($_FILES['PhotoAvant']['error'] ?? 'File not set')]);
        exit;
    }

    if (isset($_FILES['PhotoApres']) && $_FILES['PhotoApres']['error'] == UPLOAD_ERR_OK) {
        $photoApresName = basename($_FILES["PhotoApres"]["name"]);
        $PhotoApresPath = $target_dir . uniqid() . "_" . $photoApresName;
        if (!move_uploaded_file($_FILES["PhotoApres"]["tmp_name"], $PhotoApresPath)) {
            echo json_encode(['error' => 'Failed to upload PhotoApres']);
            exit;
        }
    } else {
        echo json_encode(['error' => 'PhotoApres upload error: ' . ($_FILES['PhotoApres']['error'] ?? 'File not set')]);
        exit;
    }

    // Get other POST data
    $VehiculeID = $_POST['VehiculeID'] ?? null;
    $ChauffeurID = $_POST['ChauffeurID'] ?? null;
    $DateNettoyage = $_POST['DateNettoyage'] ?? null;

    // Validate input data
    if ($VehiculeID && $ChauffeurID && $DateNettoyage && $PhotoAvantPath && $PhotoApresPath) {
        // Call AddNettoyages function
        echo AddNettoyages($VehiculeID, $ChauffeurID, $DateNettoyage, $PhotoAvantPath, $PhotoApresPath);
    } else {
        echo json_encode(['error' => 'Missing required parameters: ' .
            ($VehiculeID ? '' : 'VehiculeID ') .
            ($ChauffeurID ? '' : 'ChauffeurID ') .
            ($DateNettoyage ? '' : 'DateNettoyage ') .
            ($PhotoAvantPath ? '' : 'PhotoAvant ') .
            ($PhotoApresPath ? '' : 'PhotoApres ')]);
    }
} else {
    echo json_encode(['error' => 'Invalid request method. Please use POST']);
}
