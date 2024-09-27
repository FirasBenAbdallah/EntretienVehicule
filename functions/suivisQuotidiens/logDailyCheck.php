<?php
function logDailyCheck($VehiculeID, $ChauffeurID, $DateSuivi)
{
    global $pdo;

    try {
        // You could use a basic query to check if the log exists or simply mark that an entry was logged
        $stmt = $pdo->prepare("
            SELECT * FROM suivisquotidiens 
            WHERE VehiculeID = :VehiculeID AND ChauffeurID = :ChauffeurID AND DateSuivi = :DateSuivi
        ");
        $stmt->execute(['VehiculeID' => $VehiculeID, 'ChauffeurID' => $ChauffeurID, 'DateSuivi' => $DateSuivi]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row ? true : false;
    } catch (Exception $e) {
        return false;
    }
}
