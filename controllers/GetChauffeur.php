<?php
include '../config/db_connect.php';
include '../models/Chauffeur.php';
include '../functions/getChauffeurProfile.php';

header('Content-Type: application/json');

if (isset($_GET['ChauffeurID'])) {
    $ChauffeurID = $_GET['ChauffeurID'];
    echo getChauffeurProfile($ChauffeurID);
} else {
    echo json_encode(['error' => 'ChauffeurID parameter is required']);
}
