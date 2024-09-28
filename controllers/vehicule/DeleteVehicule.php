<?php
include '../../config/db_connect.php';
include '../../functions/vehicule/deleteVehicule.php';

header('Content-Type: application/json');

// Check if the request method is DELETE or GET
if ($_SERVER['REQUEST_METHOD'] === 'DELETE' || $_SERVER['REQUEST_METHOD'] === 'GET') {
    // Check if the VehiculeID is provided in the query string
    if (isset($_GET['VehiculeID'])) {
        $VehiculeID = $_GET['VehiculeID'];

        echo deleteVehicule($VehiculeID);
    } else {
        echo json_encode(['error' => 'VehiculeID parameter is required']);
    }
} else {
    echo json_encode(['error' => 'Invalid request method. Please use DELETE or GET']);
}
