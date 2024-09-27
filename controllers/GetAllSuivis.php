<?php
include '../config/db_connect.php';
include '../models/SuivisQuotidiens.php';
include '../functions/getAllSuivisQuotidiens.php';

header('Content-Type: application/json');

echo getAllSuivisQuotidiens();
