<?php
include '../../config/db_connect.php';
include '../../models/Vehicule.php';
include '../../functions/vehicule/getAllVehiculeInfo.php';

header('Content-Type: application/json');

// Call the function to get all vehicle information
echo getAllVehiculeInfo();
