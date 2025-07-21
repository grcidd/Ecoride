<?php
require 'connexion.php'; // Fichier de connexion à ta base

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conducteur = $_POST['conducteur'];
    $depart = $_POST['depart'];
    $arrivee = $_POST['arrivee'];
    $date = $_POST['date_trajet'];
    $places = $_POST['places_dispo'];
    $prix = $_POST['prix'];

    $sql = "INSERT INTO trajets (conducteur, depart, arrivee, date_trajet, places_dispo, prix) 
            VALUES (:conducteur, :depart, :arrivee, :date_trajet, :places_dispo, :prix)";

    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':conducteur', $conducteur);
    $stmt->bindParam(':depart', $depart);
    $stmt->bindParam(':arrivee', $arrivee);
    $stmt->bindParam(':date_trajet', $date);
    $stmt->bindParam(':places_dispo', $places);
    $stmt->bindParam(':prix', $prix);

    if ($stmt->execute()) {
        echo "<script>alert('Trajet ajouté avec succès !'); window.location.href='ajouter_trajet.html';</script>";
    } else {
        echo "<p>Erreur lors de l’ajout du trajet.</p>";
    }
}
?>
