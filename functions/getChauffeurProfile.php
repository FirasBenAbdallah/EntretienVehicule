<?php
function getChauffeurProfile($ChauffeurID)
{
    global $pdo;

    try {
        $stmt = $pdo->prepare("SELECT * FROM chauffeurs WHERE ChauffeurID = :ChauffeurID");
        $stmt->execute(['ChauffeurID' => $ChauffeurID]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $chauffeur = new Chauffeur(
                $row['ChauffeurID'],
                $row['Nom'],
                $row['Prenom'],
                $row['NumeroPermis'],
                $row['DateEmbauche']
            );
            return json_encode($chauffeur);
        } else {
            return json_encode(['error' => 'Chauffeur not found']);
        }
    } catch (Exception $e) {
        return json_encode(['error' => 'Query failed: ' . $e->getMessage()]);
    }
}
