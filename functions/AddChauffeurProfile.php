<?php
function AddChauffeurProfile($Nom, $Prenom, $NumeroPermis, $DateEmbauche)
{
    global $pdo;

    try {
        $stmt = $pdo->prepare("
            INSERT INTO chauffeurs (Nom, Prenom, NumeroPermis, DateEmbauche) 
            VALUES (:Nom, :Prenom, :NumeroPermis, :DateEmbauche)
        ");
        $stmt->bindParam(':Nom', $Nom);
        $stmt->bindParam(':Prenom', $Prenom);
        $stmt->bindParam(':NumeroPermis', $NumeroPermis);
        $stmt->bindParam(':DateEmbauche', $DateEmbauche);

        if ($stmt->execute()) {
            return json_encode(['success' => 'Chauffeur added successfully']);
        } else {
            return json_encode(['error' => 'Failed to add chauffeur']);
        }
    } catch (Exception $e) {
        return json_encode(['error' => 'Query failed: ' . $e->getMessage()]);
    }
}
