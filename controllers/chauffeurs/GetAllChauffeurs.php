<?php
include '../../config/db_connect.php';
include '../../models/Chauffeur.php';
include '../../functions/chauffeurs/getAllChauffeurProfile.php';

header('Content-Type: application/json');

echo getAllChauffeurProfile();
