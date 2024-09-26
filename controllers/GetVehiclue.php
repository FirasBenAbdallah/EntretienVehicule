<?php
// Include your database connection, Vehicule class, and the getVehiculeInfo function
include '../config/db_connect.php';  // Database connection
include '../models/Vehicule.php';    // Vehicule class
include '../functions/getVehiculeInfo.php';  // Include the file that contains the getVehiculeInfo() function

header('Content-Type: application/json');

if (isset($_GET['VehiculeID'])) {
    $VehiculeID = $_GET['VehiculeID'];
    echo getVehiculeInfo($VehiculeID);
} else {
    echo json_encode(['error' => 'VehiculeID parameter is required']);
}
