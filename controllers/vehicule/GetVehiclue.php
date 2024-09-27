<?php
include '../../config/db_connect.php';
include '../../models/Vehicule.php';
include '../../functions/vehicule/getVehiculeInfo.php';

header('Content-Type: application/json');

if (isset($_GET['VehiculeID'])) {
    $VehiculeID = $_GET['VehiculeID'];
    echo getVehiculeInfo($VehiculeID);
} else {
    echo json_encode(['error' => 'VehiculeID parameter is required']);
}
