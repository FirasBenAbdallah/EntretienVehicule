<?php
include '../../config/db_connect.php';
include '../../models/Vehicule.php';
include '../../functions/vehicule/getVehiculeInfo.php';

header('Content-Type: application/json');

if (isset($_GET['VehiculeID'])) {
    $VehiculeID = $_GET['VehiculeID'];
    echo getVehiculeInfo($VehiculeID);
} else {
    http_response_code(400);
    echo json_encode(['error' => 'VehiculeID parameter is required']);
}
