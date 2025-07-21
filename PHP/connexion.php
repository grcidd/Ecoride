<?php
$host = "localhost";
$dbname = "ecoride"; 
$user = "root";
$password = "root";

// Connexion
try {
    $connexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    // Pour afficher les erreurs SQL
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>
