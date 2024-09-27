<?php
function getAllSuivisQuotidiens()
{
    global $pdo;

    try {
        $stmt = $pdo->prepare("SELECT * FROM suivisquotidiens");
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($rows) {
            $suivisList = [];
            foreach ($rows as $row) {
                $suivi = new SuivisQuotidiens(
                    $row['SuiviID'],
                    $row['VehiculeID'],
                    $row['ChauffeurID'],
                    $row['DateSuivi'],
                    $row['Kilometrage'],
                    $row['VolumeCarburant'],
                    $row['Preuve']
                );
                $suivisList[] = $suivi;
            }
            return json_encode($suivisList);
        } else {
            return json_encode(['error' => 'No records found']);
        }
    } catch (Exception $e) {
        return json_encode(['error' => 'Query failed: ' . $e->getMessage()]);
    }
}
