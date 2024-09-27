<?php
include '../../config/db_connect.php';
include '../../models/SuivisQuotidiens.php';
include '../../functions/suivisQuotidiens/getSuivisQuotidiens.php';

header('Content-Type: application/json');

if (isset($_GET['SuiviID'])) {
    $SuiviID = $_GET['SuiviID'];
    echo geSuivisQuotidiens($SuiviID);
} else {
    echo json_encode(['error' => 'SuiviID parameter is required']);
}
