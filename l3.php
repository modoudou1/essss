<?php
// respond_demande.php

// Configuration de la base de données
$host = 'localhost';
$dbname = 'pharmacie';
$username = 'root';
$password = '';

// Connexion à la base de données
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Lecture des données POST
$data = json_decode(file_get_contents('php://input'), true);

// Mise à jour de la demande
$id = $data['id'];
$reponse = $data['reponse'];

$stmt = $conn->prepare("UPDATE demandes SET reponse = :reponse WHERE id = :id");
$stmt->bindParam(':reponse', $reponse);
$stmt->bindParam(':id', $id);

if ($stmt->execute()) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error']);
}
?>
