<?php
function getAllChauffeurProfile()
{
    global $pdo;

    try {
        $stmt = $pdo->prepare("SELECT * FROM chauffeurs");
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($rows) {
            $chauffeurs = [];
            foreach ($rows as $row) {
                $chauffeur = new Chauffeur(
                    $row['ChauffeurID'],
                    $row['Nom'],
                    $row['Prenom'],
                    $row['NumeroPermis'],
                    $row['DateEmbauche']
                );
                $chauffeurs[] = $chauffeur;
            }
            return json_encode($chauffeurs);
        } else {
            return json_encode(['error' => 'No chauffeurs found']);
        }
    } catch (Exception $e) {
        return json_encode(['error' => 'Query failed: ' . $e->getMessage()]);
    }
}
