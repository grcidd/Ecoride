<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $depart = $_POST["depart"];
    $arrivee = $_POST["arrivee"];
    $date = $_POST["date"];
    $passagers = $_POST["passagers"];

    
    header("Location: resultats.php?depart=$depart&arrivee=$arrivee&date=$date&passagers=$passagers");
    exit();
}
?>
<?php
require 'connexion.php';

$depart = $_GET['depart'];
$arrivee = $_GET['arrivee'];
$date = $_GET['date'];
$passagers = $_GET['passagers'];

$sql = "SELECT * FROM trajets 
        WHERE depart = :depart 
        AND arrivee = :arrivee 
        AND date_trajet = :date 
        AND places_dispo >= :passagers";

$stmt = $connexion->prepare($sql);
$stmt->bindParam(':depart', $depart);
$stmt->bindParam(':arrivee', $arrivee);
$stmt->bindParam(':date', $date);
$stmt->bindParam(':passagers', $passagers);
$stmt->execute();

$resultats = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Résultats de recherche</title>
    <link rel="stylesheet" href="/CSS/accueil.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Trajets trouvés</h2>

    <?php if (count($resultats) > 0): ?>
        <div class="row">
            <?php foreach ($resultats as $trajet): ?>
                <div class="col-md-4 mb-3">
                    <div class="card p-3 shadow-sm">
                        <h5>🚗 <?= htmlspecialchars($trajet['conducteur']) ?></h5>
                        <p><strong>Départ :</strong> <?= htmlspecialchars($trajet['depart']) ?></p>
                        <p><strong>Arrivée :</strong> <?= htmlspecialchars($trajet['arrivee']) ?></p>
                        <p><strong>Date :</strong> <?= htmlspecialchars($trajet['date_trajet']) ?></p>
                        <p><strong>Places dispo :</strong> <?= htmlspecialchars($trajet['places_dispo']) ?></p>
                        <p><strong>Prix :</strong> <?= htmlspecialchars($trajet['prix']) ?> €</p>
                        <a href="#" class="btn btn-success w-100">Réserver</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="text-center text-danger">Aucun trajet trouvé.</p>
    <?php endif; ?>
</div>
</body>
</html>
