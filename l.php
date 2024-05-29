<?php
// submit_demande.php

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

// Insertion des données dans la base de données
$medicament = $data['medicament'];
$client = $data['client'];
$email = $data['email'];

$stmt = $conn->prepare("INSERT INTO demandes (medicament, client, email) VALUES (:medicament, :client, :email)");
$stmt->bindParam(':medicament', $medicament);
$stmt->bindParam(':client', $client);
$stmt->bindParam(':email', $email);

if ($stmt->execute()) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error']);
}
?>
