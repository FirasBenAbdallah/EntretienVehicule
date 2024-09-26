<?php
// Include necessary files
include '../config/db_connect.php';  // Database connection
include '../models/Vehicule.php';    // Vehicule class
include '../functions/getAllVehiculeInfo.php';  // Function to fetch all vehicles

header('Content-Type: application/json');

// Call the function to get all vehicle information
echo getAllVehiculeInfo();
