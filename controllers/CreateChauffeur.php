<?php
include '../config/db_connect.php';
include '../functions/AddChauffeurProfile.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['Nom'], $data['Prenom'], $data['NumeroPermis'], $data['DateEmbauche'])) {
        echo AddChauffeurProfile($data['Nom'], $data['Prenom'], $data['NumeroPermis'], $data['DateEmbauche']);
    } else {
        echo json_encode(['error' => 'Missing required parameters']);
    }
} else {
    echo json_encode(['error' => 'Invalid request method']);
}
