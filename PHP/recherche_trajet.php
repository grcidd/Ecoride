<?php
// Connexion à la base de données
$host = 'localhost';
$dbname = 'ecoride';
$username = 'root';
$password = 'root'; 

try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
} catch (PDOException $e) {
  die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Récupération des données envoyées depuis le formulaire
$depart = htmlspecialchars($_POST['depart']);
$arrivee = htmlspecialchars($_POST['arrivee']);
$date = htmlspecialchars($_POST['date']);
$passagers = htmlspecialchars($_POST['passagers']);

// Requête SQL pour récupérer les trajets
$requete = $pdo->prepare("SELECT * FROM trajet WHERE ville_depart = ? AND ville_arrivee = ? AND date_trajet = ?");
$requete->execute([$depart, $arrivee, $date]);
$trajets = $requete->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Résultats - EcoRide</title>
  <link rel="stylesheet" href="/CSS/accueil.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <header class="p-3 mb-3 border-bottom bg-light">
    <div class="container">
      <h2>Résultats de votre recherche</h2>
    </div>
  </header>

  <main class="container mt-4">
    <div class="alert alert-info">
      <strong>Départ :</strong> <?= $depart ?><br>
      <strong>Arrivée :</strong> <?= $arrivee ?><br>
      <strong>Date :</strong> <?= $date ?><br>
      <strong>Passagers :</strong> <?= $passagers ?>
    </div>

    <?php if (count($trajets) > 0): ?>
      <h4>Trajets trouvés :</h4>
      <ul class="list-group mt-3">
        <?php foreach ($trajets as $trajet): ?>
          <li class="list-group-item">
            🚗 <strong><?= htmlspecialchars($trajet['ville_depart']) ?></strong> → 
            <strong><?= htmlspecialchars($trajet['ville_arrivee']) ?></strong> | 
            📅 <?= htmlspecialchars($trajet['date_trajet']) ?>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php else: ?>
      <div class="alert alert-warning mt-4">
        Aucun trajet trouvé pour votre recherche.
      </div>
    <?php endif; ?>
  </main>

  <footer class="text-center p-4 bg-light mt-5 border-top">
    <p>Contact : <a href="mailto:contact@ecoride.fr">contact@ecoride.fr</a></p>
    <a href="/HTML/mentionslgl.html">Mentions légales</a>
  </footer>
</body>
</html>
