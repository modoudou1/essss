<?php
// get_demandes.php

// Configuration de la base de données
$host = 'localhost';
$dbname = 'pharmacie';
$username = 'root';
$password = '';

// Connexion à la base de données
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Récupération des demandes
$stmt = $conn->prepare("SELECT * FROM demandes WHERE reponse IS NULL");
$stmt->execute();
$demandes = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($demandes);
?>
